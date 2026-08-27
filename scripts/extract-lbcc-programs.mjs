import fs from "node:fs";
import path from "node:path";

const sourcePath = process.argv[2];
const outputPath = process.argv[3] ?? "lbcc_programs.csv";

if (!sourcePath) {
  throw new Error("Usage: node scripts/extract-lbcc-programs.mjs <source.xml> [output.csv]");
}

const source = fs.readFileSync(sourcePath, "utf8");
const html = source.match(/<text>\s*<!\[CDATA\[([\s\S]*?)\]\]>\s*<\/text>/)?.[1];

if (!html) {
  throw new Error("Could not find the program-card HTML in the XML source.");
}

const decodeHtml = (value) => value
  .replace(/&nbsp;|&#160;/g, " ")
  .replace(/&amp;/g, "&")
  .replace(/&quot;/g, '"')
  .replace(/&#39;|&apos;/g, "'")
  .replace(/&lt;/g, "<")
  .replace(/&gt;/g, ">")
  .replace(/\s+/g, " ")
  .trim();

const titleCaseSlug = (slug) => slug
  .split("-")
  .map((word) => /^(as|aa|esl|cisco|uctp)$/i.test(word) ? word.toUpperCase() : word[0]?.toUpperCase() + word.slice(1))
  .join(" ");

const credentialFor = (title) => {
  const pairs = [
    [/\s*[–-]\s*Associate in Arts Transfer Degree$/i, "AA-T"],
    [/\s*[–-]\s*Associate in Science Transfer Degree$/i, "AS-T"],
    [/\s*[–-]\s*Associate in Science UC Transfer Degree$/i, "AS-T (UC Transfer)"],
    [/\s*[–-]\s*Associate in Arts$/i, "AA"],
    [/\s*[–-]\s*Associate in Science$/i, "AS"],
    [/\s*[–-]\s*Certificate of Achievement$/i, "C-ACH"],
    [/\s*[–-]\s*Certificate of Accomplishment$/i, "C-ACMP"],
    [/\s*[–-]\s*Certificate of Completion$/i, "C-COMP"],
    [/\s*[–-]\s*Certificate of Competency$/i, "C-COMPETENCY"],
  ];
  const match = pairs.find(([pattern]) => pattern.test(title));
  return match ? { programName: title.replace(match[0], ""), credential: match[1] } : { programName: title, credential: "" };
};

const optionsFor = (credential) => {
  if (["AA-T", "AS-T", "AS-T (UC Transfer)"].includes(credential)) return "Degree; Transfer";
  if (["AA", "AS"].includes(credential)) return "Degree";
  if (credential === "C-COMP" || credential === "C-COMPETENCY") return "Certificate; Noncredit";
  if (credential.startsWith("C-")) return "Certificate";
  return "";
};

const awardRows = [];
const cardPattern = /<li\b[^>]*>\s*<a\s+href="([^"]+)"[^>]*>[\s\S]*?<span\s+class="title">([\s\S]*?)<\/span>([\s\S]*?)<\/a>\s*<\/li>/g;

for (const match of html.matchAll(cardPattern)) {
  const [, href, rawTitle, remainder] = match;
  const title = decodeHtml(rawTitle);
  const imagePath = match[0].match(/background-image:\s*url\(([^)]+)\)/i)?.[1] ?? "";
  const keywords = [...remainder.matchAll(/<span\s+class="keyword[^>]*">([\s\S]*?)<\/span>/g)].map((keyword) => decodeHtml(keyword[1]));
  const { programName, credential } = credentialFor(title);
  const urlParts = href.split("/").filter(Boolean);

  awardRows.push({
    program_name: programName,
    career_pathway: keywords.at(-1) ?? "",
    program_options: optionsFor(credential),
    degree_or_certificate: credential,
    department: titleCaseSlug(urlParts[1] ?? ""),
    image: imagePath ? `https://lbcc-public.courseleaf.com${decodeHtml(imagePath)}` : "",
  });
}

const optionOrder = ["Degree", "Transfer", "Certificate", "Career Technical Education", "Fully Online", "Noncredit"];
const credentialOrder = ["AA", "AS", "AA-T", "AS-T", "AS-T (UC Transfer)", "C-ACH", "C-ACMP", "C-COMP", "C-COMPETENCY"];
const orderedValues = (values, order) => [...new Set(values.filter(Boolean))]
  .sort((left, right) => {
    const leftIndex = order.indexOf(left);
    const rightIndex = order.indexOf(right);
    return (leftIndex === -1 ? order.length : leftIndex) - (rightIndex === -1 ? order.length : rightIndex) || left.localeCompare(right);
  });

const groupedPrograms = new Map();
for (const award of awardRows) {
  // A catalog card's title without its award suffix is the best available program-level key.
  // Keep the URL-derived department in the key to avoid merging identically named programs
  // that are published in separate catalog groups.
  const key = `${award.program_name}\u0000${award.department}`;
  const program = groupedPrograms.get(key) ?? {
    program_name: award.program_name,
    career_pathways: new Set(),
    options: new Set(),
    credentials: new Set(),
    department: award.department,
    image: award.image,
  };

  if (award.career_pathway) program.career_pathways.add(award.career_pathway);
  award.program_options.split("; ").filter(Boolean).forEach((option) => program.options.add(option));
  if (award.degree_or_certificate) program.credentials.add(award.degree_or_certificate);
  if (!program.image && award.image) program.image = award.image;
  groupedPrograms.set(key, program);
}

const rows = [...groupedPrograms.values()]
  .map((program) => ({
    program_name: program.program_name,
    career_pathway: [...program.career_pathways].sort().join("; "),
    program_options: orderedValues([...program.options], optionOrder).join("; "),
    degree_or_certificate: orderedValues([...program.credentials], credentialOrder).join("; "),
    department: program.department,
    image: program.image,
  }))
  .sort((left, right) => left.program_name.localeCompare(right.program_name) || left.department.localeCompare(right.department));

const quote = (value) => `"${String(value).replaceAll('"', '""')}"`;
const columns = ["program_name", "career_pathway", "program_options", "degree_or_certificate", "department", "image"];
const csv = [columns.join(","), ...rows.map((row) => columns.map((column) => quote(row[column])).join(","))].join("\n") + "\n";

fs.mkdirSync(path.dirname(outputPath), { recursive: true });
fs.writeFileSync(outputPath, csv);
console.log(`Wrote ${rows.length} programs to ${outputPath}`);
