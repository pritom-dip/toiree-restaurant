<?php
TRT_Kirki::add_field('trt_opt', [
    'type'      => 'typography',
    'settings'  => 'heading_typography',
    'section'   => 'typography-sec',
    'label'     => esc_html__('Heading Font-Family', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select font-family for headings (h1, h2, h3, h4, h5, h6)', 'themeplate'),
    'priority'  => 10,
    'default'   => array(
        'font-family' => 'Crimson Text',
        'color'       => '#2a2a2a',
        'variant'     => '600',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'h1, h2, h3, h4, h5, h6, body h1 a, body h2 a, body h3 a, body h4 a, body h5 a, body h6 a',
            'property' => 'font-family',
        ),
        array(
            'element'  => 'h1, h2, h3, h4, h5, h6, body h1 a, body h2 a, body h3 a, body h4 a, body h5 a, body h6 a',
            'property' => 'color',
        ),
        array(
            'element'  => 'h1, h2, h3, h4, h5, h6',
            'property' => 'font-weight',
        ),
    ),
]);

TRT_Kirki::add_field('trt_opt', [
    'settings'  => 'heading_font_h1',
    'label'     => esc_html__('Heading 1', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select all font properties of H1 tag for your site', 'themeplate'),
    'type'      => 'typography',
    'section'   => 'typography-sec',
    'priority'  => 10,
    'default'   => array(
        'font-size'      => '30px',
        'line-height'    => '1.3',
        'text-transform' => 'capitalize',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'body h1',
            'property' => 'font-size',
        ),
        array(
            'element'  => 'body h1',
            'property' => 'line-height',
        ),
        array(
            'element'  => 'body h1',
            'property' => 'text-transform',
        ),
    ),
]);


TRT_Kirki::add_field('trt_opt', [
    'section'   => 'typography-sec',
    'settings'  => 'heading_font_h2',
    'label'     => esc_html__('Heading 2', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select all font properties of H2 tag for your site', 'themeplate'),
    'type'      => 'typography',
    'priority'  => 20,
    'default'   => array(
        'font-size'      => '26px',
        'line-height'    => '1.2',
        'text-transform' => 'capitalize',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'body h2',
            'property' => 'font-size',
        ),
        array(
            'element'  => 'body h2',
            'property' => 'line-height',
        ),
        array(
            'element'  => 'body h2',
            'property' => 'text-transform',
        ),
    ),
]);

TRT_Kirki::add_field('trt_opt', [
    'section'   => 'typography-sec',
    'settings'  => 'heading_font_h3',
    'label'     => esc_html__('Heading 3', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select all font properties of H3 tag for your site', 'themeplate'),
    'type'      => 'typography',
    'priority'  => 30,
    'default'   => array(
        'font-size'      => '24px',
        'line-height'    => '1.2',
        'text-transform' => 'capitalize',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'body h3',
            'property' => 'font-size',
        ),
        array(
            'element'  => 'body h3',
            'property' => 'line-height',
        ),
        array(
            'element'  => 'body h3',
            'property' => 'text-transform',
        ),
    ),
]);

TRT_Kirki::add_field('trt_opt', [
    'section'   => 'typography-sec',
    'settings'  => 'heading_font_h4',
    'label'     => esc_html__('Heading 4', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select all font properties of H4 tag for your site', 'themeplate'),
    'type'      => 'typography',
    'priority'  => 40,
    'default'   => array(
        'font-size'      => '20px',
        'line-height'    => '1.2',
        'text-transform' => 'capitalize',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'body h4',
            'property' => 'font-size',
        ),
        array(
            'element'  => 'body h4',
            'property' => 'line-height',
        ),
        array(
            'element'  => 'body h4',
            'property' => 'text-transform',
        ),
    ),
]);

TRT_Kirki::add_field('trt_opt', [
    'section'   => 'typography-sec',
    'settings'  => 'heading_font_h5',
    'label'     => esc_html__('Heading 5', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select all font properties of H5 tag for your site', 'themeplate'),
    'type'      => 'typography',
    'priority'  => 50,
    'default'   => array(
        'font-size'      => '20px',
        'line-height'    => '1.2',
        'text-transform' => 'capitalize',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'body h5',
            'property' => 'font-size',
        ),
        array(
            'element'  => 'body h5',
            'property' => 'line-height',
        ),
        array(
            'element'  => 'body h5',
            'property' => 'text-transform',
        ),
    ),
]);

TRT_Kirki::add_field('trt_opt', [
    'section'   => 'typography-sec',
    'settings'  => 'heading_font_h6',
    'label'     => esc_html__('Heading 6', 'themeplate'),
    'tooltip'   => esc_html__('Allows you to select all font properties of H6 tag for your site', 'themeplate'),
    'type'      => 'typography',
    'priority'  => 60,
    'default'   => array(
        'font-size'      => '18px',
        'line-height'    => '1.2',
        'text-transform' => 'capitalize',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => 'body h6',
            'property' => 'font-size',
        ),
        array(
            'element'  => 'body h6',
            'property' => 'line-height',
        ),
        array(
            'element'  => 'body h6',
            'property' => 'text-transform',
        ),
    ),
]);