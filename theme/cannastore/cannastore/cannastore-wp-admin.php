<?php
/**
 * Replaces Newsup's Header with Cannastore React App Plugin
 *
 * @package Listingslab
 */

add_action('admin_menu', 'cannastore_setup_menu');
function cannastore_setup_menu(){
    add_menu_page( 
    	'Cannastore Page', 
    	'Cannastore', 
    	'manage_options', 
    	'cannastore', 
    	'cannastore_admin',
        get_template_directory_uri( __DIR__ ) . '/cannastore/svg/wp-admin-menu.svg',
        10
    );
}

function cannastore_admin(){
    $fields = array('name', 'description', 'wpurl', 'admin_email' );
    $data = array();
    foreach($fields as $field) {
        $data[$field] = get_bloginfo($field);
    }
    echo '<script>';
    echo 'var wpBloginfo=' . json_encode($data) . '; ';
    echo '</script>';

    $html = file_get_contents(get_theme_root( __DIR__ ) . '/cannastore/react/wp-admin/build/index.html');
    $html = str_replace('href="/static', 'href="'. get_template_directory_uri( __DIR__ ) .
        '/react/wp-admin/build/static', $html);
    $html = str_replace('src="/static', 'src="'. get_template_directory_uri( __DIR__ ) .
        '/react/wp-admin/build/static', $html);
    echo $html;
}

