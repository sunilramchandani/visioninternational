var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass   = require('gulp-sass');

var mix  = require('laravel-mix');
var elixir = require('laravel-elixir');



// create a default task and just log a message
gulp.task('default', function() {
    return gutil.log('Gulp is running!');
});

elixir(function(mix) {
    mix.styles([
        './bower_components/bootstrap/dist/css/bootstrap.min.css',
        './bower_components/font-awesome/css/font-awesome.min.css',
        './bower_components/Ionicons/css/ionicons.min.css',
        './bower_components/morris.js/morris.css',
        './bower_components/jvectormap/jquery-jvectormap.css',
        './bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        './bower_components/bootstrap-daterangepicker/daterangepicker.css',
        './resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'adminlte/_all-skins.min.css',
        'adminlte/AdminLTE.min.css',
        './bower_components/summernote/dist/summernote.css'
    ], 'public/css/bower_bundle.css');

});

elixir(function(mix) {
    mix.sass([
        'bundle.scss'
    ], 'public/css/bundle.css');
});

elixir(function(mix) {
    mix.sass([
        'main.scss'
    ], 'public/css/main.css');
});

elixir(function(mix) {
    mix.copy(
        [
            './node_modules/font-awesome/fonts',
            './resources/assets/fonts',
            './bower_components/Ionicons/fonts',
            './bower_components/bootstrap/fonts',
        ], 'public/fonts', false);
});

elixir(function(mix) {
    mix.copy(
        [
            './bower_components/summernote/dist/font'
        ], 'public/css/font', false);
});

elixir(function(mix) {
    mix.scripts(
        [
            './bower_components/jquery/dist/jquery.min.js',
            './bower_components/jquery-ui/jquery-ui.min.js',
            'adminlte/widget.fix.js',
            './bower_components/bootstrap/dist/js/bootstrap.min.js',
            './bower_components/raphael/raphael.min.js',
            './bower_components/morris.js/morris.min.js',
            './bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
            './resources/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
            './resources/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
            './bower_components/jquery-knob/dist/jquery.knob.min.js',
            './bower_components/moment/min/moment.min.js',
            './bower_components/bootstrap-daterangepicker/daterangepicker.js',
            './bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
            './resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            './bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
            './bower_components/fastclick/lib/fastclick.js',
            'adminlte/adminlte.min.js',
            './bower_components/summernote/dist/summernote.js'
        ],
        'public/js/bundle.js');
});




