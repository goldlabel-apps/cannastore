<?php
/**
 * Replaces Newsup's Header with React App Plugin
 *
 * @package Listingslab
 */



echo '<div class="cannastore-header">';
$html = file_get_contents(get_theme_root( __DIR__ ) . '/cannastore/react/header/build/index.html');
$html = str_replace('href="/static', 'href="'. get_template_directory_uri( __DIR__ ) .
            '/react/header/build/static', $html);
$html = str_replace('src="/static', 'src="'. get_template_directory_uri( __DIR__ ) .
            '/react/header/build/static', $html);
echo $html;
echo '</div>';








// $plugin_active = false;
// if ( in_array('cannastore/cannastore.php', apply_filters('active_plugins', get_option('active_plugins')))) { 
//     $plugin_active = true;
// }
// if ($plugin_active){
// } else {
// 	echo 'Cannastore plugin activation required';
// }