/*-------------------
Config
-------------------*/
//jsConcat = put all the js files in order to  be merge into one.
//cssConcat = put all style files in order to  be merge into one.
//buildRemove = put all files you want removed when building.
var config = {
  jsConcat: [
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/jquery-migrate/jquery-migrate.min.js',
    'bower_components/bootstrap/dist/js/bootstrap.min.js',
    'js/min/core/main.min.js',
    'js/min/devlop.min.js'
  ],
  cssConcat: [
    'css/**/*.min.css'
  ],
  buildRemove: [
    'build/scss/',
    'build/*.js',
    'build/js/!(*.min.js)',
    'build/css/!(*.min.css)',
    'build/*.json',
    'build/bower_components/',
    'build/node_modules/',
    'build/**/maps/',
    'build/*.codekit'
  ]
};

/*---------------
Required
---------------*/
var gulp = require('gulp'),
// Compile SCSS
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
cleanCSS = require('gulp-clean-css'),
// Compile JS
uglify = require('gulp-uglify'),
babel  = require('gulp-babel'),
// Add Source Maps to files
sourcemaps = require('gulp-sourcemaps'),
// Compress Images
imagemin = require('gulp-imagemin'),
// Minify PHP
phpMinify = require('@aquafadas/gulp-php-minify');
// Detect changes and errors
plumber = require('gulp-plumber'),
changed = require('gulp-changed'),
notify = require("gulp-notify"),
// Rename files on compile
rename = require('gulp-rename'),
// Build processes
replace = require('gulp-replace'),
concat = require('gulp-concat'),
del = require('del'),
// Reload Browser
browserSync = require('browser-sync'),
reload = browserSync.reload;

/*---------------
Error notification
---------------*/
function handleErrors() {
  var args = Array.prototype.slice.call(arguments);

  // Send error to notification center with gulp-notify
  notify.onError({
    title: "Compile Error",
    message: "<%= error %>"
  }).apply(this, args);

  // Keep gulp from hanging on this task
  this.emit('end');
}

/*---------------
Scripts
---------------*/
gulp.task('scripts', function(){
  gulp.src( ['js/**/*.js','!js/**/*.min.js'] )
  .pipe( plumber() )
  .pipe( sourcemaps.init() )
  .pipe( babel().on('error', handleErrors) )
  .pipe( uglify().on('error', handleErrors) )
  .pipe( sourcemaps.write('maps') )
  .pipe( rename( {suffix:'.min'} ) )
  .pipe( gulp.dest('js/min') )
  .pipe( reload({ stream:true }) );

});

/*---------------
Styles
---------------*/
gulp.task('styles', function(){
  return gulp.src( 'scss/style.scss' )
  .pipe( plumber() )
  .pipe( sourcemaps.init() )
  .pipe( sass({
    outputStyle: 'nested',
  }).on('error', handleErrors) )
  .pipe( autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }) )
  .pipe( sourcemaps.write('maps') )
  .pipe( gulp.dest('css') )
  .pipe( gulp.dest('/') )
  .pipe( reload({ stream:true }) );

});

gulp.task('css', function(){
  return gulp.src( ['css/**/*.css', '!css/**/*.min.css'] )
  .pipe( plumber() )
  .pipe( sourcemaps.init() )
  .pipe( changed('css').on('error', handleErrors) )
  .pipe( cleanCSS().on('error', handleErrors) )
  .pipe( sourcemaps.write('maps') )
  .pipe( rename( {suffix:'.min'} ) )
  .pipe( gulp.dest('css') )
  .pipe( reload({ stream:true }) );

});

/*---------------
Images
---------------*/
gulp.task('images', function() {
  return gulp.src( ['images/**/*.{png,jpg,jpeg,svg,gif}','!images/min/*.{png,jpg,jpeg,svg,gif}'] )
  .pipe( plumber() )
  .pipe( changed('images/min').on('error', handleErrors) )
  .pipe( cache( imagemin({
    progressive: true,
    interlaced: true,
    svgoPlugins: [{cleanupIDs: false}]
  }) ).on('error', handleErrors) )
  .pipe( gulp.dest('images/min') );

});

/*---------------
Build
---------------*/
gulp.task('build:clean', function (cb) {
  return del('./build/**', cb);
});

gulp.task('build:copy', ['build:clean'], function(){

  return gulp.src( './**/*' )
  .pipe( gulp.dest('./build/') );

});

gulp.task('build:fonts', ['build:copy'], function(){

  return gulp.src( './bower_components/bootstrap/fonts/*' )
  .pipe( gulp.dest('./build/fonts') );

});

gulp.task('build:jsConcat', function(){

  return gulp.src(config.jsConcat)
  .pipe( plumber() )
  .pipe( concat('all.min.js').on('error', handleErrors) )
  .pipe( gulp.dest('build/js') );

});

gulp.task('build:cssConcat', function(){

  return gulp.src(config.cssConcat)
  .pipe( plumber() )
  .pipe( concat('style.css').on('error', handleErrors) )
  .pipe( cleanCSS().on('error', handleErrors) )
  .pipe( gulp.dest('build') );

});

gulp.task('build:remove', ['build:copy', 'build:fonts', 'build:jsConcat', 'build:cssConcat'], function (cb) {
  del(config.buildRemove, cb);
});

gulp.task('build', ['build:copy', 'build:remove']);

/*---------------
BrowserSync
---------------*/
gulp.task('browser-sync', function(){

  browserSync.init({

    server:{
      baseDir: './'
    }

  });
});
gulp.task('build:serve', function(){

  browserSync.init({

    server:{
      baseDir: './build/'
    }

  });

});

/*---------------
Watch
---------------*/
gulp.task('watch', function(){

  gulp.watch( 'js/**/*.js', ['scripts'] );
  gulp.watch( 'scss/**/*.{scss,sass}', ['styles'] );
  gulp.watch( 'css/**/*.css', ['css'] );
  gulp.watch( './**/*.php', reload );
  gulp.watch( 'images/**/*', ['img']);

});

/*---------------
Default
---------------*/
gulp.task( 'default', ['watch', 'browser-sync'] );
