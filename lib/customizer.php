<?php
    /**
    * The all customizer funtions file
    * 
    * @package myresturent
    */

    // logo customizer function
    function myresturentLogoCustomizerRegister($wp_customize){
        $wp_customize->add_section('myresturent_logo_area',array(
            'title'=> __('Head Area','myresturent'),
            'describtion'=> __('If you want to update your header area you can do it here'),
        ));

        $wp_customize->add_setting('myresturent_logo',array(
            'default'=>get_bloginfo('template_directory').'/assets/img/logo.png',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'myresturent_logo', array(
            'label'=> __('Logo Upload', 'myresturent'),
            'describtion'=> __('If you want to update your header area you can do it here'),
            'section'=> 'myresturent_logo_area',
            'setting'=>'myresturent_logo'
        )));
    }
    add_action('customize_register','myresturentLogoCustomizerRegister');

    // menu position
    function myresturentLogoPositionCustomizerRegister($wp_customize){
        $wp_customize->add_section('myresturent_Menu_position',array(
            'title'=> __('Header Menu Position Area','myresturent'),
            'describtion'=> __('If you want to Change your header logo position you can do it here, left or right','myresturent'),
        ));

        $wp_customize->add_setting('myresturent_Menu_position_setting',array(
            'default'=>'right_menu',
        ));

        $wp_customize->add_control('myresturent_Menu_position_setting',array(
            'label'=>__('Menu Position','myresturent'),
            'describtion'=> __('Select Your Menu Position','myresturent'),
            'setting'=>'myresturent_Menu_position_setting',
            'section'=>'myresturent_Menu_position',
            'type'=>'radio',
            'choices'=>array(
                'left_menu'=>__('Left Menu','myresturent'),
                'right_menu'=>__('Right Menu','myresturent')
            )            


        ));

    }
    add_action('customize_register','myresturentLogoPositionCustomizerRegister');

    // slider customizer section
    function myresturentSliderCustomizer($wp_customize){
        $wp_customize->add_section('myresturent_Slider',array(

            'title'=> __('Home Page Slider Section','myresturent'),
            'describtion'=> __('If you want to Change your Slider category Or Display/hide you can do it here','myresturent'),
        
        ));
        // add setting for slider display or not display
        $wp_customize->add_setting('myresturent_Slider_Display_Setting',array(
            'default'=>'Yes',
            
        ));

        // add controlfor slider display or not display
        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'myresturent_Slider_Display',array(

            'label' => __('Display slider section?'),
            'section' => 'myresturent_Slider',
            'settings' => 'myresturent_Slider_Display_Setting',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        
        )));

        //slider category setting
        $categories =get_terms('Slider-category');

        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        // setting for slider category option
        $wp_customize->add_setting('myresturent_Slider_Cetagory_Setting', array(
            'default'        => 'UnCategory'
        ));
        // control for header top phone number info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'myresturent_Slider_Cetagory', array(
            'label' => __('Select Slider Category:'),
            'section' => 'myresturent_Slider',
            'settings' => 'myresturent_Slider_Cetagory_Setting',
            'type'    => 'select',
            'choices' => $cats
        )));

        // setting for slider count display section
        $wp_customize->add_setting('myresturent_Slider_Count_Setting', array(
            'default' => 5,
        ));
        // control for slider info setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'myresturent_Slider_Count', array(
            'label' => __('How may slider want to section?'),
            'section' => 'myresturent_Slider',
            'settings' => 'myresturent_Slider_Count_Setting',
            'type' => 'select',
            'choices' => array(1 => 'One',2 => 'Two' ,3=> 'Three', 4=>  'Four', 5=> 'Five', 6=> 'Six',)
        )));

    }
    add_action('customize_register','myresturentSliderCustomizer');