<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>
<?php if(is_author()){ ?>
	<?php
		$author = get_the_author_meta('ID');
		echo do_shortcode('[ajax_load_more author="'.$author.'"]');
	?>
<?php } ?>
<?php if(is_category()){ ?>
	<?php
		$cat = get_category( get_query_var( 'cat' ) );
		$category = $cat->slug;	
	?>
    <h1><span>Category:</span> <?php echo single_cat_title('', false );?> </h1>
    <?php
		echo do_shortcode('[ajax_load_more category="'.$category.'"]');
	?>
<?php } ?>	
<?php if(is_tag()){ ?>
    <h1><span>Tag:</span> <?php echo single_cat_title('', false );?></h1>
    <?php
		$tag = get_query_var('tag'); 
		echo do_shortcode('[ajax_load_more tag="'.$tag.'"]');
	?>
<?php } ?>

<?php get_footer(); ?> 