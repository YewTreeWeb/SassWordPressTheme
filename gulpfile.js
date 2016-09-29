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
    'css/animate.min.css',
    'css/hover-min.css',
    'style.css'
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
uglify = require('gulp-uglify'),
rename = require('gulp-rename'),
sass = require('gulp-sass'),
cssmin = require('gulp-cssmin'),
htmlmin = require('gulp-htmlmin'),
imagemin = require('gulp-imagemin'),
replace = require('gulp-replace'),
concat = require('gulp-concat'),
sourcemap = require('gulp-sourcemaps'),
autoprefixer = require('gulp-autoprefixer'),
gulpLoadPlugins = require('gulp-load-plugins');
$ = gulpLoadPlugins();
del = require('del'),
browserSync = require('browser-sync'),
reload = browserSync.reload;

/*---------------
Scripts
---------------*/
gulp.task('scripts', function(){
  gulp.src( ['js/**/*.js','!js/**/*.min.js'] )

});

/*---------------
Styles
---------------*/
gulp.task('styles', function(){
  gulp.src( 'sass/style.scss' )
  .pipe( $.plumber() )
  .pipe( $.sourcemaps.init() )
  .pipe( $.sass( {outputStyle: 'compressed'} ) )
  
});

/*---------------
HTML
---------------*/

/*---------------
Images
---------------*/

/*---------------
Build
---------------*/

/*---------------
BrowserSync
---------------*/

/*---------------
Watch
---------------*/
