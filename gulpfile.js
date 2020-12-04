const gulp = require("gulp");
const { parallel, series } = require("gulp");

const uglify = require("gulp-uglify");
const sass = require("gulp-sass");
const browserSync = require("browser-sync").create(); //https://browsersync.io/docs/gulp#page-top
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');


// Scripts
function js(cb) {
    gulp.src("src/Views/assets/js/*js")
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        // .pipe(concat("main.js"))
        .pipe(uglify())
        .pipe(gulp.dest("src/Views/assets/dist/js"));
    cb();
}

// Compile Sass
function css(cb) {
    gulp.src("src/Views/assets/sass/*.scss")
        .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
        .pipe(autoprefixer({
            browserlist: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest("src/Views/assets/dist/css"))
        // Stream changes to all browsers
        .pipe(browserSync.stream());
    cb();
}

// Watch Files
function watch_files() {
    browserSync.init({
        server: {
            baseDir: "src/Views/assets/dist"
        }
    });
    gulp.watch("src/Views/assets/sass/**/*.scss", css);
    gulp.watch("src/Views/assets/js/*.js", js).on("change", browserSync.reload);
}

exports.default = series(css, js, watch_files);
exports.build = parallel(css, js);
