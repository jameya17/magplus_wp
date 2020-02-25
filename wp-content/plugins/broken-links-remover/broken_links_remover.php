<?php

/*
Plugin Name: Broken links Remover
Plugin URI: http://techblissonline.com/broken-links-remover/
Description: Eliminate Broken links
Version: 1.2.2
Author: Rajesh (Techblissonline Dot Com)
Author URI: http://techblissonline.com/
*/

/*
Copyright (C) 2008 Rajesh (Techblissonline Dot Com) (Rajesh AT techblissonline DOT com)
Some code copyright 2007-2008 Janis Elsts
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class Broken_Links_Remover {

        var $version = "1.2.2";

                /** Which zip to download in order to upgrade .*/
        var $upgrade_url = 'http://downloads.wordpress.org/plugin/broken-links-remover.zip';

        var $wp_version;
        var $psp_bad_links_table;
        var $blr_timeout;
		var $siteurl;
		var $sitehost;
		var $nohide_links;
		var $nohide_http;
		var $nohide_https;
		var $ignore_http;
		var $ignore_https;
		var $blr_post;
		var $blr_days;
		var $check_for_broken_links;
		var $blr_options; 
        //var $img_links;

        function Broken_Links_Remover() {

                global $wp_version, $wpdb, $wp_query, $psp_bad_links_table, $blr_timeout;				
                $this->wp_version = $wp_version;
				$this->siteurl = get_option('siteurl');
				
				$blr_options = get_option('blr_options');
				$this->blr_options = $blr_options;
				/*$this->nohide_links = get_option('blr_nohide_links');
				$nohide_https = get_option('blr_ignore_http_hide');
				$ignore_https = get_option('blr_ignore_http');*/
				//$this->nohide_https = $nohide_https;
				//$this->ignore_https = $ignore_https;
				$this->nohide_links = $blr_options['blr_nohide_links'];
				$nohide_https = $blr_options['blr_ignore_http_hide'];
				$ignore_https = $blr_options['blr_ignore_http'];
				$this->blr_days = $blr_options['blr_days'];
				$this->blr_timeout = $blr_options['blr_t_out_period'];

				$this->nohide_http = explode(",", $nohide_https); 
				$this->ignore_http = explode(",", $ignore_https); 
				//$this->blr_days = get_option('blr_days');
				$this->check_for_broken_links = true;
				
				$siteparts=@parse_url($this->siteurl);
				if(isset($siteparts['host'])) {
					$this->sitehost = $siteparts['host'];
				}

				$psp_bad_links_table = $wpdb->prefix . "blr_bad_links";
				$this->psp_bad_links_table = $psp_bad_links_table;
				//$this->blr_timeout = 2;
				//$this->blr_timeout = get_option('blr_t_out_period');

        }

        function is_broken($url)
        {

           global $wpdb, $wp_query;
           $psp_bad_links_table = $this->psp_bad_links_table;
		   $blr_options = $this->blr_options;
		   $post = $wp_query->get_queried_object();           
           $post_id = $post->ID;
           //$post_url = get_permalink( $post->ID );
		   $check_for_broken_links = $this->check_for_broken_links;
			if($check_for_broken_links){
				$sanitized_url = $this->sanitize_url($url);
				if(!$sanitized_url) return 0;
			}
			//echo "url: $url";

           if (!empty($post_id)) {
		   //$post_id = 0;		   
			   $request = "SELECT psp_link_status FROM $psp_bad_links_table WHERE psp_post_id = $post_id and psp_bad_links = '$url' LIMIT 1";
	           $bad_rows = $wpdb->get_results($request);
	           if(count($bad_rows) > 0) {

	                foreach($bad_rows as $bad_row){
	                	$status = $bad_row->psp_link_status;

	                	$nohide_http = $this->nohide_http;
						foreach ($nohide_http as $http_status) {  
							if (trim($http_status) === $status) {  
								return 0;
							}
						}
						if($status==301) {

							if (!$blr_options['blr_p_redirect']) {
								return 0;
							}
						}

						if($status==302) {

							if (!$blr_options['blr_t_redirect']) {
								return 0;
							}
	                	}

	                	if ($status==333||$status==999) {

							if (!$blr_options['blr_t_out_links']) {

								return 0;
							}
						}
	                }

	                return 1;
	            }
			}
			//$check_for_broken_links = $this->check_for_broken_links;
			if($check_for_broken_links){
	            if(!function_exists('curl_init')){
				
	            	$status = $this->open_Socket($sanitized_url);
	            } else {

				    $ch = curl_init();
				    if ($ch) {
				    	$status = $this->use_curl($ch, $sanitized_url);
				    } else {
				    	$status = 888;
				    }
	           }

	            if(!empty($status) && $status != 200) {

	                //version 1.0 relative urls will not be checked for now or urls will not be checked if curl or fsockopen does not exist.
					//version 1.1 relative urls are now taken care but this is an additional check
	                if ($status==111||$status==888) {
	                	return 0;
	                }
					
					$hide_timed_out_links = $blr_options['blr_t_out_links'];
					$log_timed_out_links = $blr_options['blr_log_tout_links'];

	                if ($status==333||$status==999) {

	                	if (!$hide_timed_out_links && !$log_timed_out_links) {

							return 0;
						} else if ($hide_timed_out_links && !$log_timed_out_links) {

							return 1;
						}
					}
					/*$ignore_https = $this->ignore_https;
					if ((strpos($ignore_https,"$status")) === true) {
						return 0;
					}*/
					$ignore_http = $this->ignore_http;
					foreach ($ignore_http as $ignore_http_status) {  					
						if (trim($ignore_http_status) === $status) {  
							return 0;
						}
					}
					
					if (!empty($post_id) && $post_id > 0) {
						$date = date("Y-m-d");
						$request = "INSERT INTO $psp_bad_links_table (psp_date, psp_post_id, psp_link_status, psp_bad_links) VALUES ('$date', $post_id, $status,'$url');";
						$wpdb->query($request);
					}
	                //$sendto = get_option('blr_send_to_addr');
					//if (isset($sendto)  &&  !empty($sendto)) {

						//$sent = $this->send_mail($status,$url,$post_url,$sendto);
						//$this->send_mail($status,$url,$post_url,$sendto);

	                //}
					
					if ($status==333||$status==999) {

	                	if (!$hide_timed_out_links && $log_timed_out_links) {

							return 0;
						} else if ($hide_timed_out_links && $log_timed_out_links) {

							return 1;
						}
					}
					/*$nohide_https = $this->nohide_https;
					//echo "nohide: $nohide_https";
					//echo "$status";
					if ((strpos($nohide_https, $status)) === true) {
						echo "nohide: $nohide_https";
						exit;
						return 0;
					}*/
					$nohide_http = $this->nohide_http;
					foreach ($nohide_http as $http_status) { 
						
						if (trim($http_status) === $status) {  						
							return 0;
						}
					}
	                if($status==301) {

	                	if (!$blr_options['blr_p_redirect']) {
	                		return 0;
	                	}
	                }

	                if($status==302) {

						if (!$blr_options['blr_t_redirect']) {					
							return 0;
						}
	                }

	                return 1;
	           	}
			}
           	return 0;
		
        }


        function replace_broken_links($output) {
                
				//if (is_single() || is_page()) {
				global $wp_query;
				//read the options
				$blr_options = $this->blr_options;
				//The plugin does not work for the following
				if(is_feed() || is_home() || is_page() || is_date() || is_author() || is_category() || is_author() || is_tag()) {
					return $output;
				} else {
					
					$check_for_broken_links = true;
					$check_links_in_home = true;
					//Get post info
					$post = $wp_query->get_queried_object();
					//$post = $this->blr_post;//$wp_query->get_queried_object();
					$post_id = $post->ID;
					//if it is a post / page then post id will not be empty
					if (!empty($post_id)) {
						//Get last date when the post was checked for broken links
						$blr_last_date = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'blr_date', true)));
						//Get current date
						$blr_date = date("Y-m-d");							
						//Get the difference and if the diff. is less than the time interval (in days) option that has been set by the user do not check for broken links
						if (isset($blr_last_date) && !empty($blr_last_date)) {							
							$diff_in_days = $this->datediff('d',  $blr_last_date,  $blr_date, false);
							$time_interval = $this->blr_days;
							if ($diff_in_days < $time_interval) {
								$this->check_for_broken_links = false;
								$check_for_broken_links = false;	
							}							
						}
						//if the post is checked for broken links then update the broken links checker date with the current date
						if ($check_for_broken_links) {
								delete_post_meta($post_id, 'blr_date');						
								add_post_meta($post_id, 'blr_date', $blr_date);
						}
					}
					//if it is home or date archive or category or tag pages post id will be empty
					if (empty($post_id)) {
						$do_not_hide = $this->nohide_links;
						//if none of the links are to be hidden then they not be checked as this is home or date archive or category or tag page
						if ($do_not_hide) {
							$check_links_in_home = false;
							$this->check_for_broken_links = false;
						}
					}
					//$check_links_in_home will be true if it is a post/page and in other cases, only if the links need to be checked for broken status
					if ($check_links_in_home) {
					
						//$userAgent = $_SERVER['HTTP_USER_AGENT']; //get user agent
						//Replace broken links with text
						//$anchorPattern = '/<a (.*?)href="(.*?)"(.*?)>(.*?)<\/a>/i';
						$anchorPattern = '/<a ([^<>]*?)href="(.*?)"([^<>]*?)>(.*?)<\/a>/i';
						$output = preg_replace_callback($anchorPattern,array($this,'check_broken_links'),$output);


						//Replace broken image links
						if ($blr_options['blr_img_links']) {

							//$imgPattern = '/<img (.*?)src="(.*?)"(.*?)>/i';
							$imgPattern = '/<img ([^<>]*?)src="([^<>]*?)"(.*?)>/i';
							$output = preg_replace_callback($imgPattern,array($this,'check_img_links'),$output);
						}
					}
                }

              return $output;

        }

        function check_broken_links($matches) {

        	if ($this->is_broken($matches[2])) {
				$do_not_hide = $this->nohide_links;
        		if (!$do_not_hide) {

					return $matches[4];
				}
           	}

			//return '<a href="' . $matches[2] . '"' . $matches[1] . $matches[3] . '>' . $matches[4] . '</a>';
			return $matches[0];

        }

        function check_img_links($matches) {
			$blr_options = $this->blr_options;		
		     if ($this->is_broken($matches[2])) {

		     	if (!$blr_options['blr_nohide_links']) {

					return '';
				}
		     }

				return $matches[0];
        }

        function use_curl($ch, $url){

			$parsed_url=parse_url($url);
			if(!$parsed_url) return 111; //relative urls are now taken care 1.1
			$timeout = $this->blr_timeout;

			if(!isset($parsed_url['scheme'])) $url='http://'.$url;

			curl_setopt($ch, CURLOPT_URL, $url);
			//$urlhost = $parsed_url['host'];
			//$sitehost = $this->sitehost;
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

			curl_setopt($ch, CURLOPT_FAILONERROR, false);

			$nobody=false;
			if($parts['scheme']=='https'){
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			} else {
				$nobody=true;
				curl_setopt($ch, CURLOPT_NOBODY, true);
			}
			curl_setopt($ch, CURLOPT_HEADER, true);

			$response = curl_exec($ch);

			if (!$response) {

				return 333;
			}
			$code=intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));

			if ( (($code<200) || ($code>=400)) && $nobody) {

				curl_setopt($ch, CURLOPT_NOBODY, false);
				curl_setopt($ch, CURLOPT_HTTPGET, true);
				curl_setopt($ch, CURLOPT_RANGE, '0-2047');
				$response = curl_exec($ch);

				if (!$response) {

					return 333;
				}

				$code=intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));

			}


			curl_close($ch);
			return $code;
		}

        function open_Socket($url)
        {

			$parsed_url = parse_url($url);
			if(!$parsed_url) return 111;

			$host = $parsed_url[host];
			$path = $parsed_url[path];
			//$timeout = 2;
			$timeout = $this->blr_timeout;

            if (empty($path)) {
                $path = "/";
            }

			$userAgent = "BrokenLinksRemover/1.1";

			//$urlhost = $parsed_url['host'];
			//$sitehost = $this->sitehost;
			//if ($sitehost == $urlhost) {

            /* build request headers */
			$req_header = "HEAD $path HTTP/1.1\r\n"
                 . "Host: $host\r\n"
                 . "Connection: Close\r\n\r\n";

            $fp = @fsockopen($host, 80, $errno, $errmsg, $timeout);

            if (!$fp) {
                //print "Oops, something went wrong.";
                //exit;
                return 999;
            }

            /* send request headers */
            fwrite($fp, $req_header);

            stream_set_blocking($fp, TRUE);
			stream_set_timeout($fp,$timeout);
			$info = stream_get_meta_data($fp);


            /* read response */
            while((!feof($fp)) && (!$info['timed_out'])) {
            //while(!feof($fp)) {

                $res_header .= fgets($fp, 4096);
            }

            fclose($fp);

            if ($info['timed_out']) {

			        //echo 'Connection timed out!';
			        return 333; //custom timeout status code
    		}

            /* get http status */
            $f_line = substr($res_header, 0, strpos($res_header, "\r\n"));

            list($proto, $status, $msg) = explode(" ", $f_line);

           	return $status;

        }

        function send_mail($status, $bad_link, $post_url,$sendto)
        {

           if($status==404)
           {
              $message="Broken: ";
           }
           else if ($status==301)
           {
              $message="Redirect: ";
           }
           else if ($status==999)
		   {
		      $message="Cannot open socket: ";

           } else {

              $message="Bad link - $status: ";
           }

           $sendsubject = "Bad links notice served by Platinum SEO Pack";

            // Results of files last modified
            $email_output = "Bad link in post: $post_url";
            $email_output .= "\n";
            $email_output .= "$message $bad_link\n";

            // Line break, which we will used for the headers
            $send_eol = "\r\n";

            $send_headers = "From: Platinum SEO Engine"; //the_author_email();

            // Send!
            return mail($sendto, $sendsubject, $email_output, $send_headers);

        }		
		
		function sanitize_url($url){
			$parts=@parse_url($url);
			if(!$parts) return false;

			$url = html_entity_decode($url);
			$url=preg_replace(
				array('/([\?&]PHPSESSID=\w+)$/i',
					'/(#[^\/]*)$/',
					'/&amp;/',
					'/^(javascript:.*)/i',
					'/([\?&]sid=\w+)$/i'
					),
				array('','','&','',''),
				$url);
			$url=trim($url);

			if (strpos($url, 'mailto:')!==false) return false;
			//if (strpos($url, 'feed')!==false) return false;
			if($url=='') return false;

			// turn relative URLs into absolute URLs
			$url = $this->convreltoabsolute($this->siteurl, $url);

			$convparts=@parse_url($url);
			if(!$convparts) return false;

			if(isset($convparts['host'])) {

				$urlhost = $convparts['host'];
				//echo "urlhost: $urlhost";
				$sitehost = $this->sitehost;
				if ($sitehost == $urlhost) {
					$slug = basename( $url );
					$post_exists = $this->does_post_exist( $slug );

					if( $post_exists) {
						return false;
					}
				}
			}
			return $url;
		}

		function convreltoabsolute($absolute, $relative) {
			$p = @parse_url($relative);
			if(!$p) {
				return false;
			}
			if(isset($p["scheme"])) return $relative;

			$parts=(parse_url($absolute));

			if(substr($relative,0,1)=='/') {
				$cparts = (explode("/", $relative));
				array_shift($cparts);
			} else {
				if(isset($parts['path'])){
					$aparts=explode('/',$parts['path']);
					array_pop($aparts);
					$aparts=array_filter($aparts);
				} else {
					$aparts=array();
				}

				$rparts = (explode("/", $relative));

				$cparts = array_merge($aparts, $rparts);
				foreach($cparts as $i => $part) {
					if($part == '.') {
						unset($cparts[$i]);
					} else if($part == '..') {
						unset($cparts[$i]);
						unset($cparts[$i-1]);
					}
				}
			}
			$path = implode("/", $cparts);

			$url = '';
			if($parts['scheme']) {
				$url = "$parts[scheme]://";
			}
			if(isset($parts['user'])) {
				$url .= $parts['user'];
				if(isset($parts['pass'])) {
					$url .= ":".$parts['pass'];
				}
				$url .= "@";
			}
			if(isset($parts['host'])) {
				$url .= $parts['host']."/";
	        }
			$url .= $path;

			return $url;
		}

		// Check if a given slug belongs to a post in the database
		function does_post_exist( $slug ) {

			global $wpdb;

			if( $ID = $wpdb->get_var( 'SELECT ID FROM '.$wpdb->posts.' WHERE post_name = "'.$slug.'" AND post_status = "publish" ' ) ) {
				return true;
			}
			else {
				return false;
			}

		}
		//function to calculate date difference
		function datediff($interval, $datefrom, $dateto, $using_timestamps = false)
		{

			
			/*$interval can be:
			yyyy - Number of full years
			q - Number of full quarters
			m - Number of full months
			y - Difference between day numbers
			(eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33".
		                 The datediff is "-32".)
			d - Number of full days
			w - Number of full weekdays
			ww - Number of full weeks
			h - Number of full hours
			n - Number of full minutes
			s - Number of full seconds (default)*/
			

			if (!$using_timestamps) {
				$datefrom = strtotime($datefrom, 0);
				$dateto = strtotime($dateto, 0);
			}
			$difference = $dateto - $datefrom; // Difference in seconds

			switch($interval) {
				case 'yyyy': // Number of full years
				$years_difference = floor($difference / 31536000);
				if (mktime(date("H", $datefrom),
		                              date("i", $datefrom),
		                              date("s", $datefrom),
		                              date("n", $datefrom),
		                              date("j", $datefrom),
		                              date("Y", $datefrom)+$years_difference) > $dateto) {

				$years_difference--;
				}
				if (mktime(date("H", $dateto),
		                              date("i", $dateto),
		                              date("s", $dateto),
		                              date("n", $dateto),
		                              date("j", $dateto),
		                              date("Y", $dateto)-($years_difference+1)) > $datefrom) {

				$years_difference++;
				}
				$datediff = $years_difference;
				break;

				case "q": // Number of full quarters
				$quarters_difference = floor($difference / 8035200);
				while (mktime(date("H", $datefrom),
		                                   date("i", $datefrom),
		                                   date("s", $datefrom),
		                                   date("n", $datefrom)+($quarters_difference*3),
		                                   date("j", $dateto),
		                                   date("Y", $datefrom)) < $dateto) {

				$months_difference++;
				}
				$quarters_difference--;
				$datediff = $quarters_difference;
				break;		

				case "ww": // Number of full weeks
				$datediff = floor($difference / 604800);
				break;

				case "h": // Number of full hours
				$datediff = floor($difference / 3600);
				break;

				case "n": // Number of full minutes
				$datediff = floor($difference / 60);
				break;
				
				case "d": // Number of full days
				$datediff = floor($difference / 86400);
				break;

				default: // Number of full seconds (default)
				$datediff = $difference;
				break;
			}

			return $datediff;
		}


        /** crude approximization of whether current user is an admin */
        function is_admin() {

                return current_user_can('level_8');
        }

        function init() {
        	if (function_exists('load_plugin_textdomain')) {
        	    load_plugin_textdomain('Broken_Links_Remover', false, dirname( plugin_basename( __FILE__ ) ));

        	}
        }

        function admin_menu() {

                $file = __FILE__;

                add_submenu_page('options-general.php', __('Broken Links Remover', 'Broken_Links_Remover'), __('Broken Links Remover','Broken_Links_Remover'), 10, $file, array($this, 'options_panel'));
                add_management_page('Broken Links Manager', 'Bad Links', 3, __FILE__, array($this, 'blr_managementpage'));
        }

		function blr_managementpage() {

			global $wpdb;
            $psp_bad_links_table = $this->psp_bad_links_table;
			// Handle bulk deletes
			if ( isset($_POST['deleteit']) && isset($_POST['delete']) ) {

        		foreach( (array) $_POST['delete'] as $psp_id_del ) {

                	if ( !current_user_can('edit_posts', $psp_id_del) )
                    	wp_die( __('You are not allowed to delete this broken link.') );

                	//Delete SQL here

                	$delete_bad_links = "Delete from $psp_bad_links_table where psp_id = '".$psp_id_del."'";
	                $wpdb->query( $delete_bad_links );
        		}
			}

			$bad_links_count = "SELECT 1 FROM $psp_bad_links_table";
			//$bad_links_count = "SELECT count(*) as total_rows FROM $psp_bad_links_table";
			$bad_links = $wpdb->get_results( $bad_links_count );
			$total_no_links = count($bad_links);
			//$total_no_links = $bad_links->total_rows;

			if ( !isset( $_GET['paged'] ) )
        		$_GET['paged'] = 1;
?>

<div class="wrap">

<form id="broken-filter" action="" method="get">
<h2>Broken links Management:</h2>

<div class="tablenav">

<?php
$max_links_per_page = 15;
$link_count = ceil($total_no_links/$max_links_per_page);
$page_no = $_GET['paged'];

$bad_link_query = "SELECT * FROM $psp_bad_links_table";
$limit_sql = ' LIMIT '.(($page_no - 1) * $max_links_per_page).', '.$max_links_per_page;
$bad_link_query .= $limit_sql;

$bad_links = $wpdb->get_results( $bad_link_query );

$page_links = paginate_links( array(
        'base' => add_query_arg( 'paged', '%#%' ),
        'format' => '',
        'total' => ceil($total_no_links/$max_links_per_page),
        'current' => $page_no
));


if ( $page_links )
        echo "<div class='tablenav-pages'>$page_links</div>";
?>
</form>
<form id="broken-filter-post" action="" method="post">
<div class="alignleft">
<input type="submit" value="<?php _e('Delete'); ?>" name="deleteit" class="button-secondary delete" />
</div>

<br class="clear" />
</div>

<br class="clear" />
<script type="text/javascript">
<!--
    function checkAll(form) {
    	for (i = 0, n = form.elements.length; i < n; i++) {
    		if(form.elements[i].type == "checkbox" && !(form.elements[i].getAttribute('onclick',2))) {
    			if(form.elements[i].checked == true)
    				form.elements[i].checked = false;
    			else
    				form.elements[i].checked = true;
    		}
    	}
}
//-->
</script>
<table class="widefat">
        <thead>
        <tr>
        <th scope="col" class="check-column"><input onclick="checkAll(document.getElementById('broken-filter-post'));" type="checkbox"></th>

                <th scope="col">Date</th>
                <th scope="col">Post ID</th>
                <th scope="col">Bad links</th>
                <th scope="col">link Status</th>
</tr></thead>
<?php
if(count($bad_links) > 0) { ?>
<tbody>
<?php $bgcolor = '';
$class = 'alternate' == $class ? '' : 'alternate';

foreach($bad_links as $bad_link){
$post_blr_id = $bad_link->psp_post_id;
$post_blr = get_post($post_blr_id);
$title = $post_blr->post_title;
?>
<tr id="<?php echo $bad_link->psp_id; ?>" class="<?php echo trim( $class . ' author-self status-publish'); ?>" valign="top">
<th scope="row" class="check-column"><?php if ( current_user_can( 'edit_posts', $bad_link->psp_post_id ) ) { ?><input type="checkbox" name="delete[]"
value="<?php echo $bad_link->psp_id; ?>" /><?php } ?></th>

<td><abbr title="<?php echo $bad_link->psp_date; ?>"><?php echo $bad_link->psp_date; ?></abbr></td>
<td><strong><?php if ( current_user_can( 'edit_posts', $bad_link->psp_post_id ) ) { ?><a class="row-title" href="post.php?action=edit&amp;post=<?php echo $bad_link->psp_post_id; ?>" target="_blank" title="<?php echo attribute_escape(sprintf(__('Edit "%s"'), $title)); ?>"><?php echo $bad_link->psp_post_id; ?></a><?php } else { echo $title; } ?></strong></td>
<td><?php echo $bad_link->psp_bad_links; ?></td>
<td><?php echo $bad_link->psp_link_status; ?></td></tr><?php } ?>
</tbody>
<?php } ?>
</table>

</form>

<div class="tablenav">

<?php
if ( $page_links )
        echo "<div class='tablenav-pages'>$page_links</div>";
?>

<br class="clear" />
</div>

<br class="clear" />

</div>

<?php include('admin-footer.php'); }
function options_panel() {

        global $wpdb;
		$blr_options = $this->blr_options;
        $blr_will_work = true;
        $bad_links_table = true;
        if(!function_exists('curl_init')){
        	$blr_will_work = false;
        	if(!function_exists('fsockopen')) {
        		$blr_will_work = false;
        	} else {
        		$blr_will_work = true;
        	}

        }
        if($blr_will_work){

			$psp_bad_links_table = $this->psp_bad_links_table;
        	//$psp_bad_links_table = $wpdb->prefix . "psp_bad_links";

        	// Create the tables psp_bad_links_table
        	// before creating, check whether the table is already present

        	//$bad_links_table = true;
        	if($wpdb->get_var("SHOW TABLES LIKE '$psp_bad_links_table'") != $psp_bad_links_table) {

                $bad_links_table = false;

        	}

        	if(!$bad_links_table){

                $request = "CREATE TABLE `$psp_bad_links_table` (
                                `psp_id` bigint(20) unsigned NOT NULL auto_increment,
                                `psp_date` date NOT NULL default '0000-00-00',
                                `psp_post_id` mediumint(9) unsigned NOT NULL default '0',
                                `psp_link_status` mediumint(9) unsigned NOT NULL default '0',
                                 `psp_bad_links` text NOT NULL,
                                 PRIMARY KEY  (`psp_id`),
                                 KEY `post_status` (`psp_post_id`,`psp_bad_links`(7)),
                                 KEY `link_status` (`psp_link_status`)
                                ) TYPE=MyISAM
                        ";
                $wpdb->query($request);

        	}
        }

        if(!$blr_will_work):
		?>
		<div class="wrap">
		<h2><?php _e('Installation','Broken_Links_Remover'); ?></h2>
		<p><?php _e('The <b>Broken Links Remover</b> plugin will not work as your hosting server supports neither curl nor fsockopen.Disable it.','Broken_Links_Remover'); ?></p>
		</div>
        <?php
        endif;
        if(!$bad_links_table):
        ?>
        <div class="wrap">
                <h2><?php _e('Installation','Broken_Links_Remover'); ?></h2>
                <p><?php _e('The <b>Broken Links Remover</b> plugin is now initialized. The Bad links table has been created. If you choose to deactivate the plugin you must drop the table manually.','Broken_Links_Remover'); ?></p>
        </div>
        <?php
        endif;
        $message = null;
        $message_updated = __("Broken Links Remover Options Updated.", 'Broken_Links_Remover');

        // update options
        if ($_POST['action'] && $_POST['action'] == 'blr_update') {
                $message = $message_updated;
                //update_option('blr_send_to_addr', $_POST['blr_send_to_addr']);
				/*update_option('blr_days', $_POST['blr_days']);
				update_option('blr_nohide_links', $_POST['blr_nohide_links']);
				update_option('blr_ignore_http_hide', $_POST['blr_ignore_http_hide']);
				update_option('blr_ignore_http', $_POST['blr_ignore_http']);
				update_option('blr_t_redirect', $_POST['blr_t_redirect']);
				update_option('blr_p_redirect', $_POST['blr_p_redirect']);
				update_option('blr_img_links', $_POST['blr_img_links']);
				update_option('blr_t_out_period', $_POST['blr_t_out_period']);
				update_option('blr_t_out_links', $_POST['blr_t_out_links']);
				update_option('blr_log_tout_links', $_POST['blr_log_tout_links']);*/
                //update_option('blr_nohide_links', $_POST['blr_nohide_links']);
				
				$upd_options['blr_days'] = $_POST['blr_days'];
				$upd_options['blr_nohide_links'] = $_POST['blr_nohide_links'];
				$upd_options['blr_ignore_http_hide']= $_POST['blr_ignore_http_hide'];
				$upd_options['blr_ignore_http'] = $_POST['blr_ignore_http'];
				$upd_options['blr_t_redirect'] = $_POST['blr_t_redirect'];
				$upd_options['blr_p_redirect'] = $_POST['blr_p_redirect'];
				$upd_options['blr_img_links'] = $_POST['blr_img_links'];
				$upd_options['blr_t_out_period'] = $_POST['blr_t_out_period'];
				$upd_options['blr_t_out_links'] = $_POST['blr_t_out_links'];
				$upd_options['blr_log_tout_links'] = $_POST['blr_log_tout_links'];

				update_option('blr_options', $upd_options);
				$blr_options = get_option('blr_options');

        }
        ?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>
