module.exports = function(grunt){

    //CHANGE THESE VARIABLES WHEN DEPLOYING A BUILD OF THIS PROJECT ------------------------------------------------------>
    
    //Change this variable to the URL of the website this template will be distributed on.
    //This url will be used in SASS files as a URL reference for various style properties. For example, in the url value of a background image property - background-image:url( URL WOULD BE INSERTED HERE);.
    //This variable is dynamically injected in via the grunt task 'processhtml:configSassWpTemplateUrl', which you can look at below, in this file. 
    var sass_wp_template_url = "$wp-template-url: 'http://127.0.0.1:8080/wordpress/wp-content/themes/wp_template_dest';";
    
    
    //Change this variable to the name you wish to give to the dest folder. This name will be the wordpress template name.
    //YOU MUST ALSO CHANGE ALL 'wp_template_dest' PATHS TO THE NAME YOU'VE GIVEN IN THE 'dest_folder_name' VARIABLE BELOW.
    //YOU CAN DO THIS BY USING YOUR TEXT EDITORS SEARCH AND REPLACE FEATURES.
    var dest_folder_name = 'wp_template_dest';
   
    //------------------------------------------------------------------------------------------------------------------->

    grunt.initConfig({
        
        pkg: grunt.file.readJSON('package.json'),
        
        compass: { //A SASS library. This plugin comes with sass, so no need to install a grunt sass plugin aswell.
            dev: {
                options: {
                    sassDir: 'stylesheets',
                    cssDir: './', //specify the route of the project to emit the compiled css file
                    noLineComments: false,
                    outputStyle: 'compressed'
                }
            },
            dest: {
                options: {
                    sassDir: dest_folder_name + '/stylesheets',
                    cssDir: dest_folder_name, //specify the route of the project to emit the compiled css files
                    noLineComments: false,
                    outputStyle: 'compressed'
                }
            }
        },
        sprite: { // Image spriting. If this plugin is used, the computer will need a download of graphics magick software in the execution path.
            all: {
                src: ['images/sprites/*.jpg'],
                destImg: 'images/sprites/spritesheet/spritesheet.jpg',
                destCSS: 'stylesheets/sprites.css',
                engine: 'gm',
                algorithm: 'left-right'
            }
        },
        watch: { //Watch the project for changes to any sass, html, php and javascript files.
            options: {
                livereload: true
            },
            compass: {
                files: ['stylesheets/**/*.scss'], //Any changes to SASS files will trigger the task and reload the browser.
                tasks: ['compass:dev']
            },
            htmlAndPhpFileChanges: { //Reload the browser for any changes to PHP or HTML files in the root directory. Add other file extensions aswell if I need them.
                files: ['*.php','*.html']
            },
            authoredJavascriptFilesChanged: { //Reload the browser for any changes to athored javascript files.
                files: ['javascript-authored/*.js']
            },
            newBowerFiles: { //Reload the browser for any changes to bower files or adding of new files.
                files: ['bower_components/**/*']
            },
            gruntFileJs: { //Watch gruntfile.js so that it can reload itself if changes are made to the file when running the 'watch' task.
                files: ['Gruntfile.js']
            }
        },
        copy: { 
            build_dest_folder: { //Copy folders apart from some and move it to the new dest folder
                src: ['**/*', '!node_modules/**', '!nbproject/**', '!style.css', '!javascript-authored/**', '!bower_components/**', 'bower_components/fontawesome/**/*', 'bower_components/respond-minmax/**/*', 'bower_components/html5shiv/**/*', '!Gruntfile.js', '!package.json', '!bower.json'],
                dest: dest_folder_name + '/'
            }
        },
        concat: { //Put all javascript files together. Must be in a certain order, hence why I have'nt selected all the files
            authoredJavascript: {
                src: ['javascript-authored/video.js',
                    'javascript-authored/scroll-to-links.js',
                    'javascript-authored/horizontal-menu.js',
                    'javascript-authored/image-button-effect.js',
                    'javascript-authored/scroll-down-effects.js',
                    'javascript-authored/pagination-buttons.js',
                    'javascript-authored/panel-collapse-toggle.js',
                    'javascript-authored/google-maps.js'],
                dest: dest_folder_name + '/javascript-authored-minified/javascript.js'
            },
            javascriptLibraries: {
                src: ['bower_components/jquery/dist/jquery.min.js',
                    'bower_components/velocity/velocity.min.js',
                    'bower_components/velocity/velocity.ui.min.js',
                    'bower_components/blast-text/jquery.blast.min.js',
                    'bower_components/modernizr/modernizr.js',
                    'bower_components/detect-mobile-browser/detectmobilebrowser.js'],
                dest: dest_folder_name + '/javascript-libs-minified/javascriptLibs.js'
            }
        },
        uglify: { //Minify files
            authoredJavascript: {
                src: dest_folder_name + '/javascript-authored-minified/javascript.js',
                dest: dest_folder_name + '/javascript-authored-minified/javascript.min.js'
            },
            javascriptLibraries: {
                src: dest_folder_name + '/javascript-libs-minified/javascriptLibs.js',
                dest: dest_folder_name + '/javascript-libs-minified/javascriptLibs.min.js'
            }
        },
        processhtml: {//Put all stylesheet files in 1 request call link, all javascript authored files in 1 request call link and all javascript library files in 1 request call link.
            build: {
                options: {
                    data: {
                        javascript_libs: '<script src="<?php bloginfo(\'template_url\'); ?>/javascript-libs-minified/javascriptLibs.min.js"></script>',
                        javascript_authored: '<script src="<?php bloginfo(\'template_url\'); ?>/javascript-authored-minified/javascript.min.js"></script>'
                    }
                },
                files: {
                    'wp_template_dest/header.php' : [dest_folder_name + '/header.php'],
                    'wp_template_dest/footer.php' : [dest_folder_name + '/footer.php']
                }
            },
            configSassWpTemplateUrl: {
                options: {
                    data: {
                        wp_template_url: sass_wp_template_url
                    }
                },
                files: {
                    'wp_template_dest/stylesheets/configuration/_config.scss' : [dest_folder_name + '/stylesheets/configuration/_config.scss']
                }
            }
        },
        clean: {
            removeStyleSheets: {
                src: [dest_folder_name + "/stylesheets"]
            }
        }
        
    });
    
    // 3. Where we tell Grunt we plan to use this plug-in.
    
    grunt.loadNpmTasks('grunt-contrib-concat'); //CSS minify
    grunt.loadNpmTasks('grunt-contrib-uglify'); //JavaScript minify
    grunt.loadNpmTasks('grunt-contrib-watch'); //Watches the project for changes to run various tasks.
    grunt.loadNpmTasks('grunt-contrib-compass'); //A SASS library
    grunt.loadNpmTasks('grunt-spritesmith'); //If used, the computer will need a download of graphics magick software installed in the execution path.
    grunt.loadNpmTasks('grunt-notify'); //JS notification
    grunt.loadNpmTasks('grunt-newer'); //Run tasks on files that have been modified 
    grunt.loadNpmTasks('grunt-contrib-copy'); //Copy files. Use mainly for creating a dist folder for a site
    grunt.loadNpmTasks('grunt-contrib-cssmin'); //Minifies css.
    grunt.loadNpmTasks('grunt-processhtml'); //Change html files. Used for changing directory paths for stylesheets and javascript in build environment.
    grunt.loadNpmTasks('grunt-contrib-clean'); //Delete folders and files
    grunt.loadNpmTasks('grunt-sync');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('sync_deploy', ['sync']);
    
    grunt.registerTask('deploy_build', [
        'copy:build_dest_folder',
        'processhtml:configSassWpTemplateUrl',
        'compass:dest',
        'concat:authoredJavascript',
        'concat:javascriptLibraries',
        'uglify:authoredJavascript',
        'uglify:javascriptLibraries',
        'clean:removeStyleSheets', 
        'processhtml:build']);
};