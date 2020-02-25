<?php
	$ancestors = get_post_ancestors($post->ID);
	$post_type = get_post_type();
?><div id="sidebar_left" class="sidebar sidebar-left" role="complementary"><?php

	if(!is_search() && !is_404()):
		$post_types = array(
			'articles',
			'press',
			'clients',
			'showcase',
			'video'
		);

		$post_type = get_post_type();

		if(in_array($post_type, $post_types)){
			$id = ps_get_id_by_slug($post_type);

		}elseif($post_type == 'magp_showcase'){
			$id = ps_get_id_by_slug('showcase');

		}else{
			$id = $post->ID;
		}

		if($id && ps_submenu($id)){
			echo '<ul>';
			ps_submenu($id, true, false);
			echo '</ul>';
		}
	endif;
	

	/*if(!is_search() && !is_404()):
		$exceptions = array(
			'articles',
			'press',
			'clients',
			'video'
		);
		$post_type = get_post_type();
		if(in_array($post_type, $exceptions)){
			//This is what was in place before --> do this for exceptional pages...
			$id = ps_get_id_by_slug($post_type);
			if($id && ps_submenu($id)){
				echo '<ul>';
					ps_submenu($id, true, false);
				echo '</ul>';
			}
		}else if($ancestors != null){  //If this is a top lvl page.. move along.. no menu needed
			$top_ancestor = array_pop($ancestors);
			if($ancestors == null){
				//If ancestors is null now, that means we've removed the only ancestor there was, and this this is a 2nd lvl page = look for children of this page and if any display those.
				$children = get_pages(array('child_of' => $post->ID, 'depth' => 8));
				if($children){
					$menu = wp_list_pages('echo=0&depth=5&title_li=&child_of='.$post->ID);
				}
			}else{
				//This page is deeper than 2nd lvl, so first find out what ancestor is 2nd lvl, and display children of _that_ page, where current page is highlighted if possible :)
				$second_lvl_ancestor = array_pop($ancestors);
				$children = get_pages(array('child_of' => $second_lvl_ancestor, 'depth' => 8));
				$menu = wp_list_pages('echo=0&depth=5&title_li=&child_of='.$second_lvl_ancestor);
			}

			if($children != null && $children != false){
				echo '<ul id="left_menu">';
					echo $menu;
				echo '</ul>';
			}
		}

	endif;*/

	/**
	 * The events page
	 */
	if(is_tax('event-categories') || is_post_type_archive('event')): ?>
		<ul>
			<li class="ps-subnav">
				<ul class="ps-subnav-ul">
					<li class="<?php echo (is_page('events')) ? 'current_page_item' : 'current_page_ancestor'; ?>">
						<a href="/events">Events</a>
						<ul>
							<?php
							$terms = get_terms("event-categories");
							$curr_term = (isset($wp_query->query_vars['event-categories'])) ? $wp_query->query_vars['event-categories'] : '';
							foreach($terms as $t): ?>
								<li<?php if($curr_term == $t->slug) echo ' class="current_page_item"'; ?>>
									<a href="<?php echo get_term_link($t->slug, 'event-categories'); ?>"><?php echo $t->name; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
<?php endif; dynamic_sidebar( 'left-widget-area' );
?></div><!-- /#sidebar -->