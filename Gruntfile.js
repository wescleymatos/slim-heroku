module.exports = function(grunt) {

    grunt.initConfig({
        clean: {
            temp: [
                'public/js/app.js',
                'public/js/libs.js'
            ],
            all: [
                'public/js/*.js'
            ]
        },
        jshint: {
            app: {
                src: [
                    'public/js/app/**/*.js'
                ]
            }
        },
        concat: {
            app: {
                src: [
                    'public/js/app/**/*.js'
                ],
                dest: 'public/js/app.js'
            },
            libs: {
                src: [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'bower_components/metisMenu/dist/metisMenu.min.js',
                    'bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.min.js',
                ],
                dest: 'public/js/libs.js'
            }
        },
        uglify: {
            dist: {
                src: [
                    'public/js/libs.js',
                    'public/js/app.js'
                ],
                dest: 'dist/js/app.min.js'
            }
        },
        cssmin: {
            all: {
                src: [
                    'bower_components/bootstrap/dist/css/bootstrap.min.css',
                    'bower_components/metisMenu/dist/metisMenu.min.css',
                    'bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.min.css',
                    'bower_components/font-awesome/css/font-awesome.min.css'
                ],
                dest: 'public/css/style.min.css'
            }
        },
        copy: {
            all: {
                src: 'index.html',
                dest: 'dist/index.html'
            }
        },
        processhtml: {
            dist: {
                files: {
                    'dist/index.html': ['dist/index.html']
                }
            }
        },
        htmlmin: {
            dist: {
                options: {
                    removeComments: true,
                    collapseWhitespace: true
                },
                files: {
                    'dist/index.html': 'dist/index.html'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-processhtml');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');

    grunt.registerTask('dev', ['jshint:app', 'concat:libs', 'concat:app', 'cssmin']);
    grunt.registerTask('default', ['jshint', 'clean:all', 'concat:scripts', 'concat:libs', 'uglify', 'cssmin', 'clean:temp', 'copy:all', 'processhtml', 'htmlmin']);
};
