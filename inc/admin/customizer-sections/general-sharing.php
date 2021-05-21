<?php
TRT_Kirki::add_section('share_archive',
    array(
        'title'    => esc_html__('Sharing', 'themeplate'),
        'panel'    => 'general',
        'priority' => 11,
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'archive_sharing_facebook',
        'type'     => 'switch',
        'section'  => 'share_archive',
        'label'    => esc_html__('Share Facebook', 'themeplate'),
        'tooltip'  => esc_html__('Share on facebook.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'archive_sharing_twitter',
        'type'     => 'switch',
        'section'  => 'share_archive',
        'label'    => esc_html__('Share Twitter', 'themeplate'),
        'tooltip'  => esc_html__('Share on twitter.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'archive_sharing_pinterest',
        'type'     => 'switch',
        'section'  => 'share_archive',
        'label'    => esc_html__('Share Pinterest', 'themeplate'),
        'tooltip'  => esc_html__('Share on Pinterest.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

