<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

    <head>
        
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Tells IE to use the latest version possible -->
        <meta name="author" content="Gary Baron">
        <meta name="website designer and developer" content="Robert Liverpool">
        <meta name="keywords" content="gary, baron, counselling, hand, healing, children, adults,general, mental, health, relationships, spiritual, guidance, work, emotional, issues, problems, solution, help">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!--This is the only internal css because you cannot put PHP wordpress functions in SASS or CSS-->
        <style>
            @font-face {
                font-family: cinzel;
                src: url('<?php bloginfo("template_url"); ?>/face-fonts/cinzel-regular-webfont.eot');
                src: url('<?php bloginfo("template_url"); ?>/face-fonts/cinzel-regular-webfont.eot?#iefix') format('embedded-opentype'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/cinzel-regular-webfont.woff2') format('woff2'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/cinzel-regular-webfont.woff') format('woff'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/cinzel-regular-webfont.ttf') format('truetype'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/cinzel-regular-webfont.svg#cinzelregular') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            
            @font-face {
                font-family: sinanova-regularregular;
                src: url('<?php bloginfo("template_url"); ?>/face-fonts/SinaNovaReg-webfont.eot');
                src: url('<?php bloginfo("template_url"); ?>/face-fonts/SinaNovaReg-webfont.eot?#iefix') format('embedded-opentype'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/SinaNovaReg-webfont.woff2') format('woff2'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/SinaNovaReg-webfont.woff') format('woff'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/SinaNovaReg-webfont.ttf') format('truetype'),
                     url('<?php bloginfo("template_url"); ?>/face-fonts/SinaNovaReg-webfont.svg#sinanova-regularregular') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            
            .close-cursor{
                cursor: url('<?php bloginfo("template_url"); ?>/custom-icons/close-cursor.ico'), default;
            }
            
            /*Background-section-title-image*/
            
            .section-header-background-1,.section-header-background-2,.section-header-background-3,.section-header-background-4,.section-header-background-5{
                background-position: center top;
                background-size: cover;
            }
            .section-header-background-1{
                background-image: url('<?php bloginfo("template_url"); ?>/images/section-1-image-header.jpg');
            }
            .section-header-background-2{
                background-image: url('<?php bloginfo("template_url"); ?>/images/section-2-image-header.jpg');
            }
            .section-header-background-3{
                background-image: url('<?php bloginfo("template_url"); ?>/images/section-3-image-header.jpg');
            }
            .section-header-background-4{
                background-image: url('<?php bloginfo("template_url"); ?>/images/section-4-image-header.jpg');
            }
            .section-header-background-5{
                background-image: url('<?php bloginfo("template_url"); ?>/images/section-5-image-header.jpg');
            }
            
        </style>
        
        <!-- Twitter Bootstrap CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css" media="screen" />

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bower_components/fontawesome/css/font-awesome.min.css" />
        
        <!-- Style Sheet -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
        
        <!-- JavaScript Libraries-->
        <script src="<?php bloginfo('template_url'); ?>/javascript-libs-minified/javascriptLibs.min.js"></script>
        
        <!-- Google Maps API Key -->
        <!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA_SqQ1jC2XCd-NuCxCgSNuq3Cxv6QVf8s&sensor=false"></script>-->
        
        <!-- Respond.js and HTML5shiv for IE 8 and lower in order to support HTML 5 elements and CSS 3 media queries -->
        <!--[if lt IE 9]>
            <script src="<?php bloginfo('template_url'); ?>/bower_components/respond-minmax/respond.min.js"></script>
            <script src="<?php bloginfo('template_url'); ?>/bower_components/html5shiv/html5shiv.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
        
    </head>
    
    <body>
        
        <header class="container-fluid">   
            <nav id="header-navigation">
                <div id="menu-heading-title">Menu <i id="cancel-header-navigation-icon" class="fa fa-times"></i></div>
                <ul>
                    <li><a href="#section-one"><?php the_block('Section 1 Header'); get_the_block('Section 1 Header', array('type' => 'one-liner')); ?></a></li>
                    <li><a href="#section-two"><?php the_block('Section 2 Header'); get_the_block('Section 2 Header', array('type' => 'one-liner')); ?></a></li>
                    <li><a href="#section-three"><?php the_block('Section 3 Header'); get_the_block('Section 3 Header', array('type' => 'one-liner')); ?></a></li>
                    <li><a href="#section-four"><?php the_block('Section 4 Header'); get_the_block('Section 4 Header', array('type' => 'one-liner')); ?></a></li>
                    <li><a href="#section-five"><?php the_block('Section 5 Header'); get_the_block('Section 5 Header', array('type' => 'one-liner')); ?></a></li>
                </ul>
            </nav>
            <div id="header-info-container" class="row">
                <div id="logo" class="col-xs-10 col-lg-11">
                    <?php echo get_bloginfo('name'); ?>
                </div>
                <div id="menu" class="col-xs-2 col-lg-1">
                    <i id="menu-icon" data-header-menu-icon-toggle="off" class="fa fa-bars default-menu-icon-colour"></i>
                </div>
            </div>
        </header>
        
        
		
 