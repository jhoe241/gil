<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div id="home-top">
<div class="wrap">
	<div class="one-half first">
		<div id="home-message">
			<div class="heading">Great deals that benefits communities</div>
			<a style="width:300px" class="red-button" href="/how-it-works">See how it works</a>
		</div>
	</div>
	<div class="one-half">
	</div>
</div><!-- wrap -->
</div>

<div id="deals-home">
<div class="wrap">
	<div class="one-half first">
		<span class="see-deals">See our deals</span>
	</div>
	<div class="one-half">
		<span class="all-deals">All deals are 66% off!</span>
	</div>
	
	<hr class="line" />
	<div class="one-half first">
		<div class="recent-deals">See the deals in your area</div>
		<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
	</div>
	<div class="one-half">
		<a class="alignright red-button" href="/deals">View All</a>
	</div>
	
	<?php echo do_shortcode('[recent_products per_page="12" columns="5" orderby="date" order="ASC"]'); ?>
	
</div><!-- wrap -->	
</div><!-- deals-home -->

<div id="deals-funds">
	<div class="wrap">
	<h2>You choose who receives your deal funds</h2>
	<hr class="line" />
	<div class="one-half first">
	<div class="recent-deals">See who's registered in your area</div>
	<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
	</div>
	<div class="one-half">
		<a class="alignright red-button" href="/community/">View All</a>
	</div>
	
	<div class="clear"></div>
	
<?php

$args = array( 'post_type' => array( 'charity','schools' ), 'posts_per_page' => 10 );


echo '<div id="community-archieve">';
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<li>';
	echo '<div class="community-company">'; the_post_thumbnail('community-company'); echo '</div>';
	echo '<div class="content-area">';
	echo '<div class="fundraising-type">'; echo CFS()->get( 'fundraising_type' ); echo '</div>';
	echo '<div class="title">'; echo '<a href=" '. get_permalink() . ' ">'; the_title(); echo '</a>'; echo '</div>';
	echo '<div id="current_fundraiser">';
	echo CFS()->get( 'current_fundraiser' ); echo '</div>';
	echo '<div class="one-half first">';
		echo '<div class="read-more">';  echo 'Raised'; echo '</div>';
	echo '</div>';
	echo '<div style="text-align:right" class="one-half">';
		echo '<img src="/wp-content/themes/gil/images/white-heart.jpg" alt="" />';
	echo '</div>';
	echo '</div>';
	echo '</li>';
endwhile;
	echo '</div>';
?>
		
	</div><!-- wrap -->
</div><!-- deals-funds -->

<div id="home-help-us">
	<div class="wrap">
			<div style="position:relative" id="help-us">
				<img class="ulo" src="/wp-content/themes/gil/images/ulo.png" alt="">
				<h4>Help us reach more communities in need</h4>
				<p>our tax deductable donation helps Giving is Living support more groups in need around Australia. The funds go towards maintaining and growing the website and signing up more members.</p>
				<a class="red-button-medium alignright" href="/how-it-benefits/">Donate</a>
			</div><!-- help-us -->

			<div id="corporate-sponsor">
				<div id="corporate-sponsor-left">
					<h4>Businesses can give without deals</h4>
					<p>Businesses can give without deals Don’t worry, if your business can’t easily offer deals, you can still register with Giving is Living and donate much needed funds to your community</p>
				</div>
				<div id="corporate-sponsor-right">
					<img src="/wp-content/themes/gil/images/women-with-hearth.jpg" alt="">
					<a style="margin-top:20px;" class="red-button-medium alignright" href="/how-it-benefits/">Learn More</a>
				</div>
			</div><!-- corporate-sponsor -->
			
	</div><!-- wrap -->
</div><!-- home-help-us -->

<div id="home-bottom">
	<div class="wrap">
		<div class="one-third first">
			<img style="margin-bottom:30px;" class="aligncenter" src="/wp-content/themes/gil/images/bis-mechanic.png" width="239" height="428" alt="">
			
				<a class="no-underline" href="/how-it-benefits/"><div class="learn-how">
				<p><strong>Learn how <br /> businesses benefit </strong></p>
			</div></a>
				<p class="register">or <a href="/register/sponsor">REGISTER</a> your business </p>
				
		</div>
		<div class="one-third">
			<img style="margin-bottom:30px;" class="aligncenter" src="/wp-content/themes/gil/images/deal-purchaser.png" alt="">
			
			<a class="no-underline" href="/how-it-benefits/"><div class="learn-how">
				<p class="aligncenter"><strong>Learn how deal<br /> purchasers benefit </strong></p>
			</div></a>
				<p class="register">or <a href="/register/to-buy-deals">REGISTER</a> to buy deals </p>

		</div>
		<div class="one-third">
			<img style="margin-bottom:30px;" class="aligncenter" src="/wp-content/themes/gil/images/school.png" alt="">
			
			<a class="no-underline" href="/how-it-benefits/"><div class="learn-how">
				<p class="aligncenter"><strong>Learn how <br /> communities benefit </strong></p>
			</div></a>
				<p class="register aligncenter">or <a href="/register/for-charity">REGISTER</a> to recieve funds </p>
		
		</div>
	</div><!-- wrap -->
	<div id="home-bottom-row2">
	<div class="wrap">
			<div class="one-third first">
					
			</div>
			<div class="one-third">
						
			</div>
			<div class="one-third">
				
			</div>
	</div><!-- wrap -->
	</div><!-- home-bottom-row2 -->
	
</div><!-- home-bottom -->

<?php get_footer(); ?> 