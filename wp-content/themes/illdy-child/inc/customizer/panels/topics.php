<?php
// Set Panel ID
$panel_id = 'illdy_panel_topics';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/******************* TOPICS ********************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 107,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Topics', 'illdy' ),
        'description'       => __( 'Control various options for topics section from front page.', 'illdy' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_topics_general' ,
    array(
        'title'     => __( 'General', 'illdy' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_topics_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_topics_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'illdy' ),
        'section'   => $prefix . '_topics_general',
        'priority'  => 1
    )
);