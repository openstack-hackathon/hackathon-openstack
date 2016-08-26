<?php
/***********************************************/
/*************** Sections Order  ***************/
/***********************************************/
$wp_customize->add_section( $prefix.'_general_sections_order' ,
    array(
        'title'       => __( 'Sections Order', 'illdy' ),
        'priority'    => 101
    )
);

// First section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_first_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 1
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_first_section',
    array(
        'label'         => __( 'First section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the first section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Second section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_second_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 2
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_second_section',
    array(
        'label'         => __( 'Second section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the second section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Third section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_third_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 3
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_third_section',
    array(
        'label'         => __( 'Third section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the third section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Fourth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 4
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'label'         => __( 'Fourth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the fourth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Fifth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 5
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'label'         => __( 'Fifth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the fifth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Sixth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 6
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'label'         => __( 'Sixth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the sixth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Seventh section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 7
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'label'         => __( 'Seventh section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the seventh section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Eighth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 8
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'label'         => __( 'Eighth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the eighth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Ninth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_ninth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 9
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_ninth_section',
    array(
        'label'         => __( 'Ninth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the ninth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Tenth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_tenth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 10
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_tenth_section',
    array(
        'label'         => __( 'Tenth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the tenth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Eleventh section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_eleventh_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 11
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_eleventh_section',
    array(
        'label'         => __( 'Eleventh section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the eleventh section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Twelfth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_twelfth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 12
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_twelfth_section',
    array(
        'label'         => __( 'Twelfth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the twelfth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Thirteenth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_thirteenth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 13
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_thirteenth_section',
    array(
        'label'         => __( 'Thirteenth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the thirteenth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);

// Fourteenth section
/*$wp_customize->add_setting(
    $prefix . '_general_sections_order_fourteenth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 13
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fourteenth_section',
    array(
        'label'         => __( 'Fourteenth section', 'illdy' ),
        'description'   => __( 'Please select what you want to display on the fourteenth section from front page.', 'illdy' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'illdy' ),
            2   => __( 'Projects', 'illdy' ),
            3   => __( 'Testimonials', 'illdy' ),
            4   => __( 'Services', 'illdy' ),
            5   => __( 'Latest News', 'illdy' ),
            6   => __( 'Counter', 'illdy' ),
            7   => __( 'Team', 'illdy' ),
            8   => __( 'Contact us', 'illdy' ),
            9   => __( 'Join us', 'illdy' ),
            10   => __( 'Schedule', 'illdy' ),
            11   => __( 'Topics', 'illdy' ),
            12   => __( 'Banner', 'illdy' ),
            13   => __( 'More About Us', 'illdy' ),
            14   => __( 'Sponsors', 'illdy' )
        )
    )
);*/