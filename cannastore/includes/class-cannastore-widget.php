<?php

class listingslab_Widget extends WP_Widget {
 
    function __construct() {
        parent::__construct( false, __( 'Push2Talk by listingslab', 'listingslab' ) );
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
        <div class="listingslab-plugin-widget">
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
        echo '      var bloginfo = ' . json_encode($data) . ';
            ';
        echo '  var title = "' . $instance['title'] . '";
            ';
        // echo '  var is_user_logged_in = ' . is_user_logged_in() . ';
        //     ';
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

        echo '<h3>Settings</h3>';
        echo '<div class="listingslab-plugin-widget-settings">';

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'listingslab' );
                
        echo '<p>';
        echo esc_attr_e( 'Title', 'listingslab' );
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
 
add_action( 'widgets_init', 'listingslab_register_widget' ); 

function listingslab_register_widget() {
    register_widget( 'listingslab_Widget' );
}
