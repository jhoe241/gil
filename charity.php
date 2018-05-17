<?php
/*
Template Name: Charities
*/
?>
<?php get_header(); ?>

<h2>Charities</h2>

<?php

$args = array( 'post_type' => 'charity', 'posts_per_page' => 10 );


echo '<div id="community-archieve">';
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<li>';
	echo '<div class="community-company">'; the_post_thumbnail('community-company'); echo '</div>';
	echo '<div class="title">'; echo '<a href=" '. get_permalink() . ' ">'; the_title(); echo '</a>'; echo '</div>';

	the_excerpt();
	echo '<div class="read-more">'; echo '<a href=" '. get_permalink() . ' ">'; echo 'Read More'; echo '</a>'; echo '</div>';

	echo '</li>';
endwhile;
	echo '</div>';
?>

<?php get_footer(); ?> 