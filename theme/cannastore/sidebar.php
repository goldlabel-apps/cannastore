<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Newsup
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div id="sidebar-right" class="mg-sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>



</aside><!-- #secondary -->

	<section class="mg-tpt-tag-area">
	  
		 <?php 
		 	$show_popular_tags_title = 'Hashtags';
		 	$select_popular_tags_mode = newsup_get_option('select_popular_tags_mode');
		 	$number_of_popular_tags = newsup_get_option('number_of_popular_tags');
		 	newsup_list_popular_taxonomies(
		 		$select_popular_tags_mode, 
		 		$show_popular_tags_title, 
		 		$number_of_popular_tags); 
		 ?>
		
	</section>
