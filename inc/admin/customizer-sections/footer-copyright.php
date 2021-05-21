<?php
TRT_Kirki::add_section('display_copyright',
    array(
        'title'    => esc_html__('Copyright', 'themeplate'),
        'panel'    => 'footer',
        'priority' => 12,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'show_to_top',
        'type'     => 'switch',
        'label'    => esc_html__('Back To Top', 'themeplate'),
        'tooltip'  => esc_html__('Show or hide back to top', 'themeplate'),
        'section'  => 'display_copyright',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'copyright_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Text Color', 'themeplate'),
        'tooltip'   => esc_html__('Copyright Text Color', 'themeplate'),
        'section'   => 'display_copyright',
        'default'   => '#5a5a5a',
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'color',
                'element'  => 'footer#colophon .text-copyright .thim-widget-copyright .copyright-text,
                footer#colophon .text-copyright',
                'property' => 'color',
            )
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'copyright_link_color',
        'type'      => 'color',
        'label'     => esc_html__('Link Color', 'themeplate'),
        'tooltip'   => esc_html__('Copyright Link Color', 'themeplate'),
        'section'   => 'display_copyright',
        'default'   => '#5a5a5a',
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'color',
                'element'  => 'footer#colophon .text-copyright .thim-widget-copyright .copyright-text a,footer#colophon a:hover',
                'property' => 'color',
				'units'   => '',
				'suffix'   => ' !important',
            )
        ),
    )
);
