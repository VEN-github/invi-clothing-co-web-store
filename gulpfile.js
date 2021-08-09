//initialize module
const { src, dest, watch, series } = require("gulp");
/* top level functions
task = define task
src = point to files to use
dest = destination folder
watch = watch files and folders for changes */
const sass = require("gulp-sass");
sass.compiler = require("sass");
// const postcss = require("gulp-postcss");
// const cssnano = require("cssnano");
const autoprefixer = require("gulp-autoprefixer");
const imagemin = require("gulp-imagemin");
const uglify = require("gulp-uglify");
// const concat = require("gulp-concat");
const browserSync = require("browser-sync").create();

//compile scss into css
function style() {
  //scss location
  return (
    src("./src/scss/**/*.scss")
      //pass scss file through sass compiler
      .pipe(sass().on("error", sass.logError))
      //autoprefixer
      .pipe(autoprefixer())
      //postcss with cssnano
      // .pipe(postcss([cssnano]))
      //saving compiled css
      .pipe(dest("./dist/assets/css"))
      //stream changes to all browsers
      .pipe(browserSync.stream())
  );
}

// js task
function jsTask() {
  return (
    src("./src/js/*.js")
      // .pipe(concat("main.js"))
      .pipe(uglify())
      .pipe(dest("./dist/assets/js"))
      .pipe(browserSync.stream())
  );
}

//optimize images
function images() {
  return src("./src/img/*").pipe(imagemin()).pipe(dest("./dist/assets/img"));
}

// watch files
function watchTask() {
  browserSync.init({
    files: ["./class/**/*", "./dist/**/*", "./includes/**/*", "./src/**/*"],
    proxy: "localhost/invi-clothing-co-web-store/dist",
  });
  watch("./src/scss/**/*.scss", style);
  watch("./src/js/*", jsTask);
  watch("./src/img/*", images);
  watch("./dist/*.php").on("change", browserSync.reload);
}

// Default gulp task
exports.default = series(style, jsTask, images, watchTask);
