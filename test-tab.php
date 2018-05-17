<?php
/*
Template Name: Test Tab
*/
?>
<?php get_header(); ?>

<?php query_posts( array( 'post_status' => 'publish' , 'post_type' => array( 'charity' )  ) ); ?>
                                   <!-- this is where you should insert your content of the posts -->
                                   <?php echo the_title(); ?>
                                   <?php echo the_excerpt(); ?>
                <?php endwhile; ?>
                 <?php wp_reset_query(); ?>

<?php get_footer(); ?> 