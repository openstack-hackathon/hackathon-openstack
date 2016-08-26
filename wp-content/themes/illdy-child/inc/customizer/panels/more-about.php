<?php
// Set Panel ID
$panel_id = 'illdy_panel_more_about';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/******************* MORE ABOUT ****************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 107,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'More About Us', 'illdy' ),
        'description'       => __( 'Control various options for more about us section from front page.', 'illdy' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_more_about_general' ,
    array(
        'title'     => __( 'General', 'illdy' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_more_about_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_more_about_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'illdy' ),
        'section'   => $prefix . '_more_about_general',
        'priority'  => 1
    )
);