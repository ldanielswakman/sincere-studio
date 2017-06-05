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

// Concatenate & minify JS
gulp.task('scripts', function() {
  return gulp.src('./assets/js/components/*.js')
    .pipe(concat('scripts.js'))
    .pipe(minify({ ext:{
            src:'.js',
            min:'.min.js'
        },
    }))
    .pipe(gulp.dest('./assets/js/'));
});

// Watch task
gulp.task('default',function() {
    gulp.watch('assets/scss/**/*.scss',['styles']);
    gulp.watch('assets/js/components/**/*.js',['scripts']);
});
