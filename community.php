<?php
/*
Template Name: Community
*/
?>
<?php get_header(); ?>

<h2>Communities</h2>

<?php $posts = get_posts('post_type=community'); 
$count = count($posts); 
echo '<div id="com-count">'; echo '<span style="color:#ff4653;">'; echo $count; echo '</span>'; echo ' registered to give funds to'; echo '</div>';
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
	echo '<div id="current_fundraiser">';
	echo CFS()->get( 'current_fundraiser' ); echo '</div>';
	echo '<div class="one-half first">';
		echo '<div class="read-more">'; echo '<a href=" '. get_permalink() . ' ">'; echo 'Raised'; echo '</a>'; echo '</div>';
	echo '</div>';
	echo '<div class="one-half">';
		echo '<img style="float:right" src="/wp-content/themes/gil/images/white-heart.jpg" alt="" />';
	echo '</div>';
	echo '</li>';
endwhile;
	echo '</div>';
?>
		

<?php get_footer(); ?> 