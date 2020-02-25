<?php
	/*
	Template name: Ajax Template - Features
	*/
	
	if($_GET['id']){
		$pageID = $_GET['id'];
	}
	else{
		$pageID = $post->ID;
	}
	//$children = get_children(array('post_parent' => $pageID, 'orderby' => 'menu_order'));
	$children = get_pages('sort_column=menu_order&child_of='.$pageID);
	$parent = get_page($pageID);
	$pTitleCheck = strtolower(get_the_title($pageID));
	$ancestor =  count(get_post_ancestors($pageID));

//if ID isn't the All Features list use the foreach loop
if($ancestor>0 && $pTitleCheck!=='all features'){
?>
		
		<h1 class="subhead"><?= $parent->post_title?></h1>
		
		<p class="excerpt mbox"><?= $parent->post_excerpt ?></p>

		<div class="mbox">
			<?php
			$count=1;
			$kids = count($children);

			foreach ($children as &$value) {
			?>

					<div class="mhalf">
						<h3><?=$value->post_title; ?></h3>
						<p> <?=$value->post_content ?></p>
					</div>
				

				<?php 
		
				if($count % 2 == 0 && $count!=$kids){ ?>
					</div>
					<div class="mline"></div>
					<div class="mbox">
					<?php 
				}
				$count++;
			} ?>
		</div>
		<?php		
}	

//If it is the All Features list display the below
else{ 
	//if it equals the the proper ID or loaded w/ AJAX under with the Main Section ID
	
	if(($_GET['id']) || (!$_GET['id'] && $ancestor>0) ){ ?>
		<h1 class="subhead"><?= get_the_title($pageID)?></h1>
		
			<div class="columnBox">
				<h3>Creating Content</h3>
				<div class="clmns">
					<ul>
						<li>Fully Custom Interactive Design</li>
						<li>Offline Support</li>
						<li>InDesign Plugin for CS4-CC14</li>
						<li>Instant On-Device Design Review</li>
						<li>Remote Design Review</li>
						<li>Video and Audio Support</li>
						<li>Full Embedded HTML Support</li>
						
					</ul>
					<ul>
						<li>Built-in Interactive Content Layers</li>
						<li>Multiple Navigation Options</li>
						<li>Overlays and Popups</li>
						<li>Linking Internally and to the Web</li>
						<li>Slideshow Builder</li>
						<li>Animation Tools</li>
					</ul>
					<ul>
						<li>Pinch and Zoom</li>
						<li>Interactive Panning</li>
						<li>Multiple Orientation Support</li>
						<li>Easy Design for Multiple Devices</li>
						<li>Automated Production Tools</li>
						<li>Easy PDF Conversion</li>
					</ul>
				</div>
				<a class="primary-button" href="/product-features/" data-link="1">Learn More</a>
			</div>

			<div class="columnBox">
				<h3>Distributing Content</h3>
				<div class="clmns">
					<ul>
						<li>Branded Apps</li>
						<li>Robust App Customization</li>
						<li>In-App Library with Archiving</li>
						<li>Segmented Newsfeed Messaging</li>
						<li>Live Content</li>
					</ul>
					<ul>
						<li>Enterprise (Private) Distribution</li>
						<li>Public Distribution to iTunes, Google Play and Amazon App Store</li>
						<li>Flexible &amp; Secure Content Hosting</li>
						<li>Support for All MDM/MAM App Distribution</li>
					</ul>
					<ul>
						<li>Login / Authentication Support</li>
						<li>Newsstand Support</li>
						<li>Precise Issue Control</li>
					</ul>
				</div>
				<a class="primary-button" href="/product-features/" data-link="2" >Learn More</a>
			</div>

			
			<div class="columnBox">
				<h3>Engaging Users</h3>
				<div class="clmns">
					<ul>
						<li>Targeted Messaging</li>
						<li>Push Notifications</li>
						<li>Multiple Feedback Channels</li>
					</ul>
					<ul>
						<li>Choice of Analytics</li>
						<li>Custom In-App Promotional Banners</li>
						<li>Social Sharing</li>
					</ul>
				</div>
				<a class="primary-button" href="/product-features/" data-link="3">Learn More</a>
			</div>
	
			<div class="columnBox">
				<h3>Monetizing Your App</h3>
				<div class="clmns">
					<ul>
						<li>In-App Purchasing</li>
						<li>Subscription Support</li>
						<li>In-App Promotional Capabilities</li>
					
					</ul>
					<ul><li>Built-in eCommerce with Pixbi</li>
						<li>Marketing Campaign Tracking with Oplytics</li>
						<li>App Download Marketing with Fiksu</li>
						
					</ul>
					<ul>
						<li>App Marketing Best Practices with Appency</li>
						<li>In-App Advertising with AdMob/DFP and AdMarvel</li>
					</ul>
				</div>
				<a class="primary-button" href="/product-features/" data-link="4">Learn More</a>
			</div>
	

<?php 
	}
	}
	?>