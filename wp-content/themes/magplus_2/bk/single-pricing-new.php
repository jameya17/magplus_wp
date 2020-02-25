<?php
/*
Template name: Pricing w/ Matrix
*/
get_header(); 
the_post();
//$terms = get_the_terms($post->ID, 'use_types');

?>

<div id="content" class="content group wrapper subpage-mantle pricing">
	<div class="shadow-wrapper">
		<h2 class="subhead"><?php the_field('_alt_page_title'); ?></h2>

		<div class="mbox">
			<?php the_content(); ?>
			
			<ul class="pricing-mobile-nav">
				<li data-pkg="custom">Custom</li>
				<li data-pkg="pro" class="on">Pro</li>
				<li data-pkg="plus">Plus</li>
				<li data-pkg="single">Single</li>
			</ul>
			<div class="package-details">
				<div class="package pro on">
					<h3>Pro</h3>
					<span class="price">$699<em> per month</em></span>
					<h4>One App, Multiple Issues, Enterprise Features</h4>
					<p>
						Lock your content behind a login, create internal apps and securely host your files on your own servers.
					</p>
					<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Pro" >Contact Us</a>
				</div>
				<ul class="packages">
					<li class="package plus">
						<h3>Plus</h3>
						<span class="price">$499<em> per month</em></span>
						<h4>One App, Multiple Issues</h4>
						<p>
							Publish to an in-app library, create Newsstand apps and add messaging and marketing.    		
						</p>
						<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Plus">Contact Us</a>
					</li>
					<li class="package single">
						<h3>Single</h3>
						<span class="price">$99<em> per month</em></span>
						<h4>One App, One Issue</h4>
						<p>
							Use the full power of Mag+ tools to create, deliver and track a gorgeous content app.
						</p>
						<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Single">Contact Us</a>
					</li>
				</ul>
				<div class="discount">Pay for a full year upfront and receive a <em>10% discount</em> on Pro, Plus or Single packages!</div>
				<div class="package custom">
					<h3>Custom</h3>
					<h4>Designed for Your Needs</h4>
					<p>
						A Custom license allows you to select the features that are right for your business, get volume discounts on multiple apps and take advantage of our robust customization options, including our App SDK.
					</p>
					<a class="secondary-button buy-form-button" href="/salesforce-buy-form" data-id="Custom" >Contact Us</a>
				</div>
				<em class="discl"> All contracts require a 12 month minimum commitment. </em>

			</div>


			<div class="callBox">
				To speak with a sales representative <br />click to call: <a href="tel:+1855624-7587">1 (855) 624-7587</a>
			</div>

			<div class="comparisonChart">
				<h3>Compare Plans</h3>
				<ul class="key">
					<li>Optional</li>
					<li>Included</li>
				</ul>
				<div class="feature-list">
					<ul class="clmns">
						<li class="pkg-1"><h4>Custom</h4></li>
						<li class="pkg-2"><h4>Pro</h4></li>
						<li class="pkg-3"><h4>Plus</h4></li>
						<li class="pkg-4"><h4>Single</h4></li>
					</ul>
					<ul>
						<li class="feature-type"><h4>Creative</h4></li>
						<li class="pkg-4 incl">
							<h5>All Mag+ Software Creative Features and Tools</h5>
							<div>
								<p>Use our InDesign plug-in and templates, plus our free Reviewer app, to build fully interactive, mobile-native content for your branded App. Learn more about Mag+ Creative features <a href="/product-features/">here</a>.</p>
							</div>
						</li>
					</ul>


					<ul>
						<li class="feature-type"><h4>Publishing &amp; Distribution</h4></li>
						<li class="pkg-1 incl">
							<h5>Discounts on Multiple Apps</h5>
							<div>
								<p>Take advantage of volume discounts as you build more Apps for your organization, including an unlimited-App option.</p>
							</div>
						</li>
						<li class="pkg-4 incl">
							<h5>Push Notifications</h5>
							<div>
								<p>Send as many push notifications as you like to your App&rsquo;s opted-in users.</p>
							</div>
						</li>
						<li class="pkg-3 incl">
							<h5>In-App Library</h5>
							<div>
								<p>Offer multiple Issues for download or for sale in a customizable in-App library, including special promotional spaces to highlight content.</p>
							</div>
						</li>
						<li class="pkg-3 incl">
							<h5>Newsstand Support</h5>
							<div>
								<p>Build an App for the Apple Newsstand, complete with support for paid or free subscriptions.</p>
							</div>
						</li>
						<li class="pkg-2 incl">
							<h5>Access Control API</h5>
							<div>
								<p>Gate your App&rsquo;s content behind a login window that ties into your user database with our simple API.</p>
							</div>
						</li>
						<li class="pkg-2 incl">
							<h5>Enterprise iOS Builds</h5>
							<div>
								<p>Create Apps for internal distribution to employees or members under Apple&rsquo;s Enterprise Developer license, compatible with MDM and MAM systems.</p>
							</div>
						</li>
						
					</ul>

					<ul>
						<li class="feature-type"><h4>Third-Party Software Add-Ons</h4></li>
						<li class="pkg-4 incl">
							<h5>Analytics</h5>
							<div>
								<p>Choose from our best-in-class analytics options&mdash;Localytics, Flurry or Omniture&mdash;to track detailed user and event data for your App. </p>
							</div>
						</li>
						<li class="pkg-3 incl">
							<h5>Marketing and Messaging Tools</h5>
							<div>
								<p>Add services like segmented in-App messaging or marketing success tracking with services from our third-party partners Appboy, Oplytic and Fiksu. Learn more about our add-ons <a href="/services/third-party-services/">here</a>.</p>
							</div>
						</li>
						<li class="pkg-2 incl">
							<h5>Dynamic Ad Serving</h5>
							<div>
								<p>Use your existing AdMob/DFP or AdMarvel account to serve and track dynamic ads into your Issues, no extra coding necessary.</p>
							</div>
						</li>
						<li class="pkg-2 incl">
							<h5>Subs+</h5>
							<div>
								<p>Want to put your content behind a log-in but don&rsquo;t have your own user database or API expertise? Use this off-the-shelf user-management tool, Subs+, for simple entitlement control.</p>
							</div>
						</li>
					</ul>

					<ul>
						<li class="feature-type"><h4>Hosting</h4></li>
						<li class="pkg-3 incl">
							<h5>Mag+ Hosting</h5>
							<div>
								<p>Store your Issue files on Mag+&rsquo;s secure and robust Amazon S3/Cloudfront account for serving to your App and get one terabyte of data transfer free per month.</p>
							</div>
						</li>
						<li class="pkg-2 incl">
							<h5>Ability to Host Yourself</h5>
							<div>
								<p>Keep your content safely behind your firewall with the ability to host issue files anywhere you like. Your content goes directly to your App.</p>
							</div>
						</li>
						<li class="pkg-1">
							<h5>Secure Dynamic Hosting</h5>
							<div>
								<p>Add an extra layer of security to your Mag+ hosted content with dynamic URLs.</p>
							</div>
						</li>
					</ul>

					<ul>
						<li class="feature-type"><h4>Support</h4></li>
						<li class="pkg-4 incl">
							<h5>Dedicated Onboarding and Success Contact</h5>
							<div>
								<p>Our customer success manager will get you up and running with the Mag+ Software and check in frequently to make sure you&rsquo;re achieving your goals.</p>
							</div>
						</li>
						<li class="pkg-4 incl">
							<h5>Help Forum and Support Documentation</h5>
							<div>
								<p>Find answers to your Mag+ questions in our extensive library of video tutorials and articles, or ask questions in our community forum.</p>
							</div>
						</li>
						<li class="pkg-2 incl">
							<h5>Uptime SLA</h5>
							<div>
								<p>We&rsquo;ll provide assurance that our backend system will achieve at least 99.9% monthly uptime (as explained in the <a href="/legal/eula/">Mag+ Customer EULA</a>) or you&rsquo;ll get an automatic credit on your bill.</p>
							</div>
						</li>
						<li class="pkg-1">
							<h5>Priority Support</h5>
							<div>
								<p>Get same-Business-Day response to your support ticket if we receive it before 2pm EST.</p>
							</div>
						</li>
					</ul>

					<ul>
						<li class="feature-type"><h4>Development Flexibilty</h4></li>
						<li class="pkg-1">
							<h5>App SDK</h5>
							<div>
								<p>Need deeper customization than our white-label App offers? Use our SDK to build your own App around our core components or add Mag+ Software capability to an existing App. Learn more about the SDK <a href="/services/software-development-kit/">here</a>.</p>
							</div>
						</li>
						<li class="pkg-1">
							<h5>SDK Support</h5>
							<div>
								<p>Get hands-on training and support for your App developers from the Mag+ development team.</p>
							</div>
						</li>
						<li class="pkg-1">
							<h5>Custom EULA</h5>
							<div>
								<p>Let your legal team work with ours to review and customize our Mag+ EULA. </p>
							</div>
						</li>
						<li class="pkg-1">
							<h5>InDesign Server Plug-in</h5>
							<div>
								<p>Automate your production process with a special InDesign Server version of our Mag+ plug-in.</p>
							</div>
						</li>
					</ul>

					<ul>
						<li class="feature-type"><h4>Professional Services</h4></li>
						<li class="pkg-4 opt">
							<h5>App Build, Submission and Updates</h5>
							<div>
								<p>Let Mag+ handle all your App duties with our one-time or recurring services. Learn more about our support services <a href="/services/support-services/">here</a>.</p>
							</div>
						</li>
						<li class="pkg-4 opt">
							<h5>Creative Services</h5>
							<div>
								<p>Mag+ Studios, our award-winning in-house creative agency, can turn your raw assets into a stunning mobile content app, or train your own designers. Learn more  <a href="/services/creative-services/">here</a>.</p>
							</div>
						</li>
						<li class="pkg-2 opt">
							<h5>Strategic and Technical Consulting</h5>
							<div>
								<p>Mag+ has helped hundreds of companies find the right mobile content strategy. We can work with your team on every aspect of digital publishing, from production to technical integration to App strategy.</p>
							</div>
						</li>
						<li class="pkg-1">
							<h5>Custom App Development</h5>
							<div>
								<p>Want to use our App SDK to create a custom version of the Mag+ app but don&rsquo;t have your own developers? We can take on your custom project from start to finish. </p>
							</div>
						</li>
					</ul>

				</div>
			</div>

		<div class="additional">
				<h3>Add Ons</h3>
				<p>
					Mag+ partners with best-in-class services to bring even more features to your App, from analytics to marketing. We take care of the technology integration, so all you need to do is sign up for an account and go. With each partner, we negotiate unique Mag+ pricing.	
				</p>
				<a href="/services/third-party-services/" class="more">Learn More »</a>

				<h3>Services</h3>
				<p>
					In addition to licensing our do-it-yourself publishing platform, Mag+ offers services to help you succeed every step of the way, from conceiving the perfect app for your organization to executing on the creative to building and submitting the app.	
				</p>
				<a href="/services/" class="more">Learn More »</a>

				<h3>App SDK</h3>
				<p>
					The Mag+ App SDK for Android and iOS lets you build a custom app using our rendering engine and distribution service, so you can add Mag+ functionality to your existing app or create something entirely new.
				</p>
				<a href="/services/software-development-kit/" class="more">Learn More »</a>   
			</div>
		</div>
	</div>

	<?php get_footer(); ?>