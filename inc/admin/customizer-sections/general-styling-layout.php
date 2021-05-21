<?php
TRT_Kirki::add_section('styling_layout', array(
    'title'      => esc_html__('Layout', 'themeplate'),
    'panel'      => 'general',
    'priority'   => 160,
    'capability' => 'edit_theme_options',
));

TRT_Kirki::add_field('trt_opt', [
    'type'     => 'select',
    'settings' => 'box_layout',
    'label'    => esc_html__('Select A Layout Your Site', 'themeplate'),
    'tooltip'  => esc_html__('Select a layout your site you want.', 'themeplate'),
    'section'  => 'styling_layout',
    'default'  => 'Wide',
    'priority' => 10,
    'multiple' => 1,
    'choices'  => [
        'wide' => esc_html__('Wide', 'themplate'),
        'boxed' => esc_html__('Boxed', 'themplate'),
    ],
]);