<?php
$auto_play        = $instance['auto_play'] ? $instance['auto_play'] : 'false';
$auto_play_speed  = $instance['auto_play_speed'];
$caption_bg_color = $instance['caption_bg_color'];

$caption_position   = $instance['caption_position'];
$caption_bg_opacity = $instance['caption_bg_opacity'];

$split            = str_split(substr($caption_bg_color, 1), 2);
$r                = hexdec($split[0]);
$g                = hexdec($split[1]);
$b                = hexdec($split[2]);
$a                = '0.' . $caption_bg_opacity;
$caption_bg_color = "rgba(" . $r . ", " . $g . ", " . $b . ", " . $a . ")";
$caption_position = $caption_position != 'center' ? $caption_position . ':100px;' : 'left:50%;margin-left:-200px;';

if ($instance['font_heading'] == 'custom') {
    if ($instance['custom_font_heading']['custom_font_size'] <> '') {
        $css .= 'font-size:' . $instance['custom_font_heading']['custom_font_size'] . 'px;';
    }
    if ($instance['custom_font_heading']['custom_font_weight'] <> '') {
        $css .= 'font-weight:' . $instance['custom_font_heading']['custom_font_weight'] . ';';
    }
    if ($instance['custom_font_heading']['custom_font_style'] <> '') {
        $css .= 'font-style:' . $instance['custom_font_heading']['custom_font_style'] . ';';
    }
    if ($instance['custom_font_heading']['title_text_color'] <> '') {
        $css .= 'color:' . $instance['custom_font_heading']['title_text_color'] . ';';
    }
}

if ($css) {
    $css = ' style="' . $css . '"';
}

if ($instance['font_heading'] == 'custom') {
    if ($instance['custom_details_font_heading']['custom_font_size'] <> '') {
        $dcss .= 'font-size:' . $instance['custom_details_font_heading']['custom_font_size'] . 'px;';
    }
    if ($instance['custom_details_font_heading']['custom_font_weight'] <> '') {
        $dcss .= 'font-weight:' . $instance['custom_details_font_heading']['custom_font_weight'] . ';';
    }
    if ($instance['custom_details_font_heading']['custom_font_style'] <> '') {
        $dcss .= 'font-style:' . $instance['custom_details_font_heading']['custom_font_style'] . ';';
    }
    if ($instance['custom_details_font_heading']['title_text_color'] <> '') {
        $dcss .= 'color:' . $instance['custom_details_font_heading']['title_text_color'] . ';';
    }
}

if ($dcss) {
    $dcss = ' style="' . $dcss . '"';
}


echo '<div class="owl-slider-area">';
echo '<div id="owl-slider-area45" class="owl-carousel">';
if ($instance['sliders']) {
    foreach ($instance['sliders'] as $sliders) {
        $src = wp_get_attachment_image_src($sliders['image'], 'full');
        echo '<div class="owl-slide" style="background-image:url(' . $src['0'] . '); background-size: cover;height: 400px;">';
        echo '<div class="owl--text" style="' . $caption_position . 'background-color:' . $caption_bg_color, ';' . '">';
        ?>
        <h3 <?php echo $css; ?> class="item-entry-title">
            <a style="<?php echo 'color:' . $instance['custom_font_heading']['title_text_color']; ?>" href="<?php echo $sliders['link']; ?>"><?php echo $sliders['title'] ?></a>
        </h3>
        <p <?php echo $dcss; ?>><?php echo wp_trim_words($sliders['description'],'20','---');  ?></p>
        <a href="<?php echo $sliders['link']; ?>" class="btn btn-primary"
           style="<?php echo 'background-color:' . $sliders['button_bg_color'] . ';' . 'border-color:' . $sliders['button_bg_color']; ?>"><?php echo $sliders['button_text']; ?></a>
        <?php
        echo '</div>';
        echo '</div>';
    }
}
echo '</div>';

echo '<div class="owl-theme">';
echo '<div class="owl-controls">';
echo '<div class="slider-custom-nav owl-nav"></div>';
echo '</div>';
echo '</div>';
echo '</div>';
?>

<script type="text/javascript">
    (function ($) {
        "use strict";
        $(document).ready(function () {
            $('#owl-slider-area45').owlCarousel({
                items: 1,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '.owl-slider-area .slider-custom-nav',
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                pagination: false,
                rewindSpeed: 500
            });

        });
    })(jQuery);
</script>
