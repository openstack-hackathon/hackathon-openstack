<!-- Footer -->
<?php
if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ) || is_active_sidebar( 'third-footer-widget-area' ) || is_active_sidebar( 'fourth-footer-widget-area' ) ) :
	?>
	<div class="footer_wrapper">
		<div class="footer" <?php echo "style='background-color:" . onepage_get_option( 'onepage_footer_sidebar_bg_color', '#111' ) . "'"; ?>>
			<div class="container">
				<div class="row">
					<?php
					/* A sidebar in the footer? Yep. You can can customize
					 * your footer with four columns of widgets.
					 */
					get_sidebar( 'footer' );
					?>
				</div>
			</div>
		</div>
		<?php
	endif;
	?>
    <!--</div>-->
    <div class="bottom_footer" <?php echo "style='background-color:" . onepage_get_option( 'onepage_footer_bg_color', '#0d141b' ) . "'"; ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<h1 class='logo_text_footer'>Hackathon OpenStack Guadalajara</h1>
					
                    <p>¿Tienes alguna duda? ¡Contactános!</p>
                     <p>contacto@hackathon.openstackgdl.org</p>

                    <ul class="footer_social">
                        <li>
                            <a class="fb animated bounce" target="_blank" href="https://www.facebook.com/HackathonOpenStack" title="FaceBook" style="animation-delay: .2s">
                            <i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li >
                            <a class="tw animated bounce" target="_blank" href="https://twitter.com/OpenStackHack" title="Twitter" style="animation-delay: .4s">
                            <i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a class="ln animated bounce" target="_blank" href="https://cloud-app-hackathon.slack.com" title="slack" style="animation-delay: 1.2s">
                            <i class="fa fa-fw fa-slack"></i></a>
                        </li>
                        
                    </ul>
                    
                    <div class="scroll-top page-scroll visible-xs visible-sm">
                        <a class="to_top page-scroll" href="#page-top">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>