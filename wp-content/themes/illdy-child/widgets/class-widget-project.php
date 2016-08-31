<?php
class Illdy_Widget_Project extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'illdy_project', __( '[Illdy] - Project', 'illdy' ), array( 'description' => __( 'Add this widget in "Front page - Projects Sidebar".', 'illdy' ), ) );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    /**
     *  Enqueue Scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'illdy-widget-upload-image', get_template_directory_uri() . '/layout/js/widget-upload-image/widget-upload-image.js', false, '1.0', true);
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $title = ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' );
        $position = ( !empty( $instance['position'] ) ? esc_html( $instance['position'] ) : '' );
        $skills = ( !empty( $instance['skills'] ) ? esc_html( $instance['skills'] ) : '' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $fb_url = (!empty( $instance['fb_url'] ) && $instance['fb_url'] != '#') ? sanitize_text_field( $instance['fb_url'] ) : '';
        $twitter_url = (!empty( $instance['twitter_url'] ) && $instance['twitter_url'] != '#') ? sanitize_text_field( $instance['twitter_url'] ) : '';
        $gp_url = (!empty( $instance['gp_url'] ) && $instance['gp_url'] != '#') ? sanitize_text_field( $instance['gp_url'] ) : '';
        $linkedin_url = (!empty( $instance['linkedin_url'] ) && $instance['linkedin_url'] != '#') ? sanitize_text_field( $instance['linkedin_url'] ) : '';

        $image_id = illdy_get_image_id_from_image_url( $image );
        $get_attachment_image_src = wp_get_attachment_image_src( $image_id, 'illdy-front-page-projects' );

        if (!empty($title) || !empty($position) || !empty($fb_url) || !empty($gp_url) || !empty($twitter_url) || !empty($linkedin_url)) {
          $meta = '<div class="meta-wrapper">';
        }

        if (!empty($title)) {
          $meta .= '<h4>' . $title . '</h4>';
        }

        if (!empty($position)) {
          $meta .= '<h5>' . $position . '</h5>';
        }

        if (!empty($skills)) {
          $meta .= '<p>' . $skills . '</p>';
        }

        if (!empty($fb_url) || !empty($gp_url) || !empty($twitter_url) || !empty($linkedin_url)) {
          $meta .= '<div class="social-networks">';
        }

        if (!empty($fb_url)) {
          $meta .= '<a href="' . $fb_url . '" target="_blank"><i class="fa fa-facebook"></i></a>';
        }

        if (!empty($gp_url)) {
          $meta .= '<a href="' . $gp_url . '" target="_blank"><i class="fa fa-twitter"></i></a>';
        }

        if (!empty($twitter_url)) {
          $meta .= '<a href="' . $twitter_url . '" target="_blank"><i class="fa fa-google-plus"></i></a>';
        }

        if (!empty($linkedin_url)) {
          $meta .= '<a href="' . $linkedin_url . '" target="_blank"><i class="fa fa-linkedin"></i></a>';
        }

        if (!empty($fb_url) || !empty($gp_url) || !empty($twitter_url) || !empty($linkedin_url)) {
          $meta .= '</div>';
        }

        if (!empty($title) || !empty($position) || !empty($fb_url) || !empty($gp_url) || !empty($twitter_url) || !empty($linkedin_url)) {
          $meta .= '</div>';
        }

        $output = '<div class="project" style="background-image: url('. ( $image_id ? esc_url( $get_attachment_image_src[0] ) : get_template_directory_uri() . $image ) .');">';

        if (!empty($meta)) {
          $output .= '<div class="project-overlay"></div> ' . $meta;
        }

        $output .= '</div>';

        echo $output;

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = !empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( '[Illdy] - Project', 'illdy' );
        $position = !empty( $instance['position'] ) ? sanitize_text_field( $instance['position'] ) : __( '', 'illdy' );
        $skills = !empty( $instance['skills'] ) ? sanitize_text_field( $instance['skills'] ) : __( '', 'illdy' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $fb_url = !empty( $instance['fb_url'] ) ? sanitize_text_field( $instance['fb_url'] ) : esc_url( '#' );
        $gp_url = !empty( $instance['gp_url'] ) ? sanitize_text_field( $instance['gp_url'] ) : esc_url( '#' );
        $linkedin_url = !empty( $instance['linkedin_url'] ) ? sanitize_text_field( $instance['linkedin_url'] ) : esc_url( '#' );
        $twitter_url = !empty( $instance['twitter_url'] ) ? sanitize_text_field( $instance['twitter_url'] ) : esc_url( '#' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Position:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" type="text" value="<?php echo esc_attr( $position ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'skills' ); ?>"><?php _e( 'Skills:', 'illdy' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'skills' ); ?>" name="<?php echo $this->get_field_name( 'skills' ); ?>" type="text"><?php echo esc_attr( $skills ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'illdy' ); ?></label>
            <input type="text" class="widefat custom_media_url_<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php if( !empty( $instance['image'] ) ): echo $instance['image']; else: get_template_directory_uri() . '/layout/images/front-page/front-page-project-1.jpg'; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" data-fieldid="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php _e( 'Upload Image','illdy' ); ?>" style="margin-top: 5px;">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'fb_url' ); ?>"><?php _e( 'Facebook:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'fb_url' ); ?>" name="<?php echo $this->get_field_name( 'fb_url' ); ?>" type="text" value="<?php echo esc_attr( $fb_url ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e( 'Twitter:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'gp_url' ); ?>"><?php _e( 'Google+:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'gp_url' ); ?>" name="<?php echo $this->get_field_name( 'gp_url' ); ?>" type="text" value="<?php echo esc_attr( $gp_url ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>"><?php _e( 'LinkedIn:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" type="text" value="<?php echo esc_attr( $linkedin_url ); ?>">
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['position'] = ( !empty( $new_instance['position'] ) ) ? esc_html( $new_instance['position'] ) : '';
        $instance['skills'] = ( !empty( $new_instance['skills'] ) ) ? esc_html( $new_instance['skills'] ) : '';
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['fb_url'] = ( !empty( $new_instance['fb_url'] ) ? esc_url( $new_instance['fb_url'] ) : '' );
        $instance['twitter_url'] = ( !empty( $new_instance['twitter_url'] ) ? esc_url( $new_instance['twitter_url'] ) : '' );
        $instance['gp_url'] = ( !empty( $new_instance['gp_url'] ) ? esc_url( $new_instance['gp_url'] ) : '' );
        $instance['linkedin_url'] = ( !empty( $new_instance['linkedin_url'] ) ? esc_url( $new_instance['linkedin_url'] ) : '' );

        return $instance;
    }

}

function illdy_register_widget_project () {
    register_widget( 'Illdy_Widget_Project' );
}
add_action( 'widgets_init', 'illdy_register_widget_project' );