module.exports = function (grunt, options) {
    return {
        options: {
            files: ['wp-content/themes/<%= pkg.themeName %>/style.css'],
            commit: false,
            createTag: false,
            push: false,
        }
    }
};