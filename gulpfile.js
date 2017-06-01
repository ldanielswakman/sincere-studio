// Gulpfile.js
// Check required packages
var gulp = require('gulp');
var rename = require("gulp-rename");
// CSS compiling
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');

// Concatenate Sass task
// gulp.src('assets/scss/**/*.scss')
gulp.task('sass', function() {
  gulp.src('assets/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assets/css/'));
});

// Clean & minify CSS (after Sass)
gulp.task('clean_css', ['sass'], function() {
  gulp.src('assets/css/style.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./assets/css/'));
});

// Combine style tasks
gulp.task('styles', ['sass', 'clean_css']);

// Watch task
gulp.task('default',function() {
    gulp.watch('assets/scss/**/*.scss',['styles']);
});
