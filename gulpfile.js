var gulp = require('gulp'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync').create(),
    php2html = require("gulp-php2html"),
    cssmin = require('gulp-cssmin'),
    autoprefixer = require('gulp-autoprefixer'),
    plumber = require('gulp-plumber'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename');

gulp.task('styles', function() {
  return gulp.src('assets/css/main.scss')
    .pipe(plumber({
      errorHandler: function (err) {
          console.log(err);
          this.emit('end');
      }
    }))
    .pipe(sass())
    .pipe(gulp.dest('./app/css'))
    .pipe(browserSync.stream())
    .pipe(cssmin())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
    }))
    .pipe(gulp.dest('./app/css'));
});
gulp.task('phptohtml', function(){
  gulp.src('src/pages/**/*.php')
	.pipe(php2html())
	.pipe(gulp.dest("./app"));
});

gulp.task('watch', function(){
  gulp.watch('src/pages/**/*.php', ['phptohtml']);
  gulp.watch('assets/css/**/*.scss', ['styles']);
  gulp.watch('app/*.html', browserSync.reload);
});

gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: './app'
    },
  })
})

gulp.task('default', ['browserSync','styles','phptohtml', 'watch'], function() {

});
