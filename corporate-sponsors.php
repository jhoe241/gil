<?php
/*
Template Name: Corporate Sponsors
*/
?>
<?php get_header(); ?>

<h1>Corporate Sponsors</h1>

<div class="wrap">
	<div class="one-third first">
		<h3><span class="red-text">“Sponsors</span> work with Giving is Living to make a big difference in communities.”</h3>
		<img src="/wp-content/themes/gil/images/Corporate_Sponsor.png" alt="" />
	</div>
	<div class="one-third">
<h4>Targeted giving within communities</h4>
<p>Working together with Giving is Living, 
we can work out the areas of greatest 
need within the sponsor’s local or 
broader community and distribute 
donations to achieve the greatest impact.</p>

<h4>Your own Giving is Living corporate sponsor page </h4>

<p>Corporate sponsors receive their own 
page from which they can:</p>

<ul>
<li> post news and updates</li>
<li>track and promote how much they’ve raised  for the community  </li>
<li>set up deals (if applicable), which will be given preferential treatment within search results </li>
</ul>	
	</div>
	<div class="one-third">
<h4>Create Goodwill and build relationships </h4>
<p>Being seen making a real difference within 
the communty creates goodwill  and 
encourages brand loyalty and awareness 
from our growing member database.</p>
<h4>Tax Deductable</h4>
<p>Giving is Living is a registered charity,
all sponsorship donations are tax 
deductable.</p>

<a class="red-button" href="/resister/sponsor">CONTACT US TO <br /> BECOME A SPONSOR</a>
	</div>
</div>


<h2>Recent Added Sponsors</h2>

<?php

$args = array( 'post_type' => 'sponsors', 'posts_per_page' => 10 );


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