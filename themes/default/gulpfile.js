var gulp = require('gulp');
var penthouse = require('penthouse');
var Promise = require("bluebird");
var penthouseAsync = Promise.promisify(penthouse);
var plugins = require('gulp-load-plugins')(); // Load all gulp plugins
											  // automatically and attach
											  // them to the `plugins` object

var runSequence = require('run-sequence');    // Temporary solution until gulp 4
											  // https://github.com/gulpjs/gulp/issues/355

var pkg = require('./package.json');
var dirs = pkg['jpagov-configs'].directories;

var today = new Date();
var build = today.getFullYear()
			+ ('0' + (today.getMonth()+1)).slice(-2)
            + ('0' + today.getDate()).slice(-2);

var banner = '/*! Sistem Direktori Pegawai v' + pkg.version +
					' | ' + pkg.license.type + ' License' +
					' | ' + pkg.homepage + ' */\n\n';

var banner = ['/**',
  ' * <%= pkg.description %> - <%= build %>',
  ' * @version v<%= pkg.version %>',
  ' * @link <%= pkg.homepage %>',
  ' * @license <%= pkg.license.type %> <%= pkg.license.url %>',
  ' */',
  ''].join('\n');

gulp.task('clean', function (done) {
	require('del')([
		dirs.assets + '/*.json',
		dirs.assets + '/js/*.js',
		dirs.assets + '/css/*.css'
	], done);
});

gulp.task('copy', [
	'copy:js',
	'copy:css'
]);

gulp.task('bundle', [
	'bundle:js',
	'bundle:css'
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

gulp.task('bundle:js', function () {
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
	.pipe(plugins.rename('main.min.js'))
	.pipe(gulp.dest(dirs.assets + '/js/'));
});

gulp.task('bundle:css', function () {
	return gulp.src([
			dirs.src + '/css/bootstrap.css',
			dirs.src + '/css/app.css'
		])
		.pipe(plugins.concat('app.css'))
		.pipe(plugins.minifyCss({keepSpecialComments: 0}))
		.pipe(plugins.header(banner, { pkg : pkg, build: build } ))
		.pipe(plugins.rename('app.min.css'))
		.pipe(gulp.dest(dirs.assets + '/css/'));
});

gulp.task('rev', function () {
    // by default, gulp would pick `assets/css` as the base,
    // so we need to set it explicitly:
    return gulp.src([
    		'assets/css/app.min.css',
    		'assets/js/main.min.js'
    	], {base: 'assets'})
        .pipe(gulp.dest(dirs.assets))  // copy original assets to build dir
        .pipe(plugins.rev())
        .pipe(gulp.dest(dirs.assets))  // write rev'd assets to build dir
        .pipe(plugins.rev.manifest())
        .pipe(gulp.dest(dirs.assets)); // write manifest to build dir
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

gulp.task('imagemin', [
	'imagemin:avatar',
	'imagemin:email',
	'imagemin:assets'
]);

gulp.task('imagemin:avatar', function () {
    return gulp.src('../../content/adobe/*.jpg')
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}]
        }))
        .pipe(gulp.dest('../../content/avatar'));
});

gulp.task('imagemin:email', function () {
    return gulp.src('../../content/email/*.png')
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}]
        }))
        .pipe(gulp.dest('../../content/email'));
});

gulp.task('imagemin:assets', function () {
    return gulp.src(dirs.src + '/img/*.{jpg,png,svg}')
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}]
        }))
        .pipe(gulp.dest(dirs.assets + '/img'));
});

gulp.task('critical', [
	'critical:home',
	'critical:staff'
]);

gulp.task('critical:home', function(){
	penthouseAsync({
		url : 'https://sistem.jpa.gov.my/smp/',
		css : dirs.assets + '/css/app.css',
		height: 480
	}).then( function (criticalCSS){
		require('fs').writeFile(dirs.assets + '/css/home-critical.css', criticalCSS );
	}).then(function() {
		return gulp.src(dirs.assets + '/css/home-critical.css')
			.pipe(plugins.minifyCss({keepSpecialComments: 0}))
			.pipe(gulp.dest(dirs.assets + '/css/'));
	});
});

gulp.task('critical:staff', function(){
	penthouseAsync({
		url : 'https://sistem.jpa.gov.my/smp/hariadi-hinta',
		css : dirs.assets + '/css/app.css',
		height: 480
	}).then( function (criticalCSS){
		require('fs').writeFile(dirs.assets + '/css/staff-critical.css', criticalCSS );
	}).then(function() {
		return gulp.src(dirs.assets + '/css/staff-critical.css')
			.pipe(plugins.minifyCss({keepSpecialComments: 0}))
			.pipe(gulp.dest(dirs.assets + '/css/'));
	});
});


// ---------------------------------------------------------------------
// | Main tasks                                                        |
// ---------------------------------------------------------------------

gulp.task('build', function (done) {
	runSequence(
		['clean', 'bundle'],
		'rev',
		'copy',
		'critical',
	done);
});

gulp.task('default', ['build']);
