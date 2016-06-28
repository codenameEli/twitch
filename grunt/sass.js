module.exports = function (grunt, options) {
    return {
        theme: {
            options: {
                outputStyle: 'compressed',
                sourceMap: options.dev ? true : false,
            },
            files: {
                '<%= paths.dist %>/theme.min.css':
                '<%= paths.sass %>/theme.scss'
            }
        },

        login: {
            options: {
                outputStyle: 'compressed',
                sourceMap: false,
            },
            files: {
                '<%= paths.dist %>/login.min.css':
                '<%= paths.sass %>/login.scss'
            }
        }
    }
};