<?php
/*
Template Name: Home Page old
*/
?>
<?php get_header(); ?>

<?php
$args = array( 'post_type' => 'community', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<li>';
	echo '<div class="portfolio-item hvr-underline-from-center">'; the_post_thumbnail('portfolio'); echo '</div>';
    echo '<div class="title">'; echo '<a href=" '. get_permalink() . ' ">'; the_title(); echo '</a>'; echo '</div>'; 
    echo '<div class="entry-content">';
    the_content();
    echo '</div>';
	echo '<div id="amount">';
	echo '$'; echo CFS()->get( 'amount' );
	echo '</div>';
	echo '<div id="value">';
	echo CFS()->get( 'value' ); echo ' value';
	echo '</div>';
	echo '</li>';
endwhile;

?>
<?php get_footer(); ?> 