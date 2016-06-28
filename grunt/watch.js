module.exports = function (grunt, options) {
    return {
        sass: {
            files: [
                '<%= paths.sass %>/**/*.scss',
            ],
            tasks: [ 'sass' ],
            options: {
                livereload: options.dev ? true : false,
            },
        },

        js: {
            files: [
                '<%= paths.js %>/**/*.js',
                '!<%= paths.js %>/**/*.min.js',
            ],
            tasks: [ 'uglify' ],
            options: {
                livereload: options.dev ? true : false,
            },
        }
    }
};