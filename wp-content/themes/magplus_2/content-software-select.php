<?php
				
				$type = 'use_types';
				$pageTitle = $post->post_title;
				$args=array(
				  'post_type' => 'software_use',
				  'post_status' => 'publish',
				  'posts_per_page' => -1,
				  'caller_get_posts'=> 1
				);
				$my_query = null;
				$my_query = new WP_Query($args);
				?>
				
				<ul class="software-select">
					<li>
						<?= $pageTitle ?>
					<li>
					<li>
						<ul>
						<?php
							if( $my_query->have_posts() ) {
								$digital_mag = array();
								
								while ($my_query->have_posts()) : $my_query->the_post(); 

								if($pageTitle == $post->post_title){
									$classstate ='class="on"';
								}
								else{
									$classstate ='';
								}

								//Build array of items for the "Digital Magazine" category menu
								if(strpos(get_the_permalink(),'magazines')||strpos(get_the_permalink(),'comics')){
									array_push($digital_mag, array('title'=>get_the_title(),'link' => get_the_permalink(), 'class'=>$classstate));
								}

								else{
								//Add list of un categorized links
						?>
							
							<li><a href="<?php the_permalink(); ?>" <?= $classstate ?>><?= the_title(); ?></a></li>
							    
						<?php  
						}
								endwhile; 

								//Add "Digital Magazine" menu from array
								if(count($digital_mag)>1){
									echo '<li><a href="/customer-uses/digital-magazines/">Digital Magazines</a>';
									echo "<ul>";
									for ($i = 0; $i < count($digital_mag); $i++){
										
										echo '<li><a href="'.$digital_mag[$i]['link'].'"'.$digital_mag[$i]['class'].'>'.$digital_mag[$i]['title'].'</a></li>';
									}
									echo "</ul></li>";
								}
							}
							
							wp_reset_query();  // Restore global post data stomped by the_post().
						?>
						
						</ul>
					</li>
			</ul>