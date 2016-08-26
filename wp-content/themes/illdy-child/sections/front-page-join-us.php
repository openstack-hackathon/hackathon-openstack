<?php
/**
 *	The template for displaying the join us section in front page.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>

<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$join_us_background_type = get_theme_mod( 'illdy_join_us_background_type', 'image' );
	$join_us_background_image = get_theme_mod( 'illdy_join_us_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
	$join_us_background_color = get_theme_mod( 'illdy_join_us_background_color', '#000000' );
	$join_us_title = get_theme_mod( 'illdy_join_us_general_title', 'Join Us' );
}else{
	$join_us_background_type = get_theme_mod( 'illdy_join_us_background_type' );
	$join_us_background_image = get_theme_mod( 'illdy_join_us_background_image' );
	$join_us_background_color = get_theme_mod( 'illdy_join_us_background_color' );	
	$join_us_title = get_theme_mod( 'illdy_join_us_general_title' );
}

?>

<?php 
if( $join_us_background_type == 'image' ):
	$join_us_style = 'background-image: url('. esc_url( $join_us_background_image ) .');';
elseif( $join_us_background_type == 'color' ):
	$join_us_style = 'background-color:' . $join_us_background_color;
else :
	$join_us_style = '';
endif;
?>

<?php if ( is_active_sidebar( 'front-page-join-us-sidebar' ) ) { ?>

<section id="join-us" class="front-page-section" style="<?php echo $join_us_style; ?>">
	<div class="section-overlay"></div>
	<div class="container">
		<?php if (!empty($join_us_title)): ?>
			<h3><?php echo $join_us_title; ?></h3>
		<?php endif; ?>
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-join-us-sidebar' ) ):
				dynamic_sidebar( 'front-page-join-us-sidebar' );
			elseif( current_user_can( 'edit_theme_options' ) ):
				$the_widget_args = array(
					'before_widget'	=> '<div class="col-sm-3 col-sm-offset-0 col-md-offset-1 widget_illdy_join_us">',
					'after_widget'	=> '</div>',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'Illdy_Widget_Join', 'title='. __( 'Quiero ser Voluntario', 'illdy' ) .'&btn_text=registro&url=#', $the_widget_args );
				the_widget( 'Illdy_Widget_Join', 'title='. __( 'Quiero ser Participante', 'illdy' ) .'&btn_text=registro&url=#', $the_widget_args );
				the_widget( 'Illdy_Widget_Join', 'title='. __( 'Quiero ser Mentor', 'illdy' ) .'&btn_text=registro&url=#', $the_widget_args );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#counter.front-page-section-->

<?php } ?>