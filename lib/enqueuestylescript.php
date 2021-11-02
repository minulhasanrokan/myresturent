<?php
    /**
    * The all styel and script file include section file
    * 
    * @package myresturent
    */

	// theme styele and js function
	function myResturentCssJs(){
		
		// register css file...
		wp_register_style( 'animate', get_stylesheet_directory_uri( ).'/assets/css/animate.min.css', array(), '1.0.0','all' );

		wp_register_style( 'bootstrap', get_stylesheet_directory_uri( ).'/assets/css/bootstrap.min.css', array(), '5.0.2','all' );

		wp_register_style( 'menu', get_stylesheet_directory_uri( ).'/assets/css/menu.css', array(), '1.0.0','all' );

		wp_register_style( 'theme-style', get_stylesheet_directory_uri( ).'/assets/css/style.css', array(), '1.0.0','all' );

		wp_register_style( 'responsive', get_stylesheet_directory_uri( ).'/assets/css/responsive.css', array(), '1.0.0','all' );

		wp_register_style( 'icon_set_1', get_stylesheet_directory_uri( ).'/assets/css/fontello/css/icon_set_1.css', array(), '1.0.0','all' );

		wp_register_style( 'icon_set_2', get_stylesheet_directory_uri( ).'/assets/css/fontello/css/icon_set_2.css', array(), '1.0.0','all' );

		wp_register_style( 'fontello', get_stylesheet_directory_uri( ).'/assets/css/fontello/css/fontello.css', array(), '1.0.0','all' );

		wp_register_style( 'magnific-popup', get_stylesheet_directory_uri( ).'/assets/css/magnific-popup.css', array(), '1.0.0','all' );

		wp_register_style( 'owl.carousel', get_stylesheet_directory_uri( ).'/assets/css/owl.carousel.css', array(), '1.0.0','all' );

		wp_register_style( 'owl.theme.default', get_stylesheet_directory_uri( ).'/assets/css/owl.theme.default.css', array(), '1.0.0','all' );

		
		// enqueue css file
		wp_enqueue_style( 'animate');
		wp_enqueue_style( 'bootstrap');
		wp_enqueue_style( 'menu');
		wp_enqueue_style( 'theme-style');
		wp_enqueue_style( 'responsive');
		wp_enqueue_style( 'icon_set_1');
		wp_enqueue_style( 'icon_set_2');
		wp_enqueue_style( 'fontello');
		wp_enqueue_style( 'magnific-popup');
		wp_enqueue_style( 'owl.carousel');
		wp_enqueue_style( 'owl.carousel.default');
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		// enqueue script file
		wp_enqueue_script( 'jquery-1.11.2', get_template_directory_uri().'/assets/js/jquery-1.11.2.min.js', array(), '1.0.0', true );

		wp_enqueue_script( 'common_scripts', get_template_directory_uri().'/assets/js/common_scripts_min.js', array(), '1.0.0', true );

		wp_enqueue_script( 'validate', get_template_directory_uri().'/assets/js/validate.js', array(), '1.0.0', true );

		wp_enqueue_script( 'functions', get_template_directory_uri().'/assets/js/functions.js', array(), '1.0.0', true );

	}
	add_action('wp_enqueue_scripts','myResturentCssJs');

	// google font
	function myResturentGoogleFont(){
		wp_enqueue_style('my-Resturent-Google-Font','https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet', false);
	}

	add_action('wp_enqueue_scripts','myResturentGoogleFont');