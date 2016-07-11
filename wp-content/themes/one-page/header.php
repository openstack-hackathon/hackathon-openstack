<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="utf-8">
        <title>OpenStack Hackaton</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="Participa en el primer hackathon de OpenStack en Latinoamérica. Es el segundo de una serie de eventos #CloudAppHack, que proporcionan una oportunidad para vincularte en un movimiento que crece a todo velocidad en todo el mundo. ¡Nuestro objetivo es abrir las app en la nube para dominar el mundo!"/>

        <!-- Facebook -->
          <meta property="og:image" content="http://hackathon.openstackgdl.org/wp-content/themes/one-page/openstack/img/thumbnail.png"/>
          <meta property="og:title" content="Hackathon OpenStack"/>
          <meta property="og:description" content="Participa en el primer hackathon de OpenStack en Latinoamérica. Es el segundo de una serie de eventos #CloudAppHack, que proporcionan una oportunidad para vincularte en un movimiento que crece a todo velocidad en todo el mundo. ¡Nuestro objetivo es abrir las app en la nube para dominar el mundo!"/>
          <meta property="og:url" content="http://hackathon.openstackgdl.org/" />
          <meta property="og:type" content="website" />

          <!-- Twitter -->
          <meta name="twitter:card" content="summary" />
          <meta name="twitter:site" content="@OpenStackHack" />

          <!-- Custom Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

        <link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>

        <!--Google analitycs-->
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-80190808-1', 'auto');
        ga('send', 'pageview');

      </script>
  
    </head>
    <body id="page-top" <?php body_class( 'index' ); ?>>
        <!-- Header Content -->
        <div class="header">
            <div class="header-container">
                
                <!-- Navigation -->
                <nav class="navbar navbar-default main-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="logo">
                                    
                                </div>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="col-md-11">
                                <div class="menu_wrapper">
                                    <div id="MainNav">
                                        <div id="menu" class="menu-menu-1-container">
                                            <div class="collapse navbar-collapse nav-menu" id="bs-example-navbar-collapse-1">
												<?php
												if ( is_front_page() ) {
													onepage_front_nav();
												} else {
													onepage_subpage_menu_nav();
												}
												?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
        </div>
        <!-- /Header Content -->

