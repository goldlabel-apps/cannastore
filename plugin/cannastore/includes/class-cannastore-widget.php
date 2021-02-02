<?php

class cannastore_Widget extends WP_Widget {
 
    function __construct() {
        parent::__construct( false, __( 'Cannastore by listingslab', 'cannastore' ) );
    }
 
    function widget( $args, $instance ) {

        $fields = array(
            'name', 
            'description', 
            'wpurl',
            'admin_email', 
        );

        $data = array();
        foreach($fields as $field) {
            $data[$field] = get_bloginfo($field);
        }
        
        echo '
        <div class="cannastore-widget">
        ';
        echo '  <style>
            body {
                padding-top: 60px !important;
            }
            </style>
            ';
        $html = file_get_contents(plugin_dir_path( __DIR__ ) . 'react/widget/build/index.html');
        $html = str_replace('href="/static', 'href="'. plugin_dir_url( __DIR__ ) .
            'react/widget/build/static', $html);
        $html = str_replace('src="/static', 'src="'. plugin_dir_url( __DIR__ ) .
            'react/widget/build/static', $html);
        echo '<script>
        ';
        echo '      var wordpress = ' . json_encode($data) . ';
            ';
        echo '  var title = "' . $instance['title'] . '";
            ';
        echo '</script>
        </div>

        ';
        echo $html;
    }

    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        return $instance;
    }
 
    function form( $instance ) {

        echo '<h3>Cannastore Settings</h3>';
        echo '<div class="cannastore-widget-settings">';

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'cannastore' );
                
        echo '<p>';
        echo esc_attr_e( 'Title', 'cannastore' );
        echo '<input 
                class="widefat"
                id="' . esc_attr( $this->get_field_id( 'title' ) ) . '"
                type="text"
                name="' . esc_attr( $this->get_field_name( 'title' ) ) . '"
                value="' . esc_attr( $title ) . '"
            ';
        echo ' />';
        echo '</p>';

        echo '</div>';
    }
}
 
add_action( 'widgets_init', 'cannastore_register_widget' ); 

function cannastore_register_widget() {
    register_widget( 'cannastore_Widget' );
}
