var gulp = require('gulp');
var plugins = require('gulp-load-plugins')(); // Load all gulp plugins
											  // automatically and attach
											  // them to the `plugins` object

var runSequence = require('run-sequence');    // Temporary solution until gulp 4
											  // https://github.com/gulpjs/gulp/issues/355

var pkg = require('./package.json');
var dirs = pkg['jpagov-configs'].directories;

var banner = '/*! Sistem Direktori Pegawai v' + pkg.version +
					' | ' + pkg.license.type + ' License' +
					' | ' + pkg.homepage + ' */\n\n';

gulp.task('clean', function (done) {
	require('del')([
		dirs.assets + '/js/*.js',
		dirs.assets + '/css/*.css'
	], done);
});

gulp.task('copy', [
	'copy:js',
	'copy:css'
]);

gulp.task('copy:js', function () {
	return gulp.src(dirs.src + '/js/*.js')
			   .pipe(gulp.dest(dirs.assets + '/js/'));
});

gulp.task('copy:css', function () {
	return gulp.src([
			dirs.src + '/css/*.css'
		]).pipe(gulp.dest(dirs.assets + '/css/'));
});

gulp.task('lint:js', function () {
	return gulp.src(dirs.src + '/js/app.js')
		.pipe(plugins.jscs())
		.pipe(plugins.jshint())
		.pipe(plugins.jshint.reporter('jshint-stylish'))
		.pipe(plugins.jshint.reporter('fail'));
});

gulp.task('bundle', function () {
    return gulp.src([
		dirs.src + '/js/ZeroClipboard.min.js',
		dirs.src + '/js/handlebars.js',
		dirs.src + '/js/bootstrap.min.js',
		dirs.src + '/js/typeahead.bundle.min.js',
		dirs.src + '/js/jquery.raty.js',
		dirs.src + '/js/jquery.toaster.js',
		dirs.src + '/js/app.js'
	])
    .pipe(plugins.concat('main.js'))
    .pipe(plugins.uglify()) // minify files
    .pipe(plugins.rev())
    .pipe(gulp.dest(dirs.assets + '/js/'))
    .pipe(plugins.rev.manifest({path: 'manifest.json'}))
    .pipe(gulp.dest(dirs.assets));
});

gulp.task('uncss', function() {
	return gulp.src(dirs.assets + '/css/app.css')
		.pipe(plugins.uncss({
			html: [
				'https://sistem.jpa.gov/smp',
				'https://sistem.jpa.gov/smp/hariadi-hinta'
			]
		}))
		.pipe(gulp.dest('./out'));
});


// ---------------------------------------------------------------------
// | Main tasks                                                        |
// ---------------------------------------------------------------------

gulp.task('build', function (done) {
	runSequence(
		['clean', 'bundle'],
		'copy',
	done);
});

gulp.task('default', ['build']);
