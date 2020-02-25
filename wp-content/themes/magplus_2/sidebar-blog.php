<div id="sidebar_right" class="sidebar sidebar-right" role="complementary">
	
	
	<!-- Widgetized Sidebar -->
	<?php 

	dynamic_sidebar( 'blog-widget-area' ); 

//if(is_home() || isset($_GET['s'])){


	?>
	<!--	<span class="blog-tag-list">
			<h2>Articles by Subject</h2>
			 <?php 
			// $posttags = get_terms('post_tag');
			//	if ($posttags) {
			//		echo '<select name="subjectTag" id="subjectTag"><option value="#">Select</option>';
			//	  foreach($posttags as $tag) {
			//	    echo '<option value="'.$tag->slug.'">'.$tag->name .'</option>'; 
			//	  }
			//	  echo '</select>';
			//	}
			 ?>
			<a href="#" class="btn-go primary-button">Go &raquo; </a>
		</span>
		<?// } ?>

</div>--><!-- /#sidebar -->