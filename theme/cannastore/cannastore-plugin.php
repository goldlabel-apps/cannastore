<?php
/**
 * Replaces Newsup's Header with React App Plugin
 *
 * @package Listingslab
 */

$plugin_active = false;

if(in_array(
		'cannastore/cannastore.php', 
		apply_filters('active_plugins', 
		get_option('active_plugins')
	)))
{ 
    $plugin_active = true;
}


echo '<style>';
echo '.cannastore-header {';

echo 'background: #57ac0b;';
echo 'min-height: 225px;';
echo 'color: white;';

echo '}';
echo '</style>';

echo '<div class="cannastore-header">';

if ($plugin_active){
	$html = file_get_contents(get_theme_root( __DIR__ ) . '/cannastore/react/header/build/index.html');
	$html = str_replace('href="/static', 'href="'. get_template_directory_uri( __DIR__ ) .
            '/react/header/build/static', $html);
    $html = str_replace('src="/static', 'src="'. get_template_directory_uri( __DIR__ ) .
            '/react/header/build/static', $html);
	echo $html;
} else {
	echo 'Cannastore plugin activation required';
}

echo '</div>';