<div class="wrap">
<h2><?php _e('Broken Links Remover Plugin Options', 'Broken_Links_Remover'); ?></h2>
<p>
<?php _e("This is version ", 'Broken_Links_Remover') ?><?php _e("$this->version ", 'Broken_Links_Remover') ?>
&nbsp;
| <a target="_blank" title="<?php _e('FAQ', 'Broken_Links_Remover') ?>"
href="http://techblissonline.com/broken-links-remover/"><?php _e('FAQ', 'Broken_Links_Remover') ?></a>
| <a target="_blank" title="<?php _e('Broken_Links_Remover Plugin Feedback', 'Broken_Links_Remover') ?>"
href="http://techblissonline.com/broken-links-remover/"><?php _e('Feedback', 'Broken_Links_Remover') ?></a>
| <a target="_blank" title="<?php _e('Donations for Broken_Links_Remover Plugin', 'Broken_Links_Remover') ?>" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=rrajeshbab%40gmail%2ecom&item_name=Platinum%20SEO%20plugin%20development%20and%20support%20expenses&item_number=1&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=IN&bn=PP%2dDonationsBF&charset=UTF%2d8"><?php _e('Please Donate','Broken_Links_Remover') ?></a>
</p>
<script type="text/javascript">
<!--
    function toggleVisibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>

