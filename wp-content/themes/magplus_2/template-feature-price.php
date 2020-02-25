<?php
/*
Template name: Features & price
*/

get_header();

the_post();

$filename = TEMPLATEPATH .'/feature-price.csv';
$file = file_get_contents( $filename );
$rows = explode("\n", $file);
$user = magplus_logged_in_check();

?>


<div id="content" class="content group wrapper">

	<div id="features_price" class="main main-full main-feature-price" role="main">
		<div class="fp-wrapper">
			<div id="fp-head" class="group">
				<div class="fp-col-0">
					<?php the_content(); ?>
				</div>
				<div class="fp-col-1">
					<h3>Per issue</h3>
					<p style="position: relative;">
						One app<br>
						All devices included<br>
						Pay as you publish
					</p>
					<p class="fp-price"><span>$999</span>/issue</p>
					<a href="/salesforce-buy-form" data-id="Per issue" class="primary-button buy-form-button">Contact Us</a>
				</div>
				<div class="fp-col-2">
					<h3>Monthly</h3>
					<p style="position: relative;">
						One app<br>
						All devices included<br>
						Unlimited publishing
					</p>
					<p class="fp-price"><span>$499</span>/month*</p>
					<a href="/salesforce-buy-form" data-id="Monthly" class="primary-button buy-form-button">Contact Us</a>
				</div>
				<div class="fp-col">
					<h3>Unlimited</h3>
					<p>
						Unlimited apps<br>
						All devices<br>
						Unlimited publishing
					</p>
					<p class="fp-price"><span>$2,999</span>/month*</p>
					<a href="/salesforce-buy-form" data-id="Unlimited" class="primary-button buy-form-button">Contact Us</a>
				</div>
			</div>


		<?php
			$checkboxes = '<td class="fp-col-1 fp-checked"></td><td class="fp-col-2 fp-checked"></td><td class="fp-checked"></td></tr><tr>';
			$features = get_post_meta( $post->ID, 'magplus_features', true );
		?>

			<table class="fp-table">
				<tr>
					<td class="fp-col-0">
						<?= nl2br($features[0]) ?>
					</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<?= nl2br($features[1]) ?>
					</td>
					<td class="fp-col-1 ">250 GB included. <br>Then $0.17/GB</td>
					<td class="fp-col-2 ">250 GB included. <br>Then $0.17/GB</td>
					<td class="">10 TB included.<br>Then $0.17/GB</td>
				</tr>
				<tr>
					<td class="fp-col-0">
						<?= nl2br($features[2]) ?>
					</td>
					<?php echo $checkboxes; ?>
				</tr>




			</table>
			<p id="finePrint" style="background: #fff; margin: 0;">
				<span>Need help choosing the right license package?
					<a href="/what-price-plan-is-right-for-me/">Click here!</a>
				</span>
				<span class="fine-print">* 6 months commitment</span>
			</p>

			<h2>Great Features Included In All License Packages</h2>

			<table class="fp-table">
				<tr class="fp-row fp-title-row">
					<td class="fp-col-0 ">Adobe Indesign Compatibility</td>
					<td class="fp-col-1 ">Per issue</td>
					<td class="fp-col-2 ">Monthly</td>
					<td class="">Unlimited</td>
				</tr>
				<tr>
					<td class="fp-col-0">
					<strong>Creative Cloud, CS6, CS5 & CS4</strong>
					<td class="fp-col-1 fp-checked"></td>
					<td class="fp-col-2 fp-checked"></td>
					<td class="fp-checked"></td>
				</tr>
				<tr class="fp-row  fp-title-row">
							<td class="fp-col-0 ">Devices & App Distribution</td>
							<td class="fp-col-1 "></td>
							<td class="fp-col-2 "></td>
							<td class=""></td>
				</tr>
				<tr>
					<td class="fp-col-0">
						<strong>All major devices supported</strong>
						iPhone, iPad, Kindle Fire, Android Tablets & Smartphones.
					</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<strong>Distribution</strong>
						iTunes App Store, Amazon appstore, Google play<br>or internally as <a href="http://www.magplus.com/features-price/magplus-for-business/">enterprise apps</a>.
					<td class="fp-col-1 fp-checked"></td>
					<td class="fp-col-2 fp-checked"></td>
					<td class="fp-checked"></td>
				</tr>
				<tr class="fp-row  fp-title-row">
					<td class="fp-col-0 ">Design</td>
					<td class="fp-col-1 ">Per issue</td>
					<td class="fp-col-2 ">Monthly</td>
					<td class="">Unlimited</td>
				</tr>
				<tr>
					<td class="fp-col-0">
						<strong>Instant reviews</strong>
						Instantly and wirelessly review your fully-functional layout on your device using the <a href="http://www.magplus.com/how-it-works/devices/">Mag+ Reviewer App</a>.
					</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<strong>Export to various devices</strong>
						Design for one device, then click a button and have that design intelligently transferred to templates for any other device.
					</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<strong>Fully customizable app menu</strong>Turn off the default thumbnail scrubber, or even disable swiping, to create the app experience that's right for your brand.
					</td>
					<?php echo $checkboxes; ?>

					<td class="fp-col-0">
						<strong>Layers</strong>Lets you put your content on layers that interact with each other. It gives you more freedom to make a layout that feels native to the touchscreen canvas.
					</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Snapping</strong>Set your scrolling layer to stop precisely where you want it to control the layout the user sees.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Orientation Locking</strong>Fixate your whole app to any orientation that best shows off your designs.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<strong>Automatic dual orientation and dual layout</strong>
						Create a unique design for each device orientation, or use one layout for both - the choice is yours.
					</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Pinning</strong>Create a single layout that renders perfectly in either orientation by telling objects how to move when the user turns the device.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Popups</strong>Create hotspots that trigger new information like graphics or text to pop up using basic InDesign layers. Choose visual effects when your popups open, including zoom and flip.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Hotspots for video, audio, HTML, links and popups</strong></td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Link Highlighting</strong>Add a visual highlight to any hotspot to give users feedback when they tap.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Jump Links</strong>One click lets you add a hotspot that can take the user directly to another page, another issue or even another app.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Web Links</strong>You can point a hotspot to any URL and have it open in an inapp browser or directly in Safari.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Zoom & Pan</strong>Easily enable images to be zoomed in, to reveal even more detail. Turn on panning, or scrolling in a frame, for more layout options.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Slideshows</strong>Build swiping slideshows quickly and easily in with the Mag+ Plugin. Change transitions, make them auto-play and more.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Gallery</strong>Another great slideshow option with just as much room to customize the look and feel.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Image Sequence</strong>Make 360-degree rotations or other image sequences that the user can simply drag their finger over to activate.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>HTML5 widget wizard - Feature Builder</strong></td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Web Feed</strong>Stream live content seamlessly into your app with our RSS renderer. Just paste in a feed, customize and publish.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>HTML</strong>Get highly interactive: if you can build it in HTML5, you can embed it in your Mag+ layout simply by drawing a box and pointing to a file.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Animations</strong>Create auto-playing animations directly in InDesign - no HTML needed. Make your page come to life!</td>
					<?php echo $checkboxes; ?>
				</tr>
				<tr class="fp-row  fp-title-row">
					<td class="fp-col-0 ">Video & Audio</td>
					<td class="fp-col-1 ">Per issue</td>
					<td class="fp-col-2 ">Monthly</td>
					<td class="">Unlimited</td>
				</tr>
				<tr>
					<td class="fp-col-0"><strong>Audio</strong>Embed audio files. Set them to auto-play or create custom control buttons.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Audio playlist</strong>Make your audio files accessible through our unique in-app music player, which lets the user play music in the background while reading.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Sound effects</strong>Add sound files that can play on top of background audio.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Video</strong>Flexible video usage: full-screen, popup or directly in a page; streaming or embedded; auto-play or controlled.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Media Looping</strong>Make video animations or background audio that play continuously.</td>
					<?php echo $checkboxes; ?>
				</tr>
				<tr class="fp-row  fp-title-row">
					<td class="fp-col-0 ">Marketing</td>
					<td class="fp-col-1 ">Per issue</td>
					<td class="fp-col-2 ">Monthly</td>
					<td class="">Unlimited</td>
				</tr>
                <tr>
					<td class="fp-col-0"><strong>In-app store with customizable banners</strong></td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Push notifications</strong>Send unlimited notifications to your users just by typing in a message and hitting send.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Appboy - Targeted messaging</strong>With the optional <a href="http://www.magplus.com/features-price/app-marketing/">Appboy</a> add-on, you can send in-app messages and push notifications to targeted groups of customers-e.g, all users who have downloaded the app, but never purchased an issue. Set up recurring campaigns, increase conversions and interact with users using the feedback feature.</td>
					<td class="fp-col-1 ">From $99/month</td>
					<td class="fp-col-2 ">From $99/month</td>
					<td class="">From $99/month</td>
				</tr>
				<tr>
					<td class="fp-col-0"><strong>Analytics</strong>Track every detail about how users are using your app with your choice of analytics providers: <a href="http://www.magplus.com/features-price/app-marketing/">Localytics</a>, Flurry and Omniture. Provider fees may apply.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Marketing tools</strong>Compatible with Tapjoy, Admob & <a href="http://www.magplus.com/features-price/app-marketing/">Fiksu</a>.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Newsstand</strong>Chose to make your app compatible with Apple's Newsstand and even get an automated feed for sending the right cover art to the Newsstand when you publish.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Issue control</strong>Decide whether any issue is part of a subscription or not, for full control over your offering.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<strong>Social Sharing</strong>
						Facebook, Twitter & email.</td>
					<?php echo $checkboxes; ?>
				</tr>
				<tr class="fp-row  fp-title-row">
					<td class="fp-col-0 ">More</td>
					<td class="fp-col-1 ">Per issue</td>
					<td class="fp-col-2 ">Monthly</td>
					<td class="">Unlimited</td>
				</tr>
				<tr>
					<td class="fp-col-0"><strong>In-app library with content archiving</strong></td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Optimize file size</strong>Keep your issue sizes down with multiple export settings that let you find the right balance between quality and download time.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Enterprise Apps</strong>Create secure and flexible Enterprise apps. Control your content and host it wherever you want - in line with your security policies. Make your internal content accessible and titles searchable through the built-in Library, and manage segment-based access with our Subscription API. Use Push Notifications to update and communicate with your audience. Evaluate the usage and efficiency using various build-in analytics options.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0"><strong>Scriptable Plugin</strong>Automate your workflow with InDesign scripts that control the Mag+ plug-in, or use our sample scripts like the one that lets you export a whole folder of InDesign files at once.</td>
					<?php echo $checkboxes; ?>
					<td class="fp-col-0">
						<strong>Software updates</strong>
						Version upgrades and product patches.
					</td>
					<?php echo $checkboxes; ?>
				</tr>



			</table>
		</div>
	</div><!-- end .main -->
	<div class="full-sidebar landing-cols-two feature-widget-area">
		<?php dynamic_sidebar( 'left-widget-area' ); ?>
	</div>
