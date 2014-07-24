module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            options: {
                mangle: true,
                compress: true,
                preserveComments: false
            },
            dist: {
                files: {
                    'js/modernizr.js': [
                        'bower_components/modernizr/modernizr.js',
                        'bower_components/respond/dest/respond.src.js',
                        'bower_components/respond/dest/respond.matchmedia.addListener.src.js'
                    ],
                    'js/bundle.js': [
                        'bower_components/matches-selector/matches-selector.js',
                        'bower_components/jquery-bridget/jquery.bridget.js',
                        'bower_components/get-style-property/get-style-property.js',
                        'bower_components/get-size/get-size.js',
                        'bower_components/eventie/eventie.js',
                        'bower_components/eventEmitter/EventEmitter.js',
                        'bower_components/doc-ready/doc-ready.js',
                        'bower_components/outlayer/item.js',
                        'bower_components/outlayer/outlayer.js',
                        'bower_components/imagesloaded/imagesloaded.js',
                        'bower_components/masonry/masonry.js',
                        'bower_components/bootstrap-sass-twbs/assets/javascripts/bootstrap.js'
                    ]
                }
            }
        },

        concat: {
            dist: {
                options: {
                    'separator': ';'
                },
                files: {
                    'js/bundle.js': [
                        'bower_components/webfontloader/target/webfont.js',
                        'js/bundle.js'
                    ]
                }
            }
        },

        copy: {
            dist: {
                files: [
                    {
                        expand: true,
                        flatten: true,
                        filter: 'isFile',
                        dest: 'js',
                        src: [
                            'bower_components/jquery/dist/jquery.min.js',
                            'bower_components/jquery/dist/jquery.min.map'
                        ]
                    }
                ]
            }
        },

        sass: {
            dist: {
                options: {
                    'style': 'expanded',
                    'loadPath': ['bower_components/bootstrap-sass-twbs/assets/stylesheets']
                },
                files: {
                    'css/main.css': 'scss/main.scss'
                }
            }
        },

        coffee: {
            dist: {
                options: {
                    'join': true
                },
                files: {
                    'js/main.js': [
                        'coffee/webfont.coffee',
                        'coffee/masonry.coffee',
                        'coffee/plugins.coffee',
                        'coffee/main.coffee'
                    ]
                }
            }
        },

        watch: {
            dist: {
                files: [
                    'scss/main.scss',
                    'scss/_variables.scss'
                ],
                tasks: ['sass']
            }
        },

        clean: {
            dist: {
                src: ['js', 'css']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['uglify', 'concat', 'copy', 'sass', 'coffee']);
    grunt.registerTask('default', ['sass', 'watch']);
};
