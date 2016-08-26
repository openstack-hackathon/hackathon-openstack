<?php
/**
 *	The template for displaying the banner section in front page.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>

<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$banner_background_type = get_theme_mod( 'illdy_banner_background_type', 'image' );
	$banner_background_image = get_theme_mod( 'illdy_banner_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
	$banner_background_color = get_theme_mod( 'illdy_banner_background_color', '#000000' );
}else{
	$banner_background_type = get_theme_mod( 'illdy_banner_background_type' );
	$banner_background_image = get_theme_mod( 'illdy_banner_background_image' );
	$banner_background_color = get_theme_mod( 'illdy_banner_background_color' );	
}

?>

<?php 
if( $banner_background_type == 'image' ):
	$banner_style = 'background-image: url('. esc_url( $banner_background_image ) .');';
elseif( $banner_background_type == 'color' ):
	$banner_style = 'background-color:' . $banner_background_color;
else :
	$banner_style = '';
endif;
?>

<?php if ( is_active_sidebar( 'front-page-banner-sidebar' ) ) { ?>

<section id="banner" class="front-page-section" style="<?php echo $banner_style; ?>">
	<div class="section-overlay"></div>
	<div class="container">
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-banner-sidebar' ) ):
				dynamic_sidebar( 'front-page-banner-sidebar' );
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