<?php
// Set Panel ID
$panel_id = 'illdy_panel_sponsors';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/******************* SPONSORS ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 107,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Sponsors', 'illdy' ),
        'description'       => __( 'Control various options for sponsors section from front page.', 'illdy' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_sponsors_general' ,
    array(
        'title'     => __( 'General', 'illdy' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_sponsors_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_sponsors_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'illdy' ),
        'section'   => $prefix . '_sponsors_general',
        'priority'  => 1
    )
);