<?php
class Illdy_Widget_Join extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'illdy_join', __( '[Illdy] - Join', 'illdy' ), array( 'description' => __( 'Add this widget in "Front page - Join Sidebar".', 'illdy' ), ) );
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
        $btn_txt = ( !empty( $instance['btn_txt'] ) ? esc_html( $instance['btn_txt'] ) : '' );
        $url = !empty( $instance['url'] ) ? sanitize_text_field( $instance['url'] ) : '';

        if (!empty($url)) {
            $output = '<p>' . $title . '</p><a href="'. $url .'" title="'. $btn_txt .'" class="btn">' . $btn_txt .'</a>';
        } else {
            $output = '<p>' . $title . '</p>';
        }

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
        $title = !empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( '[Illdy] - Join Us', 'illdy' );
        $btn_txt = !empty( $instance['btn_txt'] ) ? sanitize_text_field( $instance['btn_txt'] ) : __( '[Illdy] - Join Us', 'illdy' );
        $url = !empty( $instance['url'] ) ? sanitize_text_field( $instance['url'] ) : esc_url( '#' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'btn_txt' ); ?>"><?php _e( 'Button Text:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'btn_txt' ); ?>" name="<?php echo $this->get_field_name( 'btn_txt' ); ?>" type="text" value="<?php echo esc_attr( $btn_txt ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'illdy' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
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
        $instance['btn_txt'] = ( !empty( $new_instance['btn_txt'] ) ) ? esc_html( $new_instance['btn_txt'] ) : '';
        $instance['url'] = ( !empty( $new_instance['url'] ) ? esc_url( $new_instance['url'] ) : '' );

        return $instance;
    }

}

function illdy_register_widget_join () {
    register_widget( 'Illdy_Widget_Join' );
}
add_action( 'widgets_init', 'illdy_register_widget_join' );