</div><!-- end .content -->




<?php
/**
 * Buy form
 *
 */
#if( $user ):
	?>

	<div class="hidden">
		<form class="buy-form" id="buy_form">
			<h1>Buy <span class="change-plan">Monthly</span></h1>
			<div class="form-row">
				<label for="buy_name">Name</label>
				<input type="text" name="buy_name" id="buy_name" value="<?php if(isset($user->name)) echo $user->name; ?>" />
			</div>
			<div class="form-row">
				<label for="buy_email">Email</label>
				<input type="email" name="buy_email" id="buy_email" value="<?php if(isset($user->email)) echo $user->email; ?>" />
			</div>
			<div class="form-row">
				<label for="buy_phone">Phone</label>
				<input type="text" name="buy_phone" id="buy_phone" value="<?php if(isset($user->phone)) echo $user->phone; ?>">
			</div>
			<div class="form-row">
				<label for="buy_country_input">Country</label>
				<input type="text" name="buy_country_input" id="buy_country_input" value="<?php #echo ucfirst($country); ?>">
			</div>
			<div class="form-row">
				<label for="buy_message">Message</label>
				<textarea name="buy_message" id="buy_message"></textarea>
			</div>
			<div class="form-row">
				An order will be sent to our sales staff that will contact you within 24 hours (weekdays).
			</div>
			<div class="form-row">
				<div class="buy-eula">
					<input type="checkbox" name="eula" id="buy_eula_accept"> I accept the
					 <a href="<?php get_bloginfo('url') ?>/legal/eula" target="_blank">Mag+ end user license agreement</a>
				</div>
				<input type="hidden" name="product_to_buy" id="product_to_buy" value="monthly" />
				<input type="submit" class="primary-button" id="buy_button" value="Place order now!" />
			</div>
			<div class="hidden" id="buy_loader"></div>
		</form>
	</div>

<?php #endif; ?>



<?php get_footer(); ?>