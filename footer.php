            <footer class="container-fluid">	
                <div class="row">
                    <div id="copy-right-info" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        &copy; 2014 
                        <?php 
                            if(date('Y') !== '2014')
                            {
                                echo " - " . date('Y') . " ";
                            }

                            echo get_bloginfo('name');
                        ?> 
                    </div>
                    <div id="design-credit-info" class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
                        <a href="<?php the_block('URL to designer website'); get_the_block('URL to designer website', array('type' => 'one-liner')); ?>">Designed by Robert Liverpool</a>
                    </div>
                </div>
            </footer>

            <!-- Javascript collision -->
            <script>
                jQuery.noConflict(); //Change $ syntax to prevent collision with other javascript frameworks
            </script>

            <!-- Authored JavaScript Minified -->
            
            <!-- build:js javascript/authored/authored-js.min.js -->
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/video.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/scroll-to-links.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/horizontal-menu.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/image-button-effect.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/scroll-down-effects.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/pagination-buttons.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/panel-collapse-toggle.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/javascript-authored/google-maps.js"></script>
            <!-- endbuild -->

            
        </div>
    <?php wp_footer(); ?>
    </body>
</html>


