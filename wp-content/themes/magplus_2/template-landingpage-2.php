<?php 
/*
Template name: Landingpage v 2.0
*/
get_header();


the_post();

$meta = get_post_meta($post->ID, '_landing_meta', true);
$title = get_post_meta($post->ID, '_alt_page_title', true);
$title_color = get_post_meta($post->ID, '_alt_page_title_color', true);
?>

<div class="landing-page landing-page-3 group <?php if(isset($meta['bg_dark_light']) && $meta['bg_dark_light'] == 'dark') echo 'landing-dark'; ?>" <?php 
	if( !empty($meta['bg']) || !empty($meta['bg_color']) ){ 
		
		
		$bg = '';
		
		// optional settings
		if( !empty($meta['bg_color']) ){
			$bg .= ' '. $meta['bg_color'];
		}
		if( !empty($meta['bg_repeat']) ){
			$bg .= ' '. $meta['bg_repeat'];
		}
		if( !empty($meta['bg_horz']) ){
			$bg .= ' '. $meta['bg_horz'];
		}
		if( !empty($meta['bg_vert']) ){
			$bg .= ' '. $meta['bg_vert'];
		}
		 
		
	}
	?>>

	
	<div class="mantle" style="opacity:0">
		<div class="container content">
			<div class="floater">
				<div class="column-l">
					<h1>Design, publish and distribute mobile apps with ease.</h1>

					<p>The Mag+ digital publishing software makes it simple to create everything from digital annual reports to alumni magazines and sales enablement tools.</p>
		
					<div class="tour">
						<a href="https://www.youtube.com/embed/EPgpGUtEWHY" class="btn-seeit colorbox-iframe cboxElement">
							<em></em>
							<h3>Take a tour</h3>
						</a>
					</div>
					<div class="carcl-publish"></div>
				</div>
			</div>
		</div>
	<img src="<?php echo get_template_directory_uri(); ?>/images/mantle.png" alt="Engaging mobile apps made easy."  class="bg-image" />
		
		<div class="carousel">
			<span class="btn-carousel"><h2>What do you want to make?</h2></span>
			<ul class="carcl-slides">
				<li class="home-page">
					
				</li>
				<li class="magazines">
					<div class="carcl-container">
						<div class="carcl-column-l">
							<h3>Magazines</h3>
							<h2>The Atlantic Breaks Free from Print</h2>
							<p>
								<em>The Atlantic Weekly</em> doesn&rsquo;t exist in print. Instead, the app curates the week&rsquo;s must-read stories from The Atlantic&rsquo;s web sites into an easy-to-read issue delivered directly to the iPhone or iPad. And with Mag+&rsquo;s simple design tools, new issues can be built and published in less than a day.</p>

							<nav>
								<a href="https://www.youtube.com/embed/okB36J-l2H8" class="btn-seeit colorbox-iframe cboxElement">See it in action</a>
								<a href="/software-uses/digital-magazines/" >See more magazines</a>
							</nav>
							<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/logo-atlantic.png" alt="The Atlantic"/></div>

						</div>
						<div class="product"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/magazines.png" alt="Example"/></div>
					</div>
				</li>
				<li class="product-guides">
					<div class="carcl-container">
						<div class="carcl-column-l">
							<h3>Sales Support</h3>
							<h2>Volvo Moves Trucks with a Tablet App</h2>
							<p>
							Volvo FH turned its product guide into a stunning, easy-to-use interactive iPad app that serves as both sales brochure and marketing show piece. The digital guide makes a complex product simple to understand, with intuitive diagrams and videos that quickly communicate the trucks&rsquo; features and benefits.
							</p>

							<nav>
								<a href="https://www.youtube.com/embed/o5isE95cvXU" class="btn-seeit colorbox-iframe cboxElement">See it in action</a>
								<a href="/software-uses/sales-collateral/" class="btn-more">See more sales tools</a>
							</nav>
							<div class="logo"><img class="round" src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/logo-volvo.png" alt="Volvo"/></div>

						</div>
						<div class="product"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/product-guides.png" alt="Example"/></div>
					</div>
				</li>
				<li class="training-manuals">
					<div class="carcl-container">
						<div class="carcl-column-l">
							<h3>Training Tools</h3>
							<h2>Ford Trains Global Sales Force <br/>Faster with Mobile Tools</h2>
							<p>
							To train its vast network of dealers on the company&rsquo;s Showcase tool, Ford built this mobile training app, saving the cost and hassle of printed guides. The privately distributed iPad app contains six bite-sized training modules and can be used as a self-guided tool or a dealership-training workbook.
							</p>

							<nav>
								<a href="/software-uses/internal-communications" class="btn-more">See more internal communications</a>
							</nav>
							<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/logo-ford.png" alt="Ford"/></div>

						</div>
						<div class="product"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/training-manuals.png" alt="Example"/></div>
					</div>
				</li>
				<li class="event-guides">
					<div class="carcl-container">
						<div class="carcl-column-l">
							<h3>Universities</h3>
							<h2>University of Arizona Keeps <br />Alumni Connected with iPad App</h2>
							<p>
							The University of Arizona takes their Alumni Magazine to the next level with an immersive iPad app showcasing the latest and greatest from their institution.  Each edition touts the richness of the university's culture with interactive features from audio slideshows to time lapsed videos and tappable, zoomable photos. </p>

							<nav>
								<!-- <a href="https://www.youtube.com/embed/ovY2pHnj8Tw" class="btn-seeit colorbox-iframe cboxElement">See it in action</a> -->
								<a href="/software-uses/college-marketing/" class="btn-more">See more University tools</a>
							</nav>
							<div class="logo"><img   src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/logo-uoa.png" alt="University of Arizona"/></div>

						</div>
						<div class="product"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/universities.png" alt="Example"/></div>
					</div>
				</li>
				<li class="digital-catalogs">
					<div class="carcl-container">
						<div class="carcl-column-l">
							<h3>Catalogs</h3>
							<h2>Famous Footwear Powers M-Commerce with Mag+</h2>
							<p>
							The Famous Footwear Stylezine makes a whole season of shoes &#8220;clickable and shippable&#8221; with built in M-commerce. &#8220;Mag+ allowed us to concentrate on design and content without being impeded by coding or development requirements. We visited the site on a Friday morning, and by that afternoon we had begun work on our first issue!&#8221;&#8211; Bill Wilson, Director of Interactive Creative Development, Famous Footwear.	
							</p>

							<nav>
								<a href="https://www.youtube.com/embed/-q9lPHf_Nug" class="btn-seeit colorbox-iframe cboxElement">See it in action</a>
								<a href="/software-uses/custom-digital-catalogs/" class="btn-more">See more mobile commerce</a>
							</nav>
							<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/logo-famousfoot.png" alt="Famous Footware"/></div>

						</div>
						<div class="product"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/digital-catalogs.png" alt="Example"/></div>
					</div>
				</li>
				<li class="sales-materials">
					<div class="carcl-container">
						<div class="carcl-column-l">
							<h3>Presentations</h3>
							<h2>EMC Empowers its Sales Team with iPad Apps</h2>
							<p>
							Big-data leader EMC built EMC Interactive, a corporate app designed specifically for the iPad, to give its sales professionals and partners a dynamic presentation tool. The publicly available app examines the impact that EMC solutions will have on potential customers&rsquo; most pressing business requirements.
							</p>
		
							<nav>
								<a href="/software-uses/sales-collateral/" class="btn-more">See more sales collateral</a>
							</nav>
							<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/logo-emc.png" alt="EMC"/></div>

						</div>
						<div class="product"><img src="<?php echo get_template_directory_uri(); ?>/images/hp-carousel-slides/presentations.png" alt="Example"/></div>
					</div>
				</li>
			</ul>
			<div class="carcl-nav">
				<div class="carcl-container">
						<ul>
							<li><a href="#">Magazines</a><span></span></li>
							<li><a href="#">Sales Support</a><span></span></li>
							<li><a href="#">Training Tools</a><span></span></li>
							<li><a href="#">Universities</a><span></span></li>
							<li><a href="#">Catalogs</a><span></span></li>
							<li><a href="#">Presentations</a><span></span></li>
						</ul>
					</div>
				</div>
				
				<a href="#" class="closer"><em>Close Gallery</em></a>
			</div>
	</div>
</div>
<?php get_footer(); ?>