<h3><?php _e('Click on option titles to get help!', 'Broken_Links_Remover') ?></h3>

<form name="dofollow" action="" method="post">
<table class="form-table">

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_days_tip');">
<?php _e('Time interval (in days) at which a post should be checked for broken links:', 'Broken_Links_Remover')?>
</a>
</td>
<td>
<input size="1" name="blr_days" value="<?php echo stripcslashes($blr_options['blr_days']); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="blr_days_tip">
<?php
_e('Here you can set the Time interval (in days) at which a post should be checked for broken links. However a post is verified for broken links only if it is visited by a user - robots or human visitors i.e. If a post is not visited by a user on the expiry of such time interval, the post will not be verified for broken links', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_nohide_links_tip');">
<?php _e('Do not hide any bad link:', 'Broken_Links_Remover')?>
</td>
<td>
<input type="checkbox" name="blr_nohide_links" <?php if ($blr_options['blr_nohide_links']) echo "checked=\"1\""; ?>/>
<?php _e('Note that the bad links will however be logged for your perusal and action.', 'Broken_Links_Remover')?>
<div style="max-width:500px; text-align:left; display:none" id="blr_nohide_links_tip">
<?php
_e('Check this if you do not want to hide any bad/broken link on your posts/pages.But the bad links will however be logged for your perusal and corrective action.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_ignore_http_hide_tip');">
<?php _e('Do not hide link with HTTP status:', 'Broken_Links_Remover')?>
</a>
</td>
<td>
<input size="59" name="blr_ignore_http_hide" value="<?php echo stripcslashes($blr_options['blr_ignore_http_hide']); ?>"/>
<?php _e('Enter comma seperated HTTP status codes. Eg: 205,404', 'Broken_Links_Remover')?>
<div style="max-width:500px; text-align:left; display:none" id="blr_ignore_http_hide_tip">
<?php
_e('Do not hide any link that returns the above HTTP status codes.However note that these links will be logged.Also note that links with 301 and 302 status will not be hidden by default unless you choose them to hide by selecting the options mentioned below.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_ignore_http_tip');">
<?php _e('Completely Ignore links with HTTP status:', 'Broken_Links_Remover')?>
</a>
</td>
<td>
<input size="59" name="blr_ignore_http" value="<?php echo stripcslashes($blr_options['blr_ignore_http']); ?>"/>
<?php _e('Enter comma seperated HTTP status codes. Eg: 205,404', 'Broken_Links_Remover')?>
<div style="max-width:500px; text-align:left; display:none" id="blr_ignore_http_tip">
<?php
_e('Completely Ignore any link that returns the above HTTP status codes i.e. neither hide nor log links with these status', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_img_links_tip');">
<?php _e('Hide broken image links:', 'Broken_Links_Remover')?>
</td>
<td>
<input type="checkbox" name="blr_img_links" <?php if ($blr_options['blr_img_links']) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="blr_img_links_tip">
<?php
_e('Check this if you want to hide broken image links on your posts/pages.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_timeout_tip');">
<?php _e('Timeout for pinging link (in seconds):', 'Broken_Links_Remover')?>
</a>
</td>
<td>
<input size="1" name="blr_t_out_period" value="<?php echo stripcslashes($blr_options['blr_t_out_period']); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="blr_timeout_tip">
<?php
_e('Here you can set the timeout for pinging any link.If Broken links Remover cannot find the link status within this timeout period, it will treat the link as timedout.Default is 2 seconds.It is recommended to not set this beyond 30 seconds.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_log_tout_links_tip');">
<?php _e('Log Timedout links:', 'Broken_Links_Remover')?>
</td>
<td>
<input type="checkbox" name="blr_log_tout_links" <?php if ($blr_options['blr_log_tout_links']) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="blr_log_tout_links_tip">
<?php
_e('Check this if you want to log links that have timed out.Links that have timed out will status 333 or 999.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_t_out_links_tip');">
<?php _e('Hide Timedout links:', 'Broken_Links_Remover')?>
</td>
<td>
<input type="checkbox" name="blr_t_out_links" <?php if ($blr_options['blr_t_out_links']) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="blr_t_out_links_tip">
<?php
_e('Check this if you want to hide links that have timed out.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_p_redirect_tip');">
<?php _e('Hide 301 redirects:', 'Broken_Links_Remover')?>
</td>
<td>
<input type="checkbox" name="blr_p_redirect" <?php if ($blr_options['blr_p_redirect']) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="blr_p_redirect_tip">
<?php
_e('Check this if you want to hide 301 permanently redirected links on your posts/pages.However,these links will always be available on your dashboard for your action, irrespective of whether you hide them or not.', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'Broken_Links_Remover')?>" onclick="toggleVisibility('blr_t_redirect_tip');">
<?php _e('Hide 302 redirects:', 'Broken_Links_Remover')?>
</td>
<td>
<input type="checkbox" name="blr_t_redirect" <?php if ($blr_options['blr_t_redirect']) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="blr_t_redirect_tip">
<?php
_e('Check this if you want to hide 302 temporarily redirected links on your posts/pages.However,these links will always be available on your dashboard for your action, irrespective of whether you hide them or not', 'Broken_Links_Remover');
 ?>
</div>
</td>
</tr>
</table>
<p class="submit">
<input type="hidden" name="action" value="blr_update" />
<input type="submit" name="Submit" value="<?php _e('Update Options', 'Broken_Links_Remover')?> &raquo;" />
</p>
</form>
</div>
<?php

        } // options_panel

}

