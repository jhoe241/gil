<?php
/*
Template Name: Schools Post Single
*/
?>
<?php get_header(); ?>

<?php

$args = array( 'post_type' => 'schools' );
while ( have_posts() ) : the_post();

	echo '<div style="background-color:#fff; padding:10px;" class="three-fourths first">';
		echo '<img src="' . CFS()->get('banner') . '">';
			echo '<div class="three-fourths first">';
					echo '<div id="fundraiser_goal">';
					echo CFS()->get( 'fundraiser_goal' ); 
					echo ' Fundraiser Goal'; echo '</div>'; 
					
					echo '<hr />';
				echo '<div style="border-right:1px solid #ccc" class="one-half first">';
					echo '<div id="current_fundraiser">';
					echo CFS()->get( 'current_fundraiser' ); echo ' Raised for the general fund'; echo '</div>';
				echo '</div>';
				
				echo '<div class="one-half">';
					echo 'Supported by:'; echo '<br />';
					echo '<div style="float:left">'; 
						echo '20 Individuals';
					echo '</div>';
					echo '<div style="float:right">';
						echo '10 Businesses';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			
			echo '<div class="one-fourth">';
				echo '<div class="">'; the_post_thumbnail('the_post_thumbnail'); echo '</div>';	
			echo '</div>';
		
		echo '<hr />';

		echo '<div class="entry-content">';
		echo '<div style="font-size:28px; font-weight:bold" class="title">'; the_title(); echo '</div>';
		the_content();
		echo '</div>';
		do_action( 'addthis_widget' );
	echo '</div>';
	echo '<div class="one-fourth">';
		echo '<div class="school-profile">'; echo 'Community Profile'; echo '</div>';
			echo '<div class="chool-profile-area">';
				echo '<b>'; echo 'ABN: '; echo '</b>';  echo CFS()->get( 'abn' ); echo '<br />';
				echo '<b>'; echo 'Address: '; echo '</b>'; echo CFS()->get( 'address' ); echo '<br />';
				echo '<b>'; echo 'Open: '; echo '</b>'; echo CFS()->get( 'open' ); echo '<br />';
				echo '<b>'; echo 'Phone: '; echo '</b>'; echo CFS()->get( 'phone' ); echo '<br />';
				echo '<b style="margin-right:5px">'; echo 'website: '; echo '</b>'; echo CFS()->get( 'website' ); echo '<br />';
				echo '<b style="margin-right:5px">'; echo 'Social Media'; echo '</b>';
							echo '<a target="_blank" href="' . CFS()->get('facebook') . '">'; echo'<img style="margin-right:10px;" src="/wp-content/themes/gil/images/facebook.jpg" alt="">'; echo '</a>';
							echo '<a target="_blank" href="' . CFS()->get('twitter') . '">'; echo'<img style="margin-right:10px;" src="/wp-content/themes/gil/images/twitter.jpg" alt="">'; echo '</a>';
							echo '<a target="_blank" href="' . CFS()->get('google_plus') . '">'; echo'<img src="/wp-content/themes/gil/images/google_plus.jpg" alt="">'; echo '</a>';				
				echo '<br />';
				echo '<b style="margin-right:5px">'; echo 'Email'; echo '</b>';  echo CFS()->get( 'email' );
			echo '</div>';
			
			echo '<div class="school-profile">'; echo 'Map'; echo '</div>';
			echo '<div class="chool-profile-area">'; echo '</div>';
			
			echo '<div class="school-profile">'; echo 'Biggest givers'; echo '</div>';
			echo '<div class="chool-profile-area">'; echo '</div>';
		
	echo '</div>';
  endwhile;
?>

<div style="clear:both"></div>

<div id="big-thanks">
	<div class="one-half first">
		<h2>Big Thanks!</h2>
	</div>
	<div class="one-half">
		<b>to the generous businesses who have donated their products and services to help us raise funds! </p>
	</div>
</div>

<div stlye="clear:both"></div>

<div id="thanks-to">

<?php

$args = array(
			'post_type' => 'product',
			'posts_per_page' => 30
			);

    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
        <li>    
            <?php   
                echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' );
				echo '<div class="donator-title">'; the_title(); echo '</div>';
            ?>
        </li>

<?php 
    endwhile;
    wp_reset_query(); 
?>

</div>

<?php get_footer(); ?> 