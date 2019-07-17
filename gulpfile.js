var gulp = require('gulp');
var terser = require('gulp-terser');
var cleanCss = require('gulp-clean-css');
var plumber = require('gulp-plumber');
var imagemin = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var del = require('del');

// SCRIPTS TASKS
gulp.task('scripts', function() {
    return gulp.src([
            'assets/vendor/jquery/jquery.min.js',
            'assets/vendor/popper/popper.min.js',
            'assets/vendor/bootstrap/bootstrap.min.js',
            'assets/vendor/headroom/headroom.min.js',
            'assets/vendor/onscreen/onscreen.min.js',
            'assets/js/argon.js',
            'assets/js/cookie-consent.js',
            'assets/js/custom.js'
        ])
        .pipe(plumber()) //Keep function running for watcher if an error encountered
        .pipe(terser()) //terser(minify) JS files
        .pipe(concat('devspot-script.min.js'))
        .pipe(gulp.dest('build/js')); //save files in build/js directory
});

// STYLES TASK
gulp.task('styles', function() {
    return gulp.src([
            'assets/css/argon.css',
            'assets/css/devspot-font.min.css',
            'assets/vendor/font-awesome/css/font-awesome.min.css',
            'assets/css/cookie-consent.css',
            'assets/css/custom.css'
        ])
        .pipe(plumber())
        .pipe(cleanCss())
        .pipe(autoprefixer('last 2 versions'))
        .pipe(concat('devspot-style.min.css'))
        .pipe(gulp.dest('build/css'));
});

// IMAGE TASKS
gulp.task('images', function() {
    return gulp.src('assets/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('build/images'));
})

//Clean build directory
gulp.task('clean', function() {
    return del(['build']);
})

//copy vendor directory
gulp.task('copy-vendor', function() {
    return gulp.src(['assets/vendor/**/*']).pipe(gulp.dest('build/vendor'));
})

//copy fonts
gulp.task('copy-fonts', function () {
    return gulp.src(['assets/vendor/font-awesome/fonts/**/*']).pipe(gulp.dest('build/fonts'));
})

//work on tools css and js
gulp.task('tools-styles', function () {
    return gulp.src([
            'assets/tools/css/**/*'
        ])
        .pipe(plumber())
        .pipe(cleanCss())
        .pipe(autoprefixer('last 2 versions'))        
        .pipe(gulp.dest('build/tools/css'));
});
gulp.task('tools-scripts', function () {
    return gulp.src([
            'assets/tools/js/**/*'
        ])
        .pipe(plumber()) //Keep function running for watcher if an error encountered
        .pipe(terser()) //terser(minify) JS files
        .pipe(gulp.dest('build/tools/js')); //save files in build/js directory
});

//WATCHER

//WATCHES JS
gulp.task('watch', function() {
    gulp.watch([
        'assets/js/argon.js',
        'assets/js/custom.js'
    ], gulp.series(
        'scripts'
    ));
    gulp.watch([
        'assets/css/argon.css',
        'assets/css/custom.css'
    ], gulp.series(
        'styles'
    ));
    gulp.watch([
        'assets/img/**/*'
    ], gulp.series(
        'images'
    ));
    gulp.watch([
        'assets/vendor/**/*'
    ], gulp.series(
        'copy-vendor'
    ));

    gulp.watch([
        'assets/tools/css/**/*'
    ], gulp.series(
        'tools-styles'
    ));

    gulp.watch([
        'assets/tools/js/**/*'
    ], gulp.series(
        'tools-scripts'
    ));
});

//DEFINE A DEFAULT GULP TASK
gulp.task('default', gulp.series(
    'clean',
    gulp.parallel(
        'copy-vendor',
        'copy-fonts'
    ),
    gulp.parallel(        
        'scripts',
        'styles',
        'images',
        'tools-styles',
        'tools-scripts',
    ),
    'watch'
));