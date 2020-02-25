<?php

/**
 *  Register the manual page
 */
add_action('admin_menu', 'ps_init_the_manual_page'); 
function ps_init_the_manual_page() {
	add_theme_page('Mag+ manual', 'Mag+ manual', 'edit_post', __FILE__, 'ps_the_manual_page');
}



/**
 *   The manual page
 */
function ps_the_manual_page() { ?>
<div id="theme-options-wrap" class="wrap">
	<div class="icon32" id="icon-edit-pages"></div>
	<h2><?php _e('Manual'); ?></h2>
	
	<p>
		Here will a manual of classes, shortcodes and other theme specific functions
	</p>
	
	<table class="form-table">
		
		
		<tr>
			<th colspan="2"><h2>Shortcodes</h2></th>
		</tr>
		<tr valign="top">
			<th scope="row"><strong>Columns</strong></th>
			<td>
				Create a normal 2 column: <br />
				[column] Text col 1/2 [/column] [column last="true"] Text col 2/2 [/column]<br />
				Create other like 3 col:<br />
				[column width="30.66%"] Text col 1/3 [/column]
				[column width="30.66%"] Text col 2/3 [/column] 
				[column width="30.66%" last="true"] Text col 3/3 [/column]<br />
				
				<dic class="description">
					Don't forget the ending [/column] and always have a space between the shortcode and the text.
				</div>
			</td>
		</tr>
		
		<tr>
			<th>Quotes</th>
			<td>
				Use this to show press quotes
				quotes_ids = the quotes with logos to show
				[press_quotes quote_ids="543,1887,793,1914"]
			</td>
		</tr>
		
	</table>
	
	
</div>
<?php
}

