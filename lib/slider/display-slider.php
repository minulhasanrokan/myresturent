<?php
    /**
    * display Slider function and methods file include section file
    * 
    * @package myresturent
    */
    // slider diplay section
    if (!function_exists('myResturentSliderDisplay')) {
    	
    	function myResturentSliderDisplay(){
    		
    		//Slider display or not get value from Slider customizer
			if (get_theme_mod('myresturent_Slider_Display_Setting') == 'Yes') { 
				// get slider category
				$sliderCategory=get_theme_mod('myresturent_Slider_Cetagory_Setting');
				// get slider number
				$sliderNumber=get_theme_mod('myresturent_Slider_Count_Setting');

    		?>
	    			<div class="carousel_in">
			    		<?php
			    		 // The Query for slider
						 $myResturentSlider = new WP_Query( array( 
						 	'post_type' => 'Slider', 
						 	'order' => 'DSC',
						    'post_status' => 'publish',
						    'posts_per_page' => $sliderNumber,
						    'tax_query' => array(
				                array(
				                     'taxonomy' => 'Slider-category',
				                     'field' => 'slug',
				                     'terms' => $sliderCategory
				                )
				            )

						 ) );
						 // The Loop for slider 
						 if ( $myResturentSlider->have_posts() ) {
							 while ( $myResturentSlider->have_posts() ) {
								 $myResturentSlider->the_post();
								 $slider_meta = get_post_meta( get_the_ID() );
					    	?>
					    	<div>
					    		<img src="<?php 
								if(has_post_thumbnail()){
								echo esc_url(the_post_thumbnail_url());
								}
								else{
									echo esc_url(get_home_url()."/wp-content/themes/myresturent/assets/img/slides/slide_1.jpg");
								}
								?>" alt="">
					    		<div class="caption">
					    			<a href="<?php the_permalink();?>">
						    			<h3>
						    				<?php
											// slider title
											if (the_title()) {
												the_title();
												}
											?>
						    			</h3>
						    		</a>
					    		</div>
					    	</div>
					    	<?php
								}
							 }
							 // Restore original slider Post Data
							 wp_reset_postdata(); 
							?>
					    </div>
    		<?php
    				}
    		}
    		add_action('doMyResturentSliderDisplay','myResturentSliderDisplay');
    }


    