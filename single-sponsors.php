<?php
/*
Template Name: Sponsors Post Single
*/
?>
<?php get_header(); ?>

<?php

$args = array( 'post_type' => 'sponsors' ); 
while ( have_posts() ) : the_post();

	echo '<div class="sponsors-wrap">';
	echo '<div class="sponsors-title">'; the_title(); echo '</div>';

	echo '<div class="sponsors-top-left">';
		echo '<img class="sponsors-banner" src="' . CFS()->get('banner') . '">';
		echo '<div class="sponsors-logo">'; the_post_thumbnail('the_post_thumbnail'); echo '</div>';	
		echo '<div class="sponsors-top-left-holder">';
			echo '<div class="one-half first">'; 
				echo '<div class="raised">'; echo '$26,080'; echo '</div>'; 
			echo '</div>';
			echo '<div class="one-half">'; echo 'Raised from sales of our deals'; echo '</div>';
		echo '</div>';
			
	echo '</div>';
	echo '<div class="sponsors-top-right">';
		echo '<h2>'; echo 'Buy our deals to support the community'; echo '</h2>';
		echo '<div class="steps">';
			echo '<strong>'; echo 'Step1'; echo '</strong>';
		echo '</div>';
		echo '<div class="steps-content">';
			echo '<p>'; echo 'ADD our deal(s) to your cart'; echo '</p>';
		echo '</div>';
		echo '<hr />';
		echo '<div class="steps">';
			echo '<strong>'; echo 'Step2'; echo '</strong>';
		echo '</div>';
		echo '<div class="steps-content">';
			echo '<p>'; echo 'In the cart, choose which charity, group or cause you’d like the deal funds to go to.'; echo '</p>';
			echo '<p>'; echo 'Or choose from one of  our favourites  we love giving to below.   '; echo '</p>';
		echo '</div>';
		echo '<div class="clear">'; echo'</div>';
			echo '<div style="margin-top:120px;">';
			echo do_action( 'addthis_widget' );	
			echo '</div>';
		
	echo '</div>';
	
	
	echo '<div class="clear">'; echo '</div>';
	
 echo'<ul class="tabs">';
        echo'<li class="labels">';
            echo'<label for="tab1" id="label1">'; echo'Our Deals'; echo'</label>';
            echo'<label for="tab2" id="label2">'; echo'About Us'; echo'</label>';
			echo'<label for="tab3" id="label3">'; echo'News'; echo'</label>';
        echo'</li>';
        echo'<li>';
            echo'<input type="radio" checked name="tabs" id="tab1">';
            echo'<div id="tab-content1" class="tab-content">';
                echo'<h3>'; echo'Our Deals'; echo'</h3>';
				echo CFS()->get('deals');
            echo'</div>';
        echo'</li>';
        echo'<li>';
            echo'<input type="radio" name="tabs" id="tab2">';
            echo'<div id="tab-content2" class="tab-content">';
                echo'<h3>'; echo'About US'; echo'</h3>';
					echo'<div class="about-us-left">';
						the_content();
						
					echo'</div>';
					echo '<div class="about-us-right">';
						
						echo'<div class="about-us-left-col">';
							echo 'ADD';
						echo '</div>';
						echo'<div class="about-us-right-col">';
							echo CFS()->get('address');
						echo '</div>';
						echo '<div class="clear">'; echo'</div>';
						
						echo'<div class="about-us-left-col">';
							echo 'OPEN';
						echo '</div>';
						echo'<div class="about-us-right-col">';
							echo CFS()->get('open');
						echo '</div>';
						echo '<div class="clear">'; echo'</div>';
						
						echo'<div class="about-us-left-col">';
							echo 'PHONE';
						echo '</div>';
						echo'<div class="about-us-right-col">';
							echo CFS()->get('phone');
						echo '</div>';
						echo '<div class="clear">'; echo'</div>';
						
						echo'<div class="about-us-left-col">';
							echo 'WEBSITE';
						echo '</div>';
						echo'<div class="about-us-right-col">';
							echo CFS()->get('website');
						echo '</div>';
						echo '<div class="clear">'; echo'</div>';

						echo'<div class="about-us-left-col">';
							echo 'SOCIAL';
						echo '</div>';
						echo'<div class="about-us-right-col">';
							echo '<a target="_blank" href="' . CFS()->get('facebook') . '">'; echo'<img style="margin-right:10px;" src="/wp-content/themes/gil/images/facebook.jpg" alt="">'; echo '</a>';
							echo '<a target="_blank" href="' . CFS()->get('twitter') . '">'; echo'<img style="margin-right:10px;" src="/wp-content/themes/gil/images/twitter.jpg" alt="">'; echo '</a>';
							echo '<a target="_blank" href="' . CFS()->get('google_plus') . '">'; echo'<img src="/wp-content/themes/gil/images/google_plus.jpg" alt="">'; echo '</a>';
						echo '</div>';
						echo '<div class="clear">'; echo'</div>';
						
						echo'<div class="about-us-left-col">';
							echo 'EMAIL';
						echo '</div>';
						echo'<div class="about-us-right-col">';
							echo CFS()->get('email');
						echo '</div>';
						
						if ( function_exists( 'pronamic_google_maps' ) ) {
						pronamic_google_maps( array(
							'width'  => 300,
							'height' => 300 
						) );
						}
						
						echo '<div class="clear">'; echo'</div>';
				
					echo '</div>';
				
            echo'</div>';
        echo'</li>';
        echo'<li>';
            echo'<input type="radio" name="tabs" id="tab3">';
            echo'<div id="tab-content3" class="tab-content">';
                echo'<h3>'; echo'News'; echo'</h3>';
				echo CFS()->get('news');
				
            echo'</div>';
        echo'</li>';
    echo'</ul>';
	
echo'<h3>'; echo'We proudly support...'; echo'</h3>';

echo '<h4>'; echo 'The money raised from our deals has gone towards these worthy groups and causes'; echo '</h4>';
	

 endwhile;
?>

<?php

$args = array( 'post_type' => 'community', 'posts_per_page' => 10 );


echo '<div id="community-archieve">';
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<li>';
	echo '<div class="community-company">'; the_post_thumbnail('community-company'); echo '</div>';
	echo '<div class="fundraising-type">'; echo CFS()->get( 'fundraising_type' ); echo '</div>';
	echo '<div class="title">'; echo '<a href=" '. get_permalink() . ' ">'; the_title(); echo '</a>'; echo '</div>';
	echo '</li>';
endwhile;
	echo '</div>';
?>

 </div>

<?php get_footer(); ?> 