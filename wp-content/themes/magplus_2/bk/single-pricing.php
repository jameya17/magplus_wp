<?php
/*
Template name: Pricing
*/
get_header(); 
the_post();
//$terms = get_the_terms($post->ID, 'use_types');

?>

<div id="content" class="content group wrapper subpage-mantle pricing">
	<div class="shadow-wrapper">
		<h1 class="subhead"><?php the_field('_alt_page_title'); ?></h1>

		<div class="mbox">
			<?php the_content(); ?>
			<div class="preview">
			<h4>Our pricing will be changing in 2015</h4>
			<p>Preview the upcoming package rates <a href="#prices" class="colorbox-inline cboxElement">Click Here</a></p>
			<div id="prices">
				<h2>New Mag+ 2015 Pricing</h2>
				<h3>This pricing will take effect January 1, 2015 for all new licenses.<br />All existing customers will maintain their current pricing.</h3>
				<ul>
					<li>
						<header>
						<h4>Plus</h4>
						<strong>One App, Multiple Issues</strong>
						<h5>$499<span>per mo.</span></h5>
						</header>
						<p>
							With an in-app library and store, the Plus app lets you serve multiple documents to your app. And you’ll get access to our powerful partner services for marketing and messaging like Appboy and Oplytic, as well as a dedicated support channel. All supported platforms and Mag+ issue hosting included.
						</p>
					</li>
					<li>
						<header>
						<h4>Pro</h4>
						<strong>One App, Multiple Issues, Enterprise Features</strong>
						<h5>$699<span>per mo.</span></h5>
						</header>
						<p>
							Everything you get with our Plus app, plus Mag+ Access Control, which lets you gate content behind an in-app login window that ties to your user database. Pro customers can also build iOS Enterprise apps for private, internal distribution. All supported platforms and Mag+ issue hosting included. 
						</p>
					</li>
					<li>
						<header>
						<h4>Single</h4>
						<strong>One App, One Issue</strong>
						<h5>$99<span>per mo.</span></h5>
						</header>
						<p>
							Build an app for all supported platforms with your content embedded directly in the app—no additional downloads, no hosting fees. Use all our great creative features as well as your choice of analytics. Perfect for conference guides, annual reports or any one-time publication.
						</p>
					</li>
					<li>
						<header>
						<h4>Custom</h4>
						<strong>Designed for Your Needs</strong>
						<h5>Call Us</h5>
						</header>
						<p>
							Need to create multiple apps for your company? Or to use our SDK to build a custom app? Enhanced support? Give us a call and we’ll design a license that fits your company’s requirements. Mag+ has done unique deals with some of the biggest Fortune 500 companies, and we’re eager to help your organization succeed.				</p>
					</li>
				</ul>
				<div class="footnote">All licenses require a minimum 12-month commitment, billed monthly.</div>
			</div>
		</div>
		    <div class="monthly">
		    	<h3>Monthly</h3>
		    	<span class="price">$499<em>per mo.</em></span>
		    	<h4>Build a branded app for all platforms and publish unlimited content.</h4>
		    	<img src="<?php echo get_template_directory_uri(); ?>/images/pricing-monthly-devices.png" class="devices"/>
		    	<p>
		    		Create your own app for iOS, Android and Kindle Fire  and publish as often as you want to that suite of apps. Build enterprise or public apps. Use our sign-in function to gate content. Host content on your servers or use our low cost AWS hosting, including 250GB of data transfer for free. All for one fixed price. Low six-month commitment, then month-to-month.
		    	</p>
		   		<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Monthly" >Contact Us</a>
		    </div>
		    <ul class="packages">
		    	<li>
		    		<h3>Per Issue</h3>
		    		<span class="price">$999<em>per issue.</em></span>
		    		<p>
		    			For one-time or infrequent publishing, pay for the first issue upfront and pay again only when you publish again. You can still create apps for all supported platforms and take advantage of all Mag+ features.
		    		</p>
		    		<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Per issue" >Contact Us</a>
		    	</li>
		    	<li>
		    		<h3>Unlimited</h3>
		    		<span class="price">$2999<em>per mo.</em></span>
		    		<p>
		    			Create an unlimited number of apps for your brand and publish unlimited content, plus enjoy 10TB of free content hosting per year and enhanced support.	    		
		    		</p>
		    		<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Unlimited">Contact Us</a>
		    	</li>
		    	<li>
		    		<h3>Custom</h3>
		    		<span class="note">Contact us to discuss your unique needs.</span>
		    		<p>
		    			Mag+ is highly customizeable and we’ve done special implementations for some of the biggest Fortune 500 companies.
		    		</p>
		    		<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Custom">Contact Us</a>
		    	</li>
		   	</ul>
		<div class="callBox">
			To speak with a sales representative <br />  click to call: <a href="tel:+1855624-7587">1 (855) 624-7587</a>
		</div>

		
			<h3>Add Ons</h3>
			<p>
				Mag+ partners with best-in-class services to bring even more features to your app, from analytics to marketing. We take care of the technology integration, so all you need to do is sign up for an account and go. With each partner, we negotiate unique Mag+ pricing. Learn about all our integrated and partner services.	
			</p>
			<a href="/services/third-party-services/" class="more">Learn More »</a>

			<h3>Services</h3>
			<p>
				In addition to licensing our do-it-yourself publishing platform, Mag+ offers services to help you succeed every step of the way, from conceiving the perfect app for your organization to executing on the creative to building and submitting the app.	
			</p>

			<div class="services">
				<ul class="creative">
					<li><div class="icon creative">&nbsp;</div></li>
					<li>
						<h3>Creative</h3>
						<p>
							Our in-house agency, Mag+ Studios, can handle all your creative needs, whether it’s training your designers, converting an existing digital or print asset for the touchscreen, or designing a new digital-only document from scratch.
						</p>
						<a href="/services/creative-services/" class="more">Learn More »</a>
					</li>
				</ul>
				<ul class="consulting">
					<li><div class="icon">&nbsp;</div></li>
					<li>
						<h3>Consulting</h3>
						<p>
							We’ve been in the digital-publishing game since the day the iPad launched, and with our consulting arm, Mag+ Strategy, you can use our expertise launching thousands of apps to help your organization get on the right path to success.	</p>
						<a href="/services/consulting-services/" class="more">Learn More »</a>
					</li>
				</ul>
				<ul class="support">
					<li><div class="icon support">&nbsp;</div></li>
					<li>
						<h3>Support</h3>
						<p>
							In addition to our extensive online support resources, Mag+’s global team of support experts can help get your app live, and manage the more technical aspects of app publishing after launch.
						</p>
						<a href="/services/support-services/" class="more">Learn More »</a>
					</li>
				</ul>
			</div>
			<h3>App SDK</h3><span class="price">$3499<em>per mo.</em></span>
			<p>
				The Mag+ App SDK for Android and iOS lets you build a custom app using our rendering engine and distribution service, so you can add Mag+ functionality to your existing app or create something entirely new.
			</p>
			<a href="/services/software-development-kit/" class="more">Learn More »</a>
		</div>    
	</div>
</div>

<?php get_footer(); ?>