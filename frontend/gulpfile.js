const gulp = require('gulp'),
	  sass = require('gulp-sass'),
	  sourcemaps = require('gulp-sourcemaps'),
	  watch = require('gulp-watch'),
	  browserify = require('browserify'),
	  babelify = require('babelify'),
	  source = require('vinyl-source-stream'),
	  buff = require('vinyl-buffer'),
	  watchify = require('watchify'),
	  copy = require('gulp-copy'),
	  cleanCSS = require('gulp-clean-css'),
	  uglify = require('gulp-uglify'),
	  browserifyHandlebars = require('browserify-handlebars'),
	  gzip = require('gulp-gzip');


const assetsFolder = './../web/assets';
const jsConf = {
	'index': 'src/coffee/index.coffee',
	'watch': 'src/coffee/**/*.coffee'
}

const sassConf = {
	'main': 'src/scss/main.scss',
	'watch': 'src/scss/**/*.scss'
}

var browserifyConf = {
	transform: ['coffeeify', browserifyHandlebars], 
	extensions: ['.coffee']
}

const watchConf = {
	// usePolling: true, 
	// interval: 100
}

var compile = function(prod){
	var bundler, bf = browserify(jsConf.index, browserifyConf);
	bundler = bf.transform(babelify);

	var p = bundler.bundle()
		.on('error', function(err) { console.error(err); this.emit('end'); })
		.pipe(source('app.js'))
		.pipe(buff());

		if (prod){
			p = p.pipe(uglify())
		} else {
			p = p.pipe(sourcemaps.init({ loadMaps: true }))
			.pipe(sourcemaps.write('./'));
		}
		
		p.pipe(gulp.dest(assetsFolder))
		.pipe(gzip())
		.pipe(gulp.dest(assetsFolder));

	return p;
}

gulp.task('js:prod', function (cb) {
	return compile(true);
});

gulp.task('js', function (cb) {
	return compile(false);
});

gulp.task('js:watch', function (cb) {
	watch(jsConf.watch, (events, done) => {
        gulp.start('js');
    });
});


gulp.task('sass', () => {
	return gulp.src(sassConf.main)
		.pipe(sass().on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(gulp.dest(assetsFolder))
		.pipe(gzip())
		.pipe(gulp.dest(assetsFolder));
});

gulp.task('sass:watch', function () {
	watch(sassConf.watch, (events, done) => {
        gulp.start('sass');
    });
});


gulp.task('build', ['js:prod', 'sass'])
gulp.task('default', ['sass', 'sass:watch', 'js', 'js:watch'])