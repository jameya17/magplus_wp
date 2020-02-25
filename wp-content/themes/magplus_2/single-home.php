<?php 
/*
Template name: Home Page
*/
get_header();


the_post();
do_action('homepage');
$meta = get_post_meta($post->ID, '_landing_meta', true);
$title = get_post_meta($post->ID, '_alt_page_title', true);
$title_color = get_post_meta($post->ID, '_alt_page_title_color', true);
?>
<? /*
<video autoplay  poster="/images/hp-video.jpg" id="bgvid" loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->

<source src="/images/hp-video-test.mp4" type="video/mp4">
</video>
*/ ?>

	
<div class="home-page">


	<div class="mantle" style="opacity:0">
		<div class="container content">
			<div class="floater infographicmantle">
				<div class="column-l">
					<h1><? the_field('_alt_page_title'); ?></h1>
	
					<? the_content() ?>
					<div class="tour">
						<a href="#" class="btn-seeit">
							<em></em>
							<h3>See more</h3>
						</a>
					</div>
					<div class="carcl-publish"></div>
				</div>
			</div>
		</div>
	<div class="bgimage" style="opacity:0;background-image: url('<? $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>')"  /></div>
	
		
</div>

<div class="infoGraphic igbox-1">
	<div class="floater">
		<canvas id="canvas1" width="100%" height="680" class="infographic1" style="visibility: hidden;">
		
			<h2> How it Works</h2>
			<p>
				Mag+ digital publishing software covers every part of the app publishing process: Design your content using simple tools; build your own branded mobile app on our web portal; and distribute your designed content to that app for end users to experience on their mobile devices. 
			</p>
				
			<h3>Design</h3>
			<p>
			Mag+ offers a powerful plug-in for Adobe InDesign, the most popular design software 
			in the world. Your existing team can create interactive, multimedia layouts native for 
			the touchscreen.
			</p>
			<p>
				Need design help? Our in-house creative agency, Mag+ Studios, can take on all design and production work.
			</p>

	
			<h3>Build &amp; Distribute</h3>
			<p>
			Your Mag+ powered mobile app is how users consume your content. Use our web tools to create a fully branded app with analytics, messaging and more, for public or internal use.
			</p>
			<p>
				Need more features? Our Mag+ App SDK lets you custom develop your own app around our engine.
			</p>



			<h3>Publish</h3>
			<p>
			Once your app is on your users’ devices, publishing your content—whether documents, issues, push messages or live feeds—is as simple as uploading a file and pushing a button.
			</p>
			<p>
				Need a hand? Our 24/7 support team can answer any question, or you can check out our extensive online resources.

			</p>

		</canvas>
	</div>
</div>
<div class="infoGraphic igbox-2">
	<div class="floater">
		<canvas id="canvas2" width="100%" height="580" class="infographic2" style="visibility: hidden;"></canvas>
		<noscript>
			<h2>What is Mag+</h2>
			<p>
				Mag+ makes it easy to publish your content to your own mobile app. From text to video to interactive elements, no matter the source, the Mag+ software lets you bring your content to life on tablets and phones with no coding and no hassles. 
			</p>
			<p>
				With the Mag+ software, any type of content can become an app, whether for sales, publishing, product info, HR, fans and alumni or anything else you need to distribute to mobile. 
			</p>
			<p>
				Mag+ lets you build your own app for iOS, Android, Kindle Fire or internal distribution using a simple web-based interface.   
			</p>
		</noscript>
	</div >
</div>
<div class="igbox-3 companies-using">
	<div id="content" class="content floater group wrapper">
		<header><h2> Companies using Mag+ </h2>
		<p>Customers choose Mag+ because we give them the tools they need to create mobile apps their customers and employees love. With over 4,500 apps created on the Mag+ platform, our customers are making everything from mobile sales presentations to internal newsletter apps to product catalogs and branded magazines. </p>
<p style="font-weight:bold"> Click a logo to see what people build with Mag+. </p></header>
	<div class="main main-full">
		<article id="clients" <?php post_class('group'); ?>>
	
			<ul id="clients-list" class="expandBox1"></ul>
	</article>
  
<a href="#" class="load-more"></a>   
    </div><!-- .main -->
    <div class="constraint">
    	<a class="secondary-button blue btn-usecases" href="/software-uses">View Use Cases</a> 
	</div>
</div>
</div> 


<div class="igbox-4 infoGraphic start">
	<div class="floater">
		<div class="get-started">
			<header><h2>Get Started Today! </h2></header>
			<ul>
				<li><h3>Ready to begin creating a mobile app for your business?  We’ll provide you with all of the resources you need. Get started by connecting with a Mag+ account manager.</h3><a href="/signup" class="btn-signup">Sign Up Now »</a> </li>
				<li><h3>Whether you plan to publish one app or thousands of apps, Mag+ has a license <br />for you. See which Mag+ license fits your<br />business needs today. </h3> <a href="/pricing" class="btn-pricing">View Pricing »</a> </li>
			</ul>
		</div>
	</div>
</div>

</div>


<!-- .content -->


<script>
	
	<?php
		//Set sort var for passing to Ajax get URL 
		if($sort[1]){
			$sort = '?filter='.$sort[1];
		}
		else{
			$sort='';
		}
	?>
	var customer_uses = 'companies_using';
	var sort = '<?= $sort ?>';
	var clmns = 5;
    var numOfPosts= 0;


</script>


<?php get_footer(); ?>