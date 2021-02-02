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
	$html = file_get_contents(plugin_dir_path( __DIR__ ) . 'cannastore/react/widget/build/index.html');
	$html = str_replace('href="/static', 'href="'. plugin_dir_url( __DIR__ ) .
            'cannastore/react/widget/build/static', $html);
    $html = str_replace('src="/static', 'src="'. plugin_dir_url( __DIR__ ) .
            'cannastore/react/widget/build/static', $html);
	echo $html;

} else {
	echo 'Cannastore plugin activation required';
}

echo '</div>';










