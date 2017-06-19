var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cleancss = require('gulp-clean-css');
var order = require('gulp-order');

// Compile Sass
gulp.task('sass', function() {
    return gulp.src('sass/site.scss')
        .pipe(sass())
        .pipe(gulp.dest('css'))
        .pipe(concat('site.css'))
        .pipe(cleancss())
        .pipe(rename('site.min.css'))
        .pipe(gulp.dest('css/min'));
});

// List all javascript files and directories to include in the correct order.
var sourceJs = [
    //'node_modules/example-pkg/example/example.min.js',
    'js/*.js',
];

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src(sourceJs)
        .pipe(concat('site.js'))
        .pipe(uglify())
        .pipe(rename('site.min.js'))
        .pipe(gulp.dest('js/min'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/*.js', ['scripts']);
    gulp.watch('sass/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'scripts']);