<?php
if ( isset($_SERVER["REMOTE_ADDR"]) ){
	$ip = $_SERVER["REMOTE_ADDR"];
} elseif ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ){
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} elseif ( isset($_SERVER["HTTP_CLIENT_IP"]) ){
	$ip = $_SERVER["HTTP_CLIENT_IP"];
}

// initiate curl and set options
$ipin = $ip;
$ch = curl_init();
$ver = 'v1/';
$method = 'ipinfo/';
$apikey = '100.39uzumth4w6p9k48bcbf';
$secret = 'yk2WYmET';
$timestamp = gmdate('U'); // 1200603038
$sig = md5($apikey . $secret . $timestamp);
$service = 'http://api.quova.com/';
curl_setopt($ch, CURLOPT_URL, $service . $ver. $method. $ipin . '?apikey=' .
             $apikey . '&sig='.$sig . '&format=json');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$headers = curl_getinfo($ch);
// close curl
curl_close($ch);

// return XML data
if ($headers['http_code'] != '200') {
	$params = '';
}else{
	$data = json_decode($data);
	if(isset($data->ipinfo->Location->CountryData->country)){
		$params = '?country='. urlencode(ucwords( $data->ipinfo->Location->CountryData->country ));
		if(isset($data->ipinfo->Location->StateData->state_code)){
			$params .= '&state='. urlencode(strtoupper( $data->ipinfo->Location->StateData->state_code ));
		}
	}
}
?>


<div id="content" class="content group wrapper">

	<div class="main main-full" role="main">

	<div class="get-publish-wrap">
		<h1>Choose price plan to get access to Publish</h1>
		<div class="black-box-placeholder group"><div class="black-box-wrap">
				<div class="black-box box-1">
					<h2>Go!</h2>
					<div class="feature-price">
						$199
					</div>
					<p>
						One single issue App
						<!--Get your idea live in the App Store with your own branded single-issue app. Upgrade anytime-->
					</p>
					<a href="http://publish.magplus.com/buy/go/<?php echo $params; ?>" class="primary-button">Buy Go!</a>
				</div>

				<div class="black-box box-2">
					<h2>Grow!</h2>
					<div class="feature-price">
						$2500
					</div>
					<p>
						One App – Unlimited issues
						<!--Get your idea live in the App Store with your own branded single-issue app. Upgrade anytime-->
					</p>
					<a href="mailto:sales@magplus.com?subject=Buy Grow!" class="primary-button">Buy Grow!</a>
				</div>

				<div class="black-box box-3 last">
					<h2>Lead!</h2>
					<div class="feature-price">
						$3000/mo
					</div>
					<p>
						Unlimited Apps – Unlimited issues
						<!--Get your idea live in the App Store with your own branded single-issue app. Upgrade anytime-->
					</p>
					<a href="mailto:sales@magplus.com?subject=Buy Lead!" class="primary-button">Buy Lead!</a>
				</div>
			</div></div>


			<div class="middle-title">
				<h2>Details and Comparison</h2>
			</div>

<div class="table group">

<?php

$file = file_get_contents('http://www.magplus.com/wp-content/themes/magplus_2/feature-price.csv');
#echo '<pre>'; print_r($file); echo '</pre>';
$rows = explode("\n", $file);
#echo '<table class="features-price">'."\n";
$i_row = 1;

$remove_first_block = true;

foreach($rows as $r):

	// skip the first block
	if($remove_first_block){
		if(substr($r, 0, 2) == ';;') $remove_first_block = false;
		continue;
	}

	if(substr($r, 0, 2) == ';;') continue;
	if(substr($r, 0, 6) == '{SKIP}') continue;

	$r_title = false;

	// add custom class
	if(substr($r, 0, 3) == '{*}'){
		$r = substr($r, 3);
		$class = 'f-row-title';
		$i_row = 1;
		$r_title = true;
	}else{
		// odd and even row
		if($i_row == 1 ) {
			$class = 'f-row-odd';
			$i_row = 2;
		}else{
			$class = 'f-row-even';
			$i_row = 1;
		}
	}
	$i = 0;
	echo "\t".'<div class="f-row '. $class .'">'."\n";
		$cols = explode(';', $r);
		foreach($cols as $c){
			$i++;
			if($i === 2) continue;
			$c = trim($c);
			// classes
			$class = 'f-col f-col-'. $i;
			if($i > 1) $class .= ' f-col-others';
			if(($i % 2) === 0 ) $class .= ' f-col-odd';
			else $class .= ' f-col-even';

			echo "\t"."\t".'<div class="'. $class .'">'."\n"."\t"."\t"."\t";
				if(!isset($c) || empty($c) || $c == ' '){

					// if is title add go grow and lead
					if($r_title){
						if($i == 3){
							echo 'Go!';
						}elseif($i == 4){
							echo 'Grow!';
						}elseif($i == 5){
							echo 'Lead!';
						}
					}

					echo '&nbsp;';
				}elseif($c == 'X'){
					echo '<span class="f-check">+</span>';
				}else{
					$c = str_ireplace(',,', ';', $c);
					echo preg_replace('/#\|(.+)\|#/', '<div class="tooltip-text hidden">$1</div>', $c);
					#echo '<div class="tooltip-text hidden">
					#		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lobortis tincidunt dolor, in egestas
					#		lorem blandit ut. Sed molestie rhoncus libero, et auctor tellus cursus in. Suspendisse bibendum ultrices
					#		nulla sed sagittis. Nulla interdum vulputate orci, eu consectetur massa fringilla a.
					#	</div>';

				}
			echo "\n\t\t".'</div>'."\n";
		}
	echo "\t".'</div>'."\n";
endforeach;
#echo '</table>';
?>
</div>
<br /><br />
* Coming Q2 2012
		</div>

	</div>

</div>