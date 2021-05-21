<?php
TRT_Kirki::add_section('styling_pattern', array(
    'title'      => esc_html__('Pattern', 'themeplate'),
    'panel'      => 'general',
    'priority'   => 160,
    'capability' => 'edit_theme_options',
));


TRT_Kirki::add_field('trt_opt', [
    'type'     => 'switch',
    'settings' => 'user_bg_pattern',
    'section'  => 'styling_pattern',
    'label'    => esc_html__('Use Background Pattern', 'themeplate'),
    'tooltip'  => esc_html__('Use background pattern if you want.', 'themeplate'),
    'default'  => false,
    'choices'  => array(
        true  => esc_html__('On', 'themeplate'),
        false => esc_html__('Off', 'themeplate'),
    ),
]);

TRT_Kirki::add_field('trt_opt', [
    'settings' => 'bg_pattern',
    'type'     => 'radio-image',
    'label'    => esc_html__('Select Pattern', 'themeplate'),
    'tooltip'  => esc_html__('Allows you to choose a pattern for site.', 'themeplate'),
    'section'  => 'styling_pattern',
    'default'  => TP_THEME_URI . 'assets/images/patterns/pattern1.png',
    'priority' => 6,
    'choices'  => array(
        TP_THEME_URI . 'assets/images/patterns/pattern1.png'  => TP_THEME_URI . 'assets/images/patterns/pattern1_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern2.png'  => TP_THEME_URI . 'assets/images/patterns/pattern2_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern3.png'  => TP_THEME_URI . 'assets/images/patterns/pattern3_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern4.png'  => TP_THEME_URI . 'assets/images/patterns/pattern4_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern5.png'  => TP_THEME_URI . 'assets/images/patterns/pattern5_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern6.png'  => TP_THEME_URI . 'assets/images/patterns/pattern6_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern7.png'  => TP_THEME_URI . 'assets/images/patterns/pattern7_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern8.png'  => TP_THEME_URI . 'assets/images/patterns/pattern8_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern9.png'  => TP_THEME_URI . 'assets/images/patterns/pattern9_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern10.png' => TP_THEME_URI . 'assets/images/patterns/pattern10_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern11.png' => TP_THEME_URI . 'assets/images/patterns/pattern11_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern12.png' => TP_THEME_URI . 'assets/images/patterns/pattern12_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern13.png' => TP_THEME_URI . 'assets/images/patterns/pattern13_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern14.png' => TP_THEME_URI . 'assets/images/patterns/pattern14_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern15.png' => TP_THEME_URI . 'assets/images/patterns/pattern15_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern16.png' => TP_THEME_URI . 'assets/images/patterns/pattern16_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern17.png' => TP_THEME_URI . 'assets/images/patterns/pattern17_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern18.png' => TP_THEME_URI . 'assets/images/patterns/pattern18_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern19.png' => TP_THEME_URI . 'assets/images/patterns/pattern19_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern20.png' => TP_THEME_URI . 'assets/images/patterns/pattern20_icon.png',
        TP_THEME_URI . 'assets/images/patterns/pattern21.png' => TP_THEME_URI . 'assets/images/patterns/pattern21_icon.png',
    ),
]);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'bg_pattern_upload',
        'type'     => 'kirki-image',
        'label'    => esc_html__('Background Image', 'themeplate'),
        'tooltip'  => esc_html__('Select Image for background site.', 'themeplate'),
        'section'  => 'styling_pattern',
        'priority' => 7,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'type'     => 'select',
        'settings' => 'bg_repeat',
        'label'    => esc_html__('Background Repeat', 'themeplate'),
        'tooltip'  => esc_html__('Select background repeat.', 'themeplate'),
        'default'  => 'repeat',
        'priority' => 8,
        'multiple' => 0,
        'section'  => 'styling_pattern',
        'choices'  => array(
            'repeat'    => esc_html__('repeat', 'themeplate'),
            'repeat-x'  => esc_html__('repeat-x', 'themeplate'),
            'repeat-y'  => esc_html__('repeat-y', 'themeplate'),
            'no-repeat' => esc_html__('no-repeat', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'type'     => 'select',
        'settings' => 'bg_position',
        'label'    => esc_html__('Background Position', 'themeplate'),
        'tooltip'  => esc_html__('Select type background position.', 'themeplate'),
        'default'  => 'center center',
        'priority' => 9,
        'multiple' => 0,
        'section'  => 'styling_pattern',
        'choices'  => array(
            'left top'      => esc_html__('Left Top', 'themeplate'),
            'left center'   => esc_html__('Left Center', 'themeplate'),
            'left bottom'   => esc_html__('Left Bottom', 'themeplate'),
            'right top'     => esc_html__('Right Top', 'themeplate'),
            'right center'  => esc_html__('Right Center', 'themeplate'),
            'right bottom'  => esc_html__('Right Bottom', 'themeplate'),
            'center top'    => esc_html__('Center Top', 'themeplate'),
            'center center' => esc_html__('Center Center', 'themeplate'),
            'center bottom' => esc_html__('Center Bottom', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'type'     => 'select',
        'settings'       => 'bg_attachment',
        'label'    => esc_html__( 'Background Attachment', 'themeplate' ),
        'tooltip'  => esc_html__( 'Select background attachment for site.', 'themeplate' ),
        'default'  => 'inherit',
        'priority' => 10,
        'multiple' => 0,
        'section'  => 'styling_pattern',
        'choices'  => array(
            'scroll'  => esc_html__( 'scroll', 'themeplate' ),
            'fixed'   => esc_html__( 'fixed', 'themeplate' ),
            'local'   => esc_html__( 'local', 'themeplate' ),
            'initial' => esc_html__( 'initial', 'themeplate' ),
            'inherit' => esc_html__( 'inherit', 'themeplate' ),
        ),
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'type'     => 'select',
        'settings' => 'bg_size',
        'label'    => esc_html__('Background Size', 'themeplate'),
        'tooltip'  => esc_html__('Select background size for site.', 'themeplate'),
        'default'  => 'cover',
        'priority' => 11,
        'multiple' => 0,
        'section'  => 'styling_pattern',
        'choices'  => array(
            '100% 100%' => esc_html__('100% 100%', 'themeplate'),
            'contain'   => esc_html__('contain', 'themeplate'),
            'cover'     => esc_html__('cover', 'themeplate'),
            'inherit'   => esc_html__('inherit', 'themeplate'),
            'initial'   => esc_html__('initial', 'themeplate'),
        ),
    )
);