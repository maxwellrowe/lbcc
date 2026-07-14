import * as esbuild from "esbuild";

const watch = process.argv.includes("--watch");

const ctx = await esbuild.context({
  bundle: true,
  entryPoints: ["site/_resources/js/src/main.js"],
  format: "iife",
  legalComments: "none",
  minify: !watch,
  outfile: "site/_resources/js/main.js",
  sourcemap: watch,
  target: ["es2022"]
});

if (watch) {
  await ctx.watch();
  console.log("Watching JS bundles...");
} else {
  await ctx.rebuild();
  await ctx.dispose();
}
