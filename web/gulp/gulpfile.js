var gulp = require ( 'gulp' ),
sass = require ( 'gulp-sass' ),
browserSync = require ( 'browser-sync' ).create();

// Compile sass into CSS & auto-inject into browsers
gulp.task( 'sass' , function () {
return gulp.src( "../styles/*.scss" )
.pipe(sass().on( 'error' , sass.logError))
.pipe(gulp.dest( "../styles/" ))
.pipe(browserSync.stream());
});

// Static Server + watching scss/html/js files
gulp.task( 'serve' , [ 'sass' ], function () {
browserSync.init({
proxy : "127.0.0.1:8000" ,
});
gulp.watch( "../styles/*.scss" , [ 'sass' ]);
gulp.watch( "../BlogBundle/src/Resources/views/**/*.twig" ).on( 'change' ,
browserSync.reload);
gulp.watch( "../scripts/*.js" ).on( 'change' ,
browserSync.reload);
});
// default task
gulp.task( 'default' , [ 'serve' ]);