var gulp = require( 'gulp' );
var gutil = require( 'gulp-util' );
var ftp = require( 'vinyl-ftp' );
var config = require('./config.json');
var phpcs = require('gulp-phpcs');

gulp.task('default', function () {
    return gulp.src(['/**/*.php', '!/vendor/**/*.*'])
        // Validate files using PHP Code Sniffer
        .pipe(phpcs({
            bin: '/vendor/bin/php-cs-fixer',
            standard: 'PSR2',
            warningSeverity: 0
        }))
        // Log all problems that was found
        .pipe(phpcs.reporter('./log'));
});

gulp.task( 'deploy', function () {

	var conn = ftp.create( {
		host:     config.host,
		user:     config.user,
		password: config.password,
		parallel: 3,
		log:      gutil.log
	} );

	var globs = [
		'public/**',
		'controller/**',
		'data/**',
		'lib/**',
		'logs/**',
		'model/**',
		'templates/**',
		'tests/**',
		//'vendor/**'
		'css/**',
		'js/**',
		'fonts/**',
		'*.json',
		'*.php',
		'!config*'
	];

	// using base = '.' will transfer everything to /public_html correctly
	// turn off buffering in gulp.src for best performance

	return gulp.src( globs, { base: '.', buffer: false } )
		.pipe( conn.newer( '/web/php-2.ihomehands.ru/public_html' ) ) // only upload newer files
		.pipe( conn.dest( '/web/php-2.ihomehands.ru/public_html' ) );

} );