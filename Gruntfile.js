module.exports = function(grunt) {

    require('time-grunt')(grunt); // Need to require
    require('load-grunt-tasks')(grunt); // Load tasks automatically

    require('load-grunt-config')(grunt, {

        data: { // Define global variables in here
            dev: true,
            pkg: grunt.file.readJSON('package.json'),

            paths: {
                base: 'wp-content/themes/<%= pkg.themeName %>/assets',

                js: '<%= paths.base %>/js',
                sass: '<%= paths.base %>/sass',
                dist: '<%= paths.base %>/dist',
            },
        }
    });
};
