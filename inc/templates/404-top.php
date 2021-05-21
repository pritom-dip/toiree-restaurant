<?php
$bg_color = $cate_top_image_src = '';
if (get_theme_mod('404_heading_bg_color') <> '') {
    $bg_color = get_theme_mod('404_heading_bg_color');
}

if (get_theme_mod('404_top_image') <> '') {
    $cate_top_image     = get_theme_mod('404_top_image');
    $cate_top_image_src = $cate_top_image;
}
$bg_color    = ($bg_color == '#') ? '' : $bg_color;
$c_css_style = '';
$c_css_style .= ($bg_color != '') ? 'background-color: ' . $bg_color . ';' : '';
$c_css       = ($c_css_style != '') ? 'style="' . $c_css_style . '"' : '';
$top_images  = ($cate_top_image_src != '') ? '<img src="' . $cate_top_image_src . '" /><span class="overlay-top-header" ' . $c_css . '></span>' : '';

if (get_theme_mod('header_position') == true) {
    ?>
    <div class="top_site_main<?php if ($top_images == '') {
        echo ' top-site-no-image-custom';
    } ?>" <?php echo ent2ncr($c_css); ?>>
        <?php echo ent2ncr($top_images); ?>
    </div>
<?php } ?>