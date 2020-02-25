<?php
/*
Template name: Signup / download
*/
//require( TEMPLATEPATH .'/head.php');
get_header();
?>

<div class="wrapper">
<div id="content" class="content group landingpage-wrapper">
	<div class="main-full main-signup split-half group">
		<?php the_post(); ?>
		<h2 class="subhead2  color-orange"><?php the_title(); ?></h2>
		<hr>
		<p class="">After signing up, you will be able to download the design tools and start creating today!</p>
		<div class="ps-split">
			<div class="entry-content">
				<?php echo do_shortcode(get_the_excerpt()); ?>
			</div><!-- end .entry-content -->
		</div>
		<div class="ps-split signup-list">
			<?php the_content(); ?>
		</div>
	</div><!-- end .main -->
</div>
</div><!-- end wrapper -->
<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window,document,'script',

'https://connect.facebook.net/en_US/fbevents.js');


fbq('init', '987512781426904'); 

fbq('track', 'PageView');

</script>

<noscript>

<img height="1" width="1" 

src="https://www.facebook.com/tr?id=987512781426904&ev=PageView

&noscript=1"/>

</noscript>
<?php get_footer(); ?>

