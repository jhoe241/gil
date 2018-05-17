<?php
/*
Template Name: Members
*/
?>
<?php get_header(); ?>


<h2>Members</h2>


<?php if ( current_user_can('sponsors') ) : ?>
 Sponsor
<?php endif; ?>

<?php if ( current_user_can('charity') ) : ?>
 Charity
<?php endif; ?>

<?php if ( current_user_can('buyer') ) : ?>
 Buyer
<?php endif; ?>


<?php get_footer(); ?> 