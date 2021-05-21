<?php
TRT_Kirki::add_section('social_page_link',
    array(
        'title'    => esc_html__('Social Page Link', 'themeplate'),
        'panel'    => 'general',
        'priority' => 11,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'facebook_page_link',
        'type'     => 'link',
        'section'  => 'social_page_link',
        'label'    => esc_html__('Facebook Page Link', 'themeplate'),
        'default'  => 'https://link.com',
        'tooltip'  => esc_html__('Facebook Page Link', 'themeplate'),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'twitter_page_link',
        'type'     => 'link',
        'section'  => 'social_page_link',
        'label'    => esc_html__('Twitter Page Link', 'themeplate'),
        'default'  => 'https://link.com',
        'tooltip'  => esc_html__('Twitter page link', 'themeplate'),
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'pinterest_page_link',
        'type'     => 'link',
        'section'  => 'social_page_link',
        'label'    => esc_html__('Pinterest page Link ', 'themeplate'),
        'default'  => 'https://link.com',
        'tooltip'  => esc_html__('Pinterest page link', 'themeplate'),
    )
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'instagram_page_link',
		'type'     => 'link',
		'section'  => 'social_page_link',
		'label'    => esc_html__('Instagram page Link ', 'themeplate'),
		'default'  => 'https://link.com',
		'tooltip'  => esc_html__('Instagram page link', 'themeplate'),
	)
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'weibo_page_link',
		'type'     => 'link',
		'section'  => 'social_page_link',
		'label'    => esc_html__('Weibo page Link ', 'themeplate'),
		'default'  => 'https://link.com',
		'tooltip'  => esc_html__('Weibo page link', 'themeplate'),
	)
);


TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'wechat_page_link',
		'type'     => 'link',
		'section'  => 'social_page_link',
		'label'    => esc_html__('Wechat  ID', 'themeplate'),
		'default'  => 'https://link.com',
		'tooltip'  => esc_html__('Wechat ID', 'themeplate'),
	)
);

