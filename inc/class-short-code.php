<?php

/**
 * Class ShortCode
 */
class TRT_shortCode
{

    /**
     * ShortCode constructor.
     */
    public function __construct()
    {
        add_shortcode('trt_social_page_link', array($this, 'render_trt_social_page_link'));
        add_shortcode('tr_gallery', array($this, 'render_tr_gallery'));
    }


    /**
     * it's Social page link short-code
     * [trt_social_page_link]
     */
    public function render_trt_social_page_link($atts)
    {
        /*$cat_atts = shortcode_atts(array(
            'title' => '',
            'tag_slug' => '',
            'limit' => 5,
            'layout' => 'grid',
            'type' => 'post',
            'pagination' => 'on'
        ), $atts, 'gigglemagazine');
        extract($cat_atts);*/

        ob_start();
        require get_template_directory() . "/page-templates/element-templates/social-link-button.php";
        $html = ob_get_contents();
        ob_get_clean();
        return $html;

    }

    public function render_tr_gallery( $atts ) {

        if( $atts['id'] == '' ){
            return;
        }
        
        $gallery_atts = shortcode_atts(array(
            'name'  => '',
            'id'    => '',
        ), $atts, 'themeplate');

        extract( $gallery_atts );

        ob_start();
        require get_template_directory() . "/page-templates/gallery-templates/gallery-data.php";
        $html = ob_get_contents();
        ob_get_clean();
        return $html;

    }

}
