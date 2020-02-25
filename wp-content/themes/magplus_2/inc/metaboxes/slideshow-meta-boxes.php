<?php

add_action('add_meta_boxes','ps_magslide_meta_init');
function ps_magslide_meta_init(){	
	remove_meta_box( 'aiosp', 'magslide', 'advanced' );
	add_meta_box('slideshow_meta', 'How to add slide', 'ps_magslide_meta_setup', 'magslide', 'normal', 'high');
}
function ps_magslide_meta_setup(){
	?>
	
	<strong>How to add an app to the app gallery</strong>
	<ul>
		<li>Header is only used for ourselves to make it easier to edit - choose descriptive header</li>
		<li>To the right click the device you'd like to show. This way the site will pick the right device frame</li>
		<li>To the right check the box "Clients - start" to show your new case in the start page app gallery.</li>
		<li>To the right you must always upload one featured image. See formats below<br>
			Make sure to write a nice Title since it will be shown with mouse over. Write like this: <br>
			[App name] for [Device]. Example:  British Journal of Photography for iPhone</li>
		<li>Under "Excerpt" below link a video from Youtube by taking the URL from the EMBED CODE on Youtube. Do not use the ordinate link for sharing. The URL should look like this http://www.youtube.com/embed/jc0i9XWtn00</li>
		<li>When a video is uploaded the device will get a play-button</li>
		<li>If don't have a video upload more than one image from the app instead. Click the "Featured image".  Upload as many images as would like here, see image size below. Make sure to use the same size for all images in the gallery. From the "Gallery" you choose which one that should be the cover. Click "Use as featured image". </li>
		<li>Now the devices will get a play button that will show the image gallery.</li>
		<li>If you only upload one image, only a static cover will be shown. No play button. We should not do this. </li>
		<li>Decide the order of where this device/app should be shown by typing the number in attributes. Start with 1000, then 2000 – 9000 then we can use 1100, 1200 etc. </li>
		<li>Publish! </li>
	</ul>
	
	<p>
		<strong>Image file format</strong><br>
		.jpg
	</p>
	
	<strong>Cover Image sizes in pxl (width x height)</strong>
	<ul>
		<li>iPad 166 x 221</li>
		<li>iPhone 91x136</li>
		<li>Android Tablet 143x228</li>
		<li>Android Smartphone 99x178</li>
		<li>Kindle Fire 123x208</li>
	</ul>
	
	<p>
		<strong>Gallery Image sixe in pxl: </strong><br>
		Maximum height 580
	</p>
	
	<strong>Tips</strong>
	<ul>
		<li>Always pick the cover from Publish</li>
		<li>Use Photoshop to size it</li>
		<li>In Photoshop remember to "Save for web and devices" in order to decrease file sizes</li>
	</ul>
	<?php
}