module.exports = function (grunt, options) {
	return {
		prod: {
			src: [
				'<%= paths.js %>/vendor/**/*.js',
				'<%= paths.js %>/theme.js',
			],
			dest: '<%= paths.dist %>/theme.min.js'
		}
	}
};