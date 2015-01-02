    <?php
        get_header(); 
    ?>
            <main>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 remove-padding">
                            <div id="video-container">
                                <div class="is-table">
                                    <div class="table-cell">
                                        <p id="video-text"><?php the_block('Video Title Text'); get_the_block('Video Title Text', array('type' => 'one-liner')); ?></p>
                                    </div>
                                </div>
                                <a id="video-down-arrow-button" href="#section-one"><i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 1 -->

                <section id="section-one" class="container-fluid section-bottom white-background">
                    <div class="row">
                        <div class="col-lg-12 section-title-container section-header-background-1">
                            <div class="is-table">
                                <div class="table-cell">
                                    <h2 id="section-one-heading"><?php the_block('Section 1 Header'); get_the_block('Section 1 Header', array('type' => 'one-liner')); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <section id="section-1-content-container" class="row">
                            <div class="col-lg-6">
                                <p id="section-1-content-info-1" class="content-info font-brand-color-3 content-info-section-1-top-padding"><?php the_block('Section 1 Content 1'); get_the_block('Section 1 Content 1'); ?></p>
                            </div>
                            <div class="col-lg-6">
                                <p id="section-1-content-info-2" class="content-info font-brand-color-3 content-info-section-1-top-padding"><?php the_block('Section 1 Content 2'); get_the_block('Section 1 Content 2'); ?></p>
                            </div>
                        </section>
                    </div>
                </section>

                <!-- Section 2-->

                <section id="section-two">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 section-title-container section-header-background-2">
                                <div class="is-table">
                                    <div class="table-cell">
                                        <h2 id="section-two-heading"><?php the_block('Section 2 Header'); get_the_block('Section 2 Header', array('type' => 'one-liner')); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section id="about-me-section" class="container-fluid white-background">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="personal-image-container">
                                        <div id="personal-info">
                                            <h3 class="section-2-sub-title"><?php the_block('Section 2 Sub Header'); get_the_block('Section 2 Sub Header', array('type' => 'one-liner')); ?></h3>
                                            <p class="content-info font-brand-color-3"><?php the_block('Section 2 Content 1'); get_the_block('Section 2 Content 1'); ?></p>   
                                        </div>
                                        <img id="personal-img" src="<?php bloginfo('template_url'); ?>/images/garybaron.png" alt="A picture of Gary Baron" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="container-fluid">

                        <div class="row">                    
                            <div id="images-of-services" class="col-lg-12">
                                <div class="row">

                                    <!-- Mobile UI -->

                                    <?php if( wpmd_is_phone() ) : ?>

                                        <div id="collapse-panel-container-1" class="col-lg-12 remove-padding">

                                        <?php if ( have_posts() ) : ?>
                                            <?php $services_query = new WP_Query( 'cat=2&posts_per_page=-1' ); ?>
                                            <?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>	                                      

                                                <section class="panel-collapse">
                                                    <h3 data-panel-collapse-toggle="off"><i class="fa fa-chevron-circle-right"></i> <?php the_title(); ?></h3>
                                                    <p><?php the_content(); ?></p>
                                                </section>

                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        <?php else : ?>
                                            <p><?php _e( 'Services coming soon.' ); ?></p>
                                        <?php endif; ?>

                                        </div>

                                    <?php else : ?>

                                    <!-- Tablet and desktop UI -->

                                        <?php if ( have_posts() ) : ?>
                                            <?php $services_query = new WP_Query( 'cat=2&posts_per_page=-1' ); ?>

                                            <?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>	
                                            <?php
                                                //Get the URL src of the post's thumbnail image
                                                $post_thumbnail_image_id = get_post_thumbnail_id();
                                                $post_thumbnail_image_info_array = wp_get_attachment_image_src($post_thumbnail_image_id, 'full');
                                                $post_thumbnail_image_url_src = $post_thumbnail_image_info_array[0]; 

                                                //Get thumbnail image alt text
                                                $post_thumbnail_alt_text = get_post_meta($post_thumbnail_image_id, '_wp_attachment_image_alt', true);
                                            ?>

                                                <section class="col-md-6 col-lg-4 service-image-container">
                                                    <div data-image-button-toggle-layer="off" class="image-button-toggle-layer cursor-pointer"></div>
                                                    <div class="service-title">
                                                        <div class="is-table">
                                                            <div class="table-cell">
                                                                <h3><?php the_title(); ?></h3>
                                                                <p class="image-content-info font-brand-color-2"><?php the_content(); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="background-slide-toggle"></div>
                                                    <img src="<?php echo $post_thumbnail_image_url_src; ?>" alt="<?php echo $post_thumbnail_alt_text; ?>" class="img-responsive">
                                                </section>

                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        <?php else : ?>
                                            <p><?php _e( 'Services coming soon.' ); ?></p>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section 3-->

                <section id="section-three" class="container-fluid section-bottom white-background">
                    <div class="row">
                        <div class="col-lg-12 section-title-container section-header-background-3">
                            <div class="is-table">
                                <div class="table-cell">
                                    <h2 id="section-three-heading"><?php the_block('Section 3 Header'); get_the_block('Section 3 Header', array('type' => 'one-liner')); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <section class="col-md-12 col-lg-6">
                                <div id="section-info-content-container-1">
                                    <i class="fa fa-comments"></i>
                                    <h3 id="section-3-subtitle-1"><?php the_block('Section 3 Sub Header 1'); get_the_block('Section 3 Sub Header 1', array('type' => 'one-liner')); ?></h3>
                                    <p class="content-info font-brand-color-3"><?php the_block('Section 3 Content 1'); get_the_block('Section 3 Content 1'); ?></p>
                                </div>
                            </section>
                            <section class="col-md-12 col-lg-6">
                                <div id="section-info-content-container-2">
                                    <i class="fa fa-lock"></i>
                                    <h3 id="section-3-subtitle-2"><?php the_block('Section 3 Sub Header 2'); get_the_block('Section 3 Sub Header 2', array('type' => 'one-liner')); ?></h3>
                                    <p class="content-info font-brand-color-3"><?php the_block('Section 3 Content 2'); get_the_block('Section 3 Content 2'); ?></p>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-md-12 col-lg-6">
                                <div id="section-info-content-container-3">
                                    <i class="fa fa-gbp"></i>
                                    <h3 id="section-3-subtitle-3"><?php the_block('Section 3 Sub Header 3'); get_the_block('Section 3 Sub Header 3', array('type' => 'one-liner')); ?></h3>
                                    <p class="content-info font-brand-color-3"><?php the_block('Section 3 Content 3'); get_the_block('Section 3 Content 3'); ?></p>
                                </div>
                            </section>
                            <section class="col-md-12 col-lg-6">
                                <div id="section-info-content-container-4">
                                    <i class="fa fa-clock-o"></i>
                                    <h3 id="section-3-subtitle-4"><?php the_block('Section 3 Sub Header 4'); get_the_block('Section 3 Sub Header 4', array('type' => 'one-liner')); ?></h3>
                                    <p class="content-info font-brand-color-3"><?php the_block('Section 3 Content 4'); get_the_block('Section 3 Content 4'); ?></p>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>

                <!-- Section 4 -->

                <section id="section-four" class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 section-title-container section-header-background-4">
                            <div class="is-table">
                                <div class="table-cell">
                                    <h2 id="section-four-heading"><?php the_block('Section 4 Header'); get_the_block('Section 4 Header', array('type' => 'one-liner')); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="testimonial-section-container" class="row black-background"> 
                        <div id="testimonial-section">

                            <!-- Mobile UI -->

                            <?php if( wpmd_is_phone() ) : ?>

                                <div id="collapse-panel-container-2" class="col-lg-12 remove-padding">

                                <?php if ( have_posts() ) : ?>

                                    <!-- Testimonial query, that stores the GET variable -->
                                    <?php $testimonials_query = new WP_Query( 'cat=3&posts_per_page=8' ); ?>
                                    <?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>	                                      

                                        <section class="panel-collapse">
                                            <h3 data-panel-collapse-toggle="off"><i class="fa fa-chevron-circle-right"></i> <?php the_title(); ?></h3>
                                            <p><b><?php the_time('F, Y'); ?></b></br></br><?php the_content(); ?></p>
                                        </section>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php else : ?>
                                    <p><?php _e( 'Services coming soon.' ); ?></p>
                                <?php endif; ?>

                                </div>

                            <?php else : ?>

                                <?php
                                    //Retrieve the GET 'paged' variable from the url 
                                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                                    //Testimonial query, that stores the GET variable
                                    $testimonials_query = new WP_Query( 'cat=3&posts_per_page=4&paged=' . $paged  );
                                ?>

                                <?php if ( $testimonials_query->have_posts() ) : ?>

                                    <?php 
                                        //Call pagination buttons
                                        testimonial_pagination_nav();
                                    ?>

                                    <?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>	
                                    <?php
                                        //Get the URL src of the post's thumbnail image
                                        $post_thumbnail_image_id = get_post_thumbnail_id();
                                        $post_thumbnail_image_info_array = wp_get_attachment_image_src($post_thumbnail_image_id, 'full');
                                        $post_thumbnail_image_url_src = $post_thumbnail_image_info_array[0]; 

                                        //Get thumbnail image alt text
                                        $post_thumbnail_alt_text = get_post_meta($post_thumbnail_image_id, '_wp_attachment_image_alt', true);
                                    ?>
                                    <section class="col-lg-6 service-image-container">
                                        <div data-image-button-toggle-layer="off" class="image-button-toggle-layer cursor-pointer"></div>
                                        <div class="service-title">
                                            <div class="is-table">
                                                <div class="table-cell">
                                                    <h3><?php the_title(); ?></h3>
                                                    <div class="testimonial-quote">“<?php echo get_the_excerpt(); ?>”</div>
                                                    <div class="publish-date"><?php the_time('F, Y'); ?></div>
                                                    <p class="image-content-info font-brand-color-2"><b>“</b><?php the_content(); ?><b>”</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="background-slide-toggle"></div>
                                        <img src="<?php echo $post_thumbnail_image_url_src; ?>" alt="<?php echo $post_thumbnail_alt_text; ?>" class="img-responsive">
                                    </section>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php else : ?>
                                    <p><?php _e( 'Services coming soon.' ); ?></p>
                                <?php endif; ?>

                            <?php endif; ?>                        
                        </div>
                    </div>
                </section>


                <!-- Section 5 -->

                <section id="section-five" class="container-fluid white-background">
                    <div class="row">
                        <div class="col-lg-12 section-title-container section-header-background-5">
                            <div class="is-table">
                                <div class="table-cell">
                                    <h2 id="section-five-heading"><?php the_block('Section 5 Header'); get_the_block('Section 5 Header', array('type' => 'one-liner')); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div id="contact-info" class="col-lg-12">
                            <address itemscope itemtype="http://schema.org/ContactPoint">
                                <ul id="contact-information-list">
                                    <li>
                                        Email: <span itemprop="email"><?php the_block('Email Address'); get_the_block('Email Address', array('type' => 'one-liner')); ?></span>
                                    </li>
                                    <li>
                                        Mobile: <span itemprop="telephone"><?php the_block('Mobile Number'); get_the_block('Mobile Number', array('type' => 'one-liner')); ?></span>
                                    </li>
                                    <li>
                                        <a href="<?php the_block('LinkedIn Social Account URL'); get_the_block('Linked Social Account URL', array('type' => 'one-liner')); ?>"><i class="fa fa-linkedin-square"></i></a>
                                        <a href="<?php the_block('Facebook Social Account URL'); get_the_block('Facebook Social Account URL', array('type' => 'one-liner')); ?>"><i href="#" class="fa fa-facebook-square"></i></a> 
                                    </li>
                                </ul>
                            </address>
                            <address class="visible-xs" itemscope itemtype="http://schema.org/PostalAddress">
                                <i class="fa fa-globe"></i>
                                <ul id="street-address-information-list" itemprop="address">
                                    <li itemprop="streetAddress"><?php the_block('Location 1 Postal Address 1'); get_the_block('Location 1 Postal Address 1', array('type' => 'one-liner')); ?></li>
                                    <li itemprop="streetAddress"><?php the_block('Location 1 Postal Address 2'); get_the_block('Location 1 Postal Address 2', array('type' => 'one-liner')); ?></li></li>
                                    <li itemprop="streetAddress"><?php the_block('Location 1 Postal Address 3'); get_the_block('Location 1 Postal Address 3', array('type' => 'one-liner')); ?></li></li>
                                    <li itemprop="addressLocality"><?php the_block('Location 1 Postal Address City'); get_the_block('Location 1 Postal Address City', array('type' => 'one-liner')); ?></li></li>
                                    <li itemprop="postalCode"><?php the_block('Location 1 Post Code'); get_the_block('Location 1 Post Code', array('type' => 'one-liner')); ?></li>
                                </ul> 
                            </address>
                            <address class="visible-xs" itemscope itemtype="http://schema.org/PostalAddress">
                                <i class="fa fa-globe"></i>
                                <ul id="street-address-information-list" itemprop="address">
                                    <li itemprop="streetAddress"><?php the_block('Location 2 Postal Address 1'); get_the_block('Location 2 Postal Address 1', array('type' => 'one-liner')); ?></li>
                                    <li itemprop="streetAddress"><?php the_block('Location 2 Postal Address 2'); get_the_block('Location 2 Postal Address 2', array('type' => 'one-liner')); ?></li></li>
                                    <li itemprop="streetAddress"><?php the_block('Location 2 Postal Address 3'); get_the_block('Location 2 Postal Address 3', array('type' => 'one-liner')); ?></li></li>
                                    <li itemprop="addressLocality"><?php the_block('Location 2 Postal Address City'); get_the_block('Location 2 Postal Address City', array('type' => 'one-liner')); ?></li></li>
                                    <li itemprop="postalCode"><?php the_block('Location 2 Post Code'); get_the_block('Location 2 Post Code', array('type' => 'one-liner')); ?></li>
                                </ul> 
                            </address>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 remove-padding">
                            <div id="google-map-1" class="map hidden-xs" style="background:blue">
                                <address class="street-address-information-container" itemscope itemtype="http://schema.org/PostalAddress">
                                    <ul itemprop="address">
                                        <li itemprop="streetAddress"><?php the_block('Location 1 Postal Address 1'); get_the_block('Location 1 Postal Address 1', array('type' => 'one-liner')); ?></li>
                                        <li itemprop="streetAddress"><?php the_block('Location 1 Postal Address 2'); get_the_block('Location 1 Postal Address 2', array('type' => 'one-liner')); ?></li></li>
                                        <li itemprop="streetAddress"><?php the_block('Location 1 Postal Address 3'); get_the_block('Location 1 Postal Address 3', array('type' => 'one-liner')); ?></li></li>
                                        <li itemprop="addressLocality"><?php the_block('Location 1 Postal Address City'); get_the_block('Location 1 Postal Address City', array('type' => 'one-liner')); ?></li></li>
                                        <li itemprop="postalCode"><?php the_block('Location 1 Post Code'); get_the_block('Location 1 Post Code', array('type' => 'one-liner')); ?></li>
                                    </ul> 
                                </address>
                            </div>
                        </div>
                        <div class="col-lg-6 remove-padding">
                            <div id="google-map-2" class="map hidden-xs" style="background:orange">
                                <address class="street-address-information-container absolute-align-left" itemscope itemtype="http://schema.org/PostalAddress">
                                    <ul itemprop="address">
                                        <li itemprop="streetAddress"><?php the_block('Location 2 Postal Address 1'); get_the_block('Location 2 Postal Address 1', array('type' => 'one-liner')); ?></li>
                                        <li itemprop="streetAddress"><?php the_block('Location 2 Postal Address 2'); get_the_block('Location 2 Postal Address 2', array('type' => 'one-liner')); ?></li></li>
                                        <li itemprop="streetAddress"><?php the_block('Location 2 Postal Address 3'); get_the_block('Location 2 Postal Address 3', array('type' => 'one-liner')); ?></li></li>
                                        <li itemprop="addressLocality"><?php the_block('Location 2 Postal Address City'); get_the_block('Location 2 Postal Address City', array('type' => 'one-liner')); ?></li></li>
                                        <li itemprop="postalCode"><?php the_block('Location 2 Post Code'); get_the_block('Location 2 Post Code', array('type' => 'one-liner')); ?></li>
                                    </ul> 
                                </address>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
    <?php
        get_footer();