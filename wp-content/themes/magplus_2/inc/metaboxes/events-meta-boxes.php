<?php
/**
 * Custom meta boxes
 *
 */

add_action('admin_menu','ps_events_metabox_init');
function ps_events_metabox_init(){
	add_meta_box('events_custom_meta', 'Events info', 'ps_events_metabox', 'event', 'normal', 'high');
	add_action('save_post', 'ps_save_events_meta');
}

 
function ps_events_metabox(){
	global $post;
	$date = get_post_meta($post->ID, 'event_start_date', true);
	$date_end = get_post_meta($post->ID, 'event_end_date', true);
	$address = get_post_meta($post->ID, 'event_address', true);
	$country = get_post_meta($post->ID, 'event_country', true);
 	?>
 	
 	<p>
 		<h2>Start date</h2>
		<label for="ps_event_date">Date</label>
		<input type="text" id="ps_event_date" class="datepicker date-start" name="ps_event_date" value="<?php if(!empty($date)) echo date('Y-m-d', $date); ?>"/>
		<label for="ps_event_time">Time</label>
		<input type="text" name="ps_event_time" value="<?php if(!empty($date)) echo date('H:i', $date); ?>"/>
		<div class="description">Enter the date (yyyy-mm-dd) and time (14:32) for the event</div>
	</p>
	<p>
 		<h2>End date</h2>
		<label for="ps_event_date_end">Date</label>
		<input type="text" id="ps_event_date_end" class="datepicker date-end" name="ps_event_date_end" value="<?php if(!empty($date_end)) echo date('Y-m-d', $date_end); ?>"/>
		<label for="ps_event_time_end">Time</label>
		<input type="text" name="ps_event_time_end" value="<?php if(!empty($date_end)) echo date('H:i', $date_end); ?>"/>
		<div class="description">Enter the date (yyyy-mm-dd) and time (14:32) for the event</div>
	</p>
	
	<p>
		<div>
			<label for="event_country">Country</label>
			<input type="text" name="event_country" value="<?php if(!empty($country)) echo $country; ?>"/>
		</div>
		<div>
			<label for="event_address">Address</label>
			<input type="text" name="event_address" value="<?php if(!empty($address)) echo $address; ?>"/>
		</div>
	</p>
	<script>
	jQuery(function($) {
		var dates = $( "#ps_event_date, #ps_event_date_end" ).datepicker({
			defaultDate: "+1d",
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd",
			onSelect: function( selectedDate ) {
				var option = this.id == "ps_event_date" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
	</script>
	
 	<?php

	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="events_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}



function ps_save_events_meta($post_id){
	// make sure data came from our meta box
	if (!isset($_POST['events_meta_noncename']) || !wp_verify_nonce($_POST['events_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'event'){
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	// authentication passed, save data
	
	$time1 = ( strlen($_POST['ps_event_time']) >= 4) ? $_POST['ps_event_time'] : '';
	$time2 = ( strlen($_POST['ps_event_time_end']) >= 4) ? $_POST['ps_event_time_end'] : '';
	
	$event_start_date = strtotime( $_POST['ps_event_date'] .' '. $time1 );
	$event_end_date = strtotime( $_POST['ps_event_date_end'] .' '. $time2 );
	$event_country = $_POST['event_country'];
	$event_address = $_POST['event_address'];
	
	$meta = array( 
		'event_start_date',
		'event_end_date',
		'event_country',
		'event_address'
	);
	foreach( $meta as $m ){
		if ( empty($$m) ) delete_post_meta($post_id, $m);
		else update_post_meta($post_id, $m, $$m);
	}

	return $post_id;
}

