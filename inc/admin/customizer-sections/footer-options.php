<?php

TRT_Kirki::add_section('display_footer',
    array(
        'title'    => esc_html__('Setting', 'themeplate'),
        'panel'    => 'footer',
        'priority' => 10,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'footer_bg_color',
        'type'      => 'color',
        'label'     => esc_html__('Footer Background Color', 'themeplate'),
        'tooltip'   => esc_html__('Footer Background Color', 'themeplate'),
        'section'   => 'display_footer',
        'default'   => '#0b0d0f',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => 'footer#colophon',
                'property' => 'background-color',
            ),
        ),

    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'type'     => 'kirki-image',
        'settings' => 'footer_background_img',
        'label'    => esc_html__('Background footer images', 'themeplate'),
        'tooltip'  => esc_html__('Upload your background footer.', 'themeplate'),
        'section'  => 'display_footer',
        'default'  => '',
    )
);

// Footer Text Color
TRT_Kirki::add_field('trt_opt',
    array(
        'type'      => 'multicolor',
        'settings'  => 'footer_color',
        'label'     => esc_html__('Colors Footer Settings', 'themeplate'),
        'section'   => 'display_footer',
        'priority'  => 50,
        'choices'   => array(
            'text' => esc_html__('Text', 'themeplate'),
            'link' => esc_html__('Link', 'themeplate'),
            'line' => esc_html__('Line', 'themeplate'),
        ),
        'default'   => array(
            'text' => '#2a2a2a',
            'link' => '#2a2a2a',
            'line' => '#eeeeee',
        ),
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'text',
                'element'  => 'footer#colophon .footer .thim-footer-location, footer#colophon .footer .thim-footer-location p, footer#colophon .footer p, footer#colophon .widget-title,footer#colophon .footer',
                'property' => 'color',
            ),
            array(
                'choice'   => 'link',
                'element'  => 'footer#colophon a',
                'property' => 'color',
            ),
            array(
                'choice'   => 'line',
                'element'  => 'footer#colophon .text-copyright.border-copyright',
                'property' => 'border-top-color',
            ),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'footer_style',
        'type'     => 'switch',
        'label'    => esc_html__('Footer Style New', 'themeplate'),
        'tooltip'  => esc_html__('Turn On/Off Footer style new.', 'themeplate'),
        'section'  => 'display_footer',
        'default'  => false,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);
