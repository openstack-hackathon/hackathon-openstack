<?php
/**
 *	The template for dispalying the footer.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>
<?php

if ( current_user_can( 'edit_theme_options' ) ) {
	$display_copyright = get_theme_mod( 'illdy_general_footer_display_copyright', 1 );
	$footer_copyright = get_theme_mod( 'illdy_footer_copyright', __( '&copy; Copyright 2016. All Rights Reserved.', 'illdy' ) );
	$img_footer_logo = get_theme_mod( 'illdy_img_footer_logo', esc_url( get_template_directory_uri() . '/layout/images/footer-logo.png' ) );
}else{
	$display_copyright = get_theme_mod( 'illdy_general_footer_display_copyright' );
	$footer_copyright = get_theme_mod( 'illdy_footer_copyright' );
	$img_footer_logo = get_theme_mod( 'illdy_img_footer_logo' );
}
?>

	<div id="scroll-top">
		<i class="fa fa-chevron-up"></i>
	</div>

		<footer id="footer">
			<div class="container footer-widgets">
				<div class="row">
					<?php
					$the_widget_args = array(
						'before_widget'	=> '<div class="widget">',
						'after_widget'	=> '</div>',
						'before_title'	=> '<div class="widget-title"><h3>',
						'after_title'	=> '</h3></div>'
					);
					?>
					<div class="col-sm-4">
						<?php
						if( is_active_sidebar( 'footer-sidebar-1' ) ):
							dynamic_sidebar( 'footer-sidebar-1' );
						elseif( current_user_can( 'edit_theme_options' ) ):
							the_widget( 'WP_Widget_Text', 'title='. __( 'Products', 'illdy' ) .'&text=<ul><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Our work', 'illdy' ) .'">'. __( 'Our work', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Club', 'illdy' ) .'">'. __( 'Club', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'News', 'illdy' ) .'">'. __( 'News', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Announcement', 'illdy' ) .'">'. __( 'Announcement', 'illdy' ) .'</a></li></ul>', $the_widget_args );
						endif;
						?>
					</div><!--/.col-sm-4-->
					<div class="col-sm-4">
						<?php
						if( is_active_sidebar( 'footer-sidebar-2' ) ):
							dynamic_sidebar( 'footer-sidebar-2' );
						elseif( current_user_can( 'edit_theme_options' ) ):
							the_widget( 'WP_Widget_Text', 'title='. __( 'Information', 'illdy' ) .'&text=<ul><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Pricing', 'illdy' ) .'">'. __( 'Pricing', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Terms', 'illdy' ) .'">'. __( 'Terms', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Affiliates', 'illdy' ) .'">'. __( 'Affiliates', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Blog', 'illdy' ) .'">'. __( 'Blog', 'illdy' ) .'</a></li></ul>', $the_widget_args );
						endif;
						?>
					</div><!--/.col-sm-4-->
					<div class="col-sm-4">
						<?php
						if( is_active_sidebar( 'footer-sidebar-3' ) ):
							dynamic_sidebar( 'footer-sidebar-3' );
						elseif( current_user_can( 'edit_theme_options' ) ):
							the_widget( 'WP_Widget_Text', 'title='. __( 'Support', 'illdy' ) .'&text=<ul><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Documentation', 'illdy' ) .'">'. __( 'Documentation', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'FAQs', 'illdy' ) .'">'. __( 'FAQs', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Forums', 'illdy' ) .'">'. __( 'Forums', 'illdy' ) .'</a></li><li><a href="'. esc_url( '#' ) .'" title="'. __( 'Contact', 'illdy' ) .'">'. __( 'Contact', 'illdy' ) .'</a></li></ul>', $the_widget_args );
						endif;
						?>
					</div><!--/.col-sm-4-->
				</div><!--/.row-->
				<div class="row">
					<div class="col-sm-12">
						<?php if( $img_footer_logo ): ?>
							<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="footer-logo"><img src="<?php echo esc_url( $img_footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
						<?php endif; ?>
						
					</div><!--/.col-sm-4-->
				</div>
			</div><!--/.container-->

			<div class="copyright-container">
				<div class="container">
						<div class="footer-menu">
							<?php
									wp_nav_menu( array(
										'theme_location'	=> 'footer-menu',
										'menu'				=> '',
										'container'			=> '',
										'container_class'	=> '',
										'container_id'		=> '',
										'menu_class'		=> '',
										'menu_id'			=> '', 
										'items_wrap'		=> '%3$s',
										'walker'			=> new Illdy_Extended_Menu_Walker(),
										'fallback_cb'		=> 'Illdy_Extended_Menu_Walker::fallback'
									) );
									?>
						</div>
					<?php if( $display_copyright == 1 ): ?>
						<p class="copyright"><?php echo illdy_sanitize_html( $footer_copyright ); ?></p>
					<?php else: ?>
						<p class="copyright"><?php echo '&copy; Copyright ' . date('Y') . '. All Rights Reserved.'; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</footer><!--/#footer-->

		<!--Google analitycs-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80190808-1', 'auto');
    ga('send', 'pageview');

  </script>
		<?php wp_footer(); ?>
	</body>
</html>