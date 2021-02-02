<?php

function cannastore_admin(){
    $fields = array(
        'name', 
        'description', 
        'wpurl', 
        'url', 
        'admin_email', 
        'charset', 
        'version', 
        'html_type', 
        'language'
    );
    $data = array();
    foreach($fields as $field) {
        $data[$field] = get_bloginfo($field);
    }
    echo '<script>';
        echo 'var bloginfo=' . json_encode($data) . '; ';
    echo '</script>';
    $html = file_get_contents(plugin_dir_path( __DIR__ ) . 'cannastore/react/wp-admin/build/index.html');
    $html = str_replace('href="/static', 'href="'. plugin_dir_url( __DIR__ ) .
        'cannastore/react/wp-admin/build/static', $html);
    $html = str_replace('src="/static', 'src="'. plugin_dir_url( __DIR__ ) .
        'cannastore/react/wp-admin/build/static', $html);
    echo $html;
}




