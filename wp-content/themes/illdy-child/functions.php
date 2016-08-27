<?php
// Enqueue the parent and child theme stylesheets
add_action( 'wp_enqueue_scripts', 'theme_enqueue_css_js' );

function theme_enqueue_css_js() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'after_setup_theme', 'illdy_setup' );
function illdy_setup() {
  // Extras
    require_once( 'inc/extras.php' );

    // Template Tags
    require_once( get_template_directory() . '/inc/template-tags.php' );

    // Customizer
    require_once( 'inc/customizer/customizer.php' );

    // JetPack
    require_once( get_template_directory() . '/inc/jetpack.php' );

    // TGM Plugin Activation
    require_once( get_template_directory() . '/inc/tgm-plugin-activation/tgm-plugin-activation.php' );

    // Components
    require_once( get_template_directory() . '/inc/components/pagination/class.mt-pagination.php' );
    require_once( get_template_directory() . '/inc/components/entry-meta/class.mt-entry-meta.php' );
    require_once( get_template_directory() . '/inc/components/author-box/class.mt-author-box.php' );
    require_once( get_template_directory() . '/inc/components/related-posts/class.mt-related-posts.php' );
    require_once( get_template_directory() . '/inc/components/nav-walker/class.mt-nav-walker.php' );

    // Widgets
    require_once( get_template_directory() . '/widgets/class-widget-recent-posts.php' );
    require_once( get_template_directory() . '/widgets/class-widget-skill.php' );
    require_once( 'widgets/class-widget-project.php' );
    require_once( 'widgets/class-widget-service.php' );
    require_once( get_template_directory() . '/widgets/class-widget-counter.php' );
    require_once( 'widgets/class-widget-person.php' );
    require_once( 'widgets/class-widget-join.php' );

    // Load Theme Textdomain
    load_theme_textdomain( 'illdy', get_template_directory() . '/languages' );

    // Add Theme Support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-logo', array(
         'flex-width' => true,
         'flex-height' => true,
      ) );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-header', array(
        'default-image'   => esc_url( get_template_directory_uri() . '/layout/images/blog/blog-header.png' ),
        'width'       => 1920,
        'height'      => 532,
        'flex-height'   => true,
        'random-default'  => false,
        'header-text'   => false
    ) );

    // Add Image Size
    add_image_size( 'illdy-blog-list', 653, 435, true );
    add_image_size( 'illdy-widget-recent-posts', 70, 70, true );
    add_image_size( 'illdy-blog-post-related-articles', 240, 206, true );
    add_image_size( 'illdy-front-page-latest-news', 360, 213, true );
    add_image_size( 'illdy-front-page-testimonials', 127, 127, true );
    add_image_size( 'illdy-front-page-projects', 476, 476, true );
    add_image_size( 'illdy-front-page-person', 125, 125, true );

    // Register Nav Menus
    register_nav_menus( array(
      'primary-menu'  => __( 'Primary Menu', 'illdy' ),
    ) );

    // Register Nav Menus
    register_nav_menus( array(
        'footer-menu'  => __( 'Footer Menu', 'illdy' ),
    ) );

    /**
       *  Back compatible
      */
      require get_template_directory() . '/inc/back-compatible.php';

      /*******************************************/
        /*************  Welcome screen *************/
        /*******************************************/

        if ( is_admin() ) {

            global $illdy_required_actions;

            /*
             * id - unique id; required
             * title
             * description
             * check - check for plugins (if installed)
             * plugin_slug - the plugin's slug (used for installing the plugin)
             *
             */
            $illdy_required_actions = array(
                array(
                    "id" => 'illdy-req-ac-frontpage-latest-news',
                    "title" => esc_html__( 'Get the one page template' ,'illdy' ),
                    "description"=> esc_html__( 'If you just installed Illdy, and are not able to see the one page template, you need to go to Settings -> Reading , Front page displays and select "Static Page".','illdy' ),
                    "check" => illdy_is_not_latest_posts()
                ),
                array(
                    "id" => 'illdy-req-ac-install-contact-forms',
                    "title" => esc_html__( 'Install Contact Form 7' ,'illdy' ),
                    "description"=> esc_html__( 'Illdy works perfectly with Contact Form 7. Please install it & make sure you create at least 1 contact form before trying to set it on the front-page.','illdy' ),
                    "check" => defined("WPCF7_PLUGIN"),
                    "plugin_slug" => 'contact-form-7'
                ),
            );

            require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
        }
}

// Add Editor Style
add_editor_style( 'illdy-google-fonts' );

add_action( 'widgets_init', 'illdy_widgets' );

function illdy_widgets() {
    // Blog Sidebar
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'illdy' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in blog page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    // Footer Sidebar 1
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 1', 'illdy' ),
        'id'            => 'footer-sidebar-1',
        'description'   => __( 'The widgets added in this sidebar will appear in first block from footer.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    // Footer Sidebar 2
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 2', 'illdy' ),
        'id'            => 'footer-sidebar-2',
        'description'   => __( 'The widgets added in this sidebar will appear in second block from footer.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    // Footer Sidebar 3
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 3', 'illdy' ),
        'id'            => 'footer-sidebar-3',
        'description'   => __( 'The widgets added in this sidebar will appear in third block from footer.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );

    // About Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - About Sidebar', 'illdy' ),
        'id'            => 'front-page-about-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in about section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-0 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Projects Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Projects Sidebar', 'illdy' ),
        'id'            => 'front-page-projects-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in projects section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="col-sm-3 col-xs-6 no-padding %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Services Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Services Sidebar', 'illdy' ),
        'id'            => 'front-page-services-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in services section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="col-sm-12 col-md-6 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Counter Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Counter Sidebar', 'illdy' ),
        'id'            => 'front-page-counter-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in counter section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="col-sm-3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Team Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Team Sidebar', 'illdy' ),
        'id'            => 'front-page-team-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in team section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-3 col-sm-offset-0 col-xs-10 col-xs-offset-1 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Join Us Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Join Us Sidebar', 'illdy' ),
        'id'            => 'front-page-join-us-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in join us section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-offset-0 col-md-offset-1 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Banner Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Banner Sidebar', 'illdy' ),
        'id'            => 'front-page-banner-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in banner section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Sponsors Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Sponsors Sidebar', 'illdy' ),
        'id'            => 'front-page-sponsors-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in sponsors section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // More About Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - More About Sidebar', 'illdy' ),
        'id'            => 'front-page-more-about-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in more about section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // Topics Sidebar
    register_sidebar( array(
        'name'          => __( 'Front page - Topics Sidebar', 'illdy' ),
        'id'            => 'front-page-topics-sidebar',
        'description'   => __( 'The widgets added in this sidebar will appear in topics section from front page.', 'illdy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // WooCommerce Sidebar
    if( class_exists( 'WooCommerce' ) ) {
        register_sidebar( array(
            'name'          => __( 'WooCommerce Sidebar', 'illdy' ),
            'id'            => 'woocommerce-sidebar',
            'description'   => __( 'The widgets added in this sidebar will appear in WooCommerce pages.', 'illdy' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ) );
    }
}