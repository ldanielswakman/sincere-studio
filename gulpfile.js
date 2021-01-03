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

function style_ldaniel() {
  return gulp.src('assets/scss/ldaniel/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(rename({ suffix: '-ldaniel' }))
    .pipe(gulp.dest('assets/css/'))
    .pipe(browserSync.stream())
    .pipe(cleanCSS({compatibility: 'ie9', debug: true}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('assets/css'));
}

function style_sincere() {
  return gulp.src('assets/scss/sincere/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(rename({ suffix: '-sincere' }))
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
    proxy: 'http://localhost:8888/ldaniel-site',
    open: false
  });
  gulp.watch('assets/scss/ldaniel/**/*.scss', style_ldaniel);
  gulp.watch('assets/scss/sincere/**/*.scss', style_sincere);
  gulp.watch('assets/js/components/*.js').on('change', browserSync.reload);
}

exports.style_ldaniel = style_ldaniel;
exports.style_sincere = style_sincere;
exports.scripts = scripts;
exports.default = watch;
