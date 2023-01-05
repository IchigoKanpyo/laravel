const mix = require("laravel-mix");
const fs = require("fs");
const path = require("path");
// カレントディレクトリ
// ファイル名の一覧
const dir = path.resolve(__dirname, "resources", "js", "pages");
const filenames = fs.readdirSync(dir);
console.log(dir);
console.log(filenames);

mix.postCss("resources/css/tailwind.css", "public/css/tailwind.css");
mix.postCss("resources/css/app.css", "public/css/app.css");
filenames.forEach((filename) => {
    mix.js(`resources/js/pages/${filename}/app.js`, `public/js/${filename}`)
        .vue({ version: 2 })
        .sourceMaps();
});
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
// mix.js("resources/js/app.js", "public/js")
//     .sass("resources/sass/app.scss", "public/css")
//     .version();

// mix.js("resources/js/app.js", "public/js").postCss(
//     "resources/css/app.css",
//     "public/css",
//     [
//         //
//     ]
// );
