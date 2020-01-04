// Gulpfile.js
// Check required packages
var gulp = require('gulp');
var rename = require("gulp-rename");
// CSS compiling
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
// JS compiling
var concat = require('gulp-concat');
var minify = require('gulp-minify');
// Browsersync
var browserSync = require('browser-sync').create();

function style() {
  return gulp.src('assets/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/css/'))
    .pipe(browserSync.stream())
    .pipe(cleanCSS({compatibility: 'ie9', debug: true}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('assets/css'));
}

// Concatenate & minify JS
function scripts() {
  return gulp.src([
    './assets/js/vendor/jquery.smooth-scroll.min.js',
    './assets/js/vendor/owl.carousel.min.js',
    './assets/js/vendor/twitterfetcher.min.js',
    './assets/js/vendor/autosize.min.js',
    './assets/js/components/*.js'
  ])
  .pipe(concat('scripts.js'))
  .pipe(minify({ ext:{
      src:'.js',
      min:'.min.js'
    },
  }))
  .pipe(gulp.dest('./assets/js'));
}

function watch() {
  browserSync.init({
    proxy: 'http://localhost/ldaniel-site',
    open: false
  });
  gulp.watch('assets/scss/**/*.scss', style);
  gulp.watch('assets/js/components/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.scripts = scripts;
exports.default = watch;
