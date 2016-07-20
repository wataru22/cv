var gulp = require('gulp'); // for less
var elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

gulp.task("copyfiles", function() {

    // jQuery
    gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
      .pipe(gulp.dest("resources/assets/js/"));

    // Bootstrap
    gulp.src("vendor/bower_dl/bootstrap/less/**")
      .pipe(gulp.dest("resources/assets/less/bootstrap/"));
    gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js")
      .pipe(gulp.dest("resources/assets/js/"));
    gulp.src("vendor/bower_dl/bootstrap/dist/fonts/*")
      .pipe(gulp.dest("public/assets/fonts/"));

    // Font-Awesome
    gulp.src("vendor/bower_dl/font-awesome/less/**")
      .pipe(gulp.dest("resources/assets/less/font-awesome/"));
    gulp.src("vendor/bower_dl/font-awesome/fonts/*")
      .pipe(gulp.dest("public/assets/fonts/"));

    // Moment
    // Bootstrap datetimepicker
    gulp.src("vendor/bower_dl/moment/moment.js")
      .pipe(gulp.dest("resources/assets/js/"));
    gulp.src("vendor/bower_dl/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")
      .pipe(gulp.dest("resources/assets/js/"));
    gulp.src("vendor/bower_dl/eonasdan-bootstrap-datetimepicker/src/less/**")
      .pipe(gulp.dest("resources/assets/less/bootstrap-datetimepicker/"));

    // uikit
    gulp.src("vendor/bower_dl/uikit/less/**")
      .pipe(gulp.dest("resources/assets/less/uikit/"));

});

elixir(function(mix) {

    // Combine scripts
    mix.scripts([
      'js/jquery.js',
      'js/bootstrap.js',
      'js/moment.js',
      'js/bootstrap-datetimepicker.min.js',
    ],
      'public/assets/js/cv.js', 'resources/assets'
    );

    mix.less([
      'bootstrap/bootstrap.less',
      'bootstrap-datetimepicker/bootstrap-datetimepicker-build.less',
      'font-awesome/font-awesome.less',
      'app.less',
    ], 'public/assets/css/cv.css');

    mix.less([
      'uikit/uikit.less',
      'cv_uikit.less',
    ], 'public/assets/css/cv_uikit.css');
});