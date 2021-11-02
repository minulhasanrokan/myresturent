<?php
    /**
    * The all function and methods file include section file
    * 
    * @package myresturent
    */

    // include theme support functions  file.....
    require get_template_directory() . '/lib/themesupport.php';

    // include style and script functions  file.....
    require get_template_directory() . '/lib/enqueuestylescript.php';

    // include all menu section functions  file.....
    require get_template_directory() . '/lib/menu.php';

    // include customizer section functions  file.....
    require get_template_directory() . '/lib/customizer.php';

    // include home page slider section functions  file.....
    require get_template_directory() . '/lib/slider/add-slider.php';

    // include home page display slider section functions  file.....
    require get_template_directory() . '/lib/slider/display-slider.php';

    // include home page Room section functions  file.....
    require get_template_directory() . '/lib/room/add-room.php';

    // include home page display Room section functions  file.....
    require get_template_directory() . '/lib/room/display-room.php';

