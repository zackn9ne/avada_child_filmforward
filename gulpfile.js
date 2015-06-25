var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    lr         = require('tiny-lr'),
    livereload = require('gulp-livereload'),
    server     = lr()
;

gulp.task('styles', function() {
  return sass('sass', {
    bundleExec: true
  })
    .pipe(gulp.dest('css'))
    .pipe(livereload(server))
   ;
});

gulp.task('watch', function() {
  gulp.watch('sass/*.scss', ['styles']);
  livereload.listen(35729, function(err){
      if(err) return console.log(err);
  });
});


gulp.task('default', ['styles', 'watch'], function() {

});