//add_option("blr_send_to_addr", null, 'broken Links Remover Plugin Email Address', 'yes');
/*add_option("blr_days", 10, 'Timeinterval for verifying posts', 'yes');
add_option("blr_nohide_links", 0, 'Do not hide any bad links', 'yes');
add_option("blr_ignore_http_hide", null, 'Do not hide any link that returns these HTTP status codes', 'yes');
add_option("blr_ignore_http", null, 'Completely Ignore any link that returns these HTTP status codes', 'yes');
add_option("blr_t_redirect", 0, 'hide 302 temporarily redirected links', 'yes');
add_option("blr_p_redirect", 0, 'hide 301 permanently redirected links', 'yes');
add_option("blr_img_links", 0, 'hide broken image links', 'yes');
add_option("blr_t_out_period", 2, 'Timeout period for timing out links', 'yes');
add_option("blr_t_out_links", 0, 'hide timed out links', 'yes');
add_option("blr_log_tout_links", 1, 'hide timed out links', 'yes');*/

$blr_options = array(
		'blr_days' => 10,
		'blr_nohide_links' => 0,
		'blr_ignore_http_hide' => null,
		'blr_ignore_http' => null,
		'blr_t_redirect' => 0,
		'blr_p_redirect' => 0,
		'blr_img_links' => 0,
		'blr_t_out_period' => 2,
		'blr_t_out_links' => 0,
		'blr_log_tout_links' => 1
	);

add_option( 'blr_options', $blr_options);

$blr = new Broken_Links_Remover();

add_action('init', array($blr, 'init'));

add_action('admin_menu', array($blr, 'admin_menu'));

add_filter('the_content',array($blr,'replace_broken_links'));

?>