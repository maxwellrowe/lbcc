import fs from "node:fs";
import path from "node:path";

const [htmlPath, catalogCsvPath, outputPath = "lbcc_programs.csv"] = process.argv.slice(2);
if (!htmlPath || !catalogCsvPath) {
  throw new Error("Usage: node scripts/align-programs-to-landing-page.mjs <programs.html> <catalog-programs.csv> [output.csv]");
}

const decodeHtml = (value) => value
  .replace(/&nbsp;|&#160;/gi, " ")
  .replace(/&amp;/gi, "&")
  .replace(/&quot;/gi, '"')
  .replace(/&#39;|&apos;/gi, "'")
  .replace(/&lt;/gi, "<")
  .replace(/&gt;/gi, ">")
  .replace(/\s+/g, " ")
  .trim();

const normalize = (value) => decodeHtml(value)
  .replace(/[–—]/g, "-")
  .replace(/\b(and|of|in|for|the|to|with|as|studies|program|general)\b/gi, " ")
  .replace(/[^a-z0-9]+/gi, " ")
  .trim()
  .toLowerCase();

const parseCsv = (text) => {
  const rows = [];
  let row = [];
  let value = "";
  let quoted = false;

  for (let index = 0; index < text.length; index += 1) {
    const character = text[index];
    if (quoted && character === '"' && text[index + 1] === '"') {
      value += '"';
      index += 1;
    } else if (character === '"') {
      quoted = !quoted;
    } else if (character === "," && !quoted) {
      row.push(value);
      value = "";
    } else if (character === "\n" && !quoted) {
      row.push(value);
      rows.push(row);
      row = [];
      value = "";
    } else {
      value += character;
    }
  }
  if (value || row.length) rows.push([...row, value]);
  return rows;
};

const catalogRows = parseCsv(fs.readFileSync(catalogCsvPath, "utf8"));
const catalogHeader = catalogRows.shift();
const catalog = catalogRows.map((row) => Object.fromEntries(catalogHeader.map((column, index) => [column, row[index] ?? ""])));

const html = fs.readFileSync(htmlPath, "utf8");
const cards = [...html.matchAll(/<article\b[\s\S]*?<h2\b[\s\S]*?<a\s+href="([^"]+)"[^>]*>[\s\S]*?<span class="title">([\s\S]*?)<\/span>[\s\S]*?<\/a>[\s\S]*?<\/h2>[\s\S]*?<\/article>/g)]
  .map((match) => ({
    url: match[1],
    program_name: decodeHtml(match[2].replace(/<[^>]+>/g, "")),
    image: decodeHtml(match[0].match(/<img\s+[^>]*src="([^"]+)"/i)?.[1] ?? ""),
  }));

if (!cards.length) throw new Error("No program cards were found in the supplied HTML.");

const optionOrder = ["Degree", "Transfer", "Certificate", "Career Technical Education", "Fully Online", "Noncredit"];
const credentialOrder = ["AA", "AS", "AA-T", "AS-T", "AS-T (UC Transfer)", "C-ACH", "C-ACMP", "C-COMP", "C-COMPETENCY"];
const orderedValues = (values, order) => [...new Set(values.filter(Boolean))]
  .sort((left, right) => (order.indexOf(left) === -1 ? order.length : order.indexOf(left)) - (order.indexOf(right) === -1 ? order.length : order.indexOf(right)) || left.localeCompare(right));
const similarity = (left, right) => {
  const leftTokens = new Set(normalize(left).split(" ").filter(Boolean));
  const rightTokens = new Set(normalize(right).split(" ").filter(Boolean));
  const overlap = [...leftTokens].filter((token) => rightTokens.has(token)).length;
  return overlap / new Set([...leftTokens, ...rightTokens]).size;
};

// These map known landing-page umbrella programs to their catalog naming families.
// Any card not listed here uses conservative title/department similarity instead.
const landingAliases = {
  accounting: ["business accounting"],
  adminassist: ["administrative assistant"],
  architecture: ["architectural design", "design management", "industrial design", "interior design"],
  "artificial-intelligence": ["artificial intelligence"],
  "applied-design": ["applied design"],
  biw: ["business information worker"],
  business: ["business administration"],
  "college-workplace-readiness": ["counseling student development", "foundational skills", "reading", "english second language"],
  "comics-animation": ["digital media comics animation"],
  "counseling-student-development": ["counseling student development"],
  cybersecurity: ["cyber security", "computer security networking"],
  database: ["database management"],
  digitaldesign: ["digital media", "digital fashion", "design management"],
  dmi: ["diagnostic medical imaging"],
  "program-electrical-technology": ["electrical technology"],
  esl: ["english second language"],
  fashion: ["fashion design", "fashion merchandising"],
  film: ["film television electronic media", "film production"],
  "game-design": ["game design"],
  gbus: ["business general business"],
  "ged-preparacion-espanol": ["ged hiset preparation spanish"],
  gtl: ["business global trade logistics"],
  "hsas": ["addiction treatment counseling mental health studies", "social work"],
  "homeland-security": ["public services transportation security", "security guard"],
  "jewelry-metalsmithing": ["jewelry"],
  management: ["business management"],
  marketing: ["business marketing"],
  medicalassist: ["medical assisting"],
  lvn: ["nursing lvn rn career ladder"],
  rn: ["registered nursing"],
  vn: ["nursing vocational practical"],
  nutrition: ["nutrition dietetics"],
  physics: ["physics"],
  publichealth: ["public health"],
  realestate: ["real estate"],
  "spatial-design": ["architectural design", "industrial design", "interior design"],
  "television-emerging-media": ["television", "film television electronic media", "film production"],
  theaterarts: ["theatre arts", "theatre acting academy"],
  "world-languages": ["world languages"],
};

const matchingRows = (card) => {
  const slug = card.url.replace(/^\//, "").replace(/\/$/, "");
  const aliases = landingAliases[slug] ?? [];
  const aliasMatches = aliases.length
    ? catalog.filter((row) => aliases.some((alias) => normalize(`${row.program_name} ${row.department}`).includes(alias)))
    : [];
  if (aliasMatches.length) return aliasMatches;

  return catalog.filter((row) => Math.max(
    similarity(card.program_name, row.program_name),
    similarity(card.program_name, row.department),
  ) >= 0.72);
};

const rows = cards.map((card) => {
  const matches = matchingRows(card);
  const careerPathways = matches.flatMap((row) => row.career_pathway.split("; "));
  const options = matches.flatMap((row) => row.program_options.split("; "));
  const credentials = matches.flatMap((row) => row.degree_or_certificate.split("; "));
  const departments = matches.map((row) => row.department);

  return {
    program_name: card.program_name,
    career_pathway: orderedValues(careerPathways, []).join("; "),
    program_options: orderedValues(options, optionOrder).join("; "),
    degree_or_certificate: orderedValues(credentials, credentialOrder).join("; "),
    department: orderedValues(departments, []).join("; "),
    image: card.image ? `https://www.lbcc.edu${card.image}` : "",
  };
});

const columns = ["program_name", "career_pathway", "program_options", "degree_or_certificate", "department", "image"];
const quote = (value) => `"${String(value).replaceAll('"', '""')}"`;
const csv = [columns.join(","), ...rows.map((row) => columns.map((column) => quote(row[column])).join(","))].join("\n") + "\n";
fs.mkdirSync(path.dirname(outputPath), { recursive: true });
fs.writeFileSync(outputPath, csv);

console.log(`Wrote ${rows.length} landing-page programs to ${outputPath}`);
console.log(`${rows.filter((row) => row.degree_or_certificate).length} programs matched catalog credential data.`);
