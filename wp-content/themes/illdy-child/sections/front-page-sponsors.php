<?php
/**
 *	The template for displaying the sponsors section in front page.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>

<?php if ( is_active_sidebar( 'front-page-sponsors-sidebar' ) ) { ?>

<section id="sponsors" class="front-page-section">
	<div class="container">
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-sponsors-sidebar' ) ):
				dynamic_sidebar( 'front-page-sponsors-sidebar' );
			elseif( current_user_can( 'edit_theme_options' ) ):
				/*$the_widget_args = array(
					'before_widget'	=> '<div class="col-sm-4 widget_illdy_banner">',
					'after_widget'	=> '</div>',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'Projects', 'illdy' ) .'&data_from=1&data_to=260&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'Clients', 'illdy' ) .'&data_from=1&data_to=120&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'Coffes', 'illdy' ) .'&data_from=1&data_to=260&data_speed=2000&data_refresh_interval=100', $the_widget_args );*/
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#counter.front-page-section-->

<?php } ?>