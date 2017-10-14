var gulp = require('gulp');
var argv = require('yargs').argv;
var plugins = require('gulp-load-plugins')();

// Check if compiling with production flag
var isProduction = (argv.production === undefined) ? false : true;

// Compile sass
gulp.task('sass', function() {
    return gulp.src('sass/site.scss')
        .pipe(plugins.sass())
        .pipe(plugins.if(isProduction, plugins.cleanCss()))
        .pipe(plugins.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(plugins.rename('site.min.css'))
        .pipe(gulp.dest('css'));
});

// List all javascript files and directories to include in the correct order.
var sourceJs = [
    'js/*.js',
];

// Concatenate & minify js
gulp.task('scripts', function() {
    return gulp.src(sourceJs)
        .pipe(plugins.concat('site.js'))
        .pipe(plugins.if(isProduction, plugins.uglify()))
        .pipe(plugins.rename('site.min.js'))
        .pipe(gulp.dest('js/min'));
});

// Watch files for changes
gulp.task('watch', function() {
    gulp.watch('js/*.js', ['scripts']);
    gulp.watch('sass/**', ['sass']);
    gulp.watch('node_modules/font-awesome/fonts/*', ['fonts']);
});

// Copy fonts from node_modules
gulp.task('fonts', function() {
    return gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest('fonts'))
});

// Default Task
gulp.task('default', ['sass', 'scripts', 'fonts']);