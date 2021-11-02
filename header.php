<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="hotel, bed and breakfast, accommodations, travel, motel">
    <meta name="description" content="Albert - Hotel and Bed&amp;Breakfast">
    <meta name="author" content="Ansonika">

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon-144x144-precomposed.png">

    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    
    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->
    
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- End Preload -->
    
     <!-- Header ================================================== -->
    <header>
    <div class="container">
        <div id="header_area" class="row <?php echo get_theme_mod('myresturent_Menu_position_setting')?>">
            <div class="col--md-3 col-sm-3 col-xs-3">
                <a href="<?php get_home_url();?>" id="logo">
                <img src="<?php echo get_theme_mod('myresturent_logo')?>" width="190" height="23" alt="" data-retina="true">
                </a>
            </div>
            <nav class="col--md-9 col-sm-9 col-xs-9">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">
                     <img src="<?php echo get_template_directory_uri();?>/assets/img/logo_m.png" width="141" height="40" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                  <?php 
                    wp_nav_menu(array(
                        'theme_clocation'=>'Main-Menu',
                        'menu_id'=>'nav',
                    ));
                  ?>
            </div><!-- End main-menu -->
            
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
    </header>
    <!-- End Header =============================================== -->