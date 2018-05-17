<?php
/*
Template Name: Who's Involved
*/
?>
<?php get_header(); ?>

<h2>Businesses</h2>

<div id="ajax-search">
<b>Enter location / postcode</b> <br /> <br /> <br />
<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
</div>

<?php $posts = get_posts('post_type=sponsors'); 
$count = count($posts); 
echo '<h2>'; echo '<span class="red-text">'; echo $count; echo '</span>'; echo ' Businesses '; echo '</h2>';
?>

	

<?php echo do_shortcode('[googlemaps]'); ?>

<?php

$args = array( 'post_type' => 'sponsors', 'posts_per_page' => 5 );

echo '<div id="community-archieve-about">';
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<li>';
	echo '<div class="community-company-about">'; the_post_thumbnail('community-company-about'); echo '</div>';
	echo '<div class="title">'; echo '<a href=" '. get_permalink() . ' ">'; the_title(); echo '</a>'; echo '</div>';
	echo '</li>';
endwhile;
	echo '</div>';
?>

<?php get_footer(); ?> 