<?php
TRT_Kirki::add_section('typography-sec', array(
    'title'      => __('Typography'),
    'panel'      => 'general',
    'priority'   => 160,
    'capability' => 'edit_theme_options',
));


TRT_Kirki::add_field('trt_opt', [
    'type'      => 'typography',
    'settings'  => 'body_typography',
    'label'     => esc_html__('Body Font', 'themeplate'),
    'section'   => 'typography-sec',
    'default'   => array(
        'font-family' => 'Roboto',
        'variant'     => '300',
        'font-size'   => '15px',
        'line-height' => '1.6',
        'color'       => '#5a5a5a'
    ),
    'priority'  => 1,
    'transport' => 'auto',
    'output'   => array(
        array(
            'choice'   => 'font-family',
            'element'  => 'body',
            'property' => 'font-family',
        ),
        array(
            'choice'   => 'variant',
            'element'  => 'body',
            'property' => 'font-weight',
        ),
        array(
            'choice'   => 'font-size',
            'element'  => 'body',
            'property' => 'font-size',
        ),
        array(
            'choice'   => 'line-height',
            'element'  => 'body',
            'property' => 'line-height',
        ),
        array(
            'choice'   => 'color',
            'element'  => 'body',
            'property' => 'color',
        )
    )
]);