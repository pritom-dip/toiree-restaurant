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

?>
<?php if ($instance['sliders']) { ?>

    <div id="trt-bootstrap-slider" class="carousel slide custom-bootstrap-slider">

        <ol class="carousel-indicators">
            <?php
            $li = 0;
            foreach ($instance['sliders'] as $sliders) { ?>
                <li data-target="#trt-bootstrap-slider"
                    data-slide-to="<?php echo $li; ?>" <?php echo $li == 0 ? 'class="active"' : ''; ?>></li>
                <?php
                $li++;
            } ?>
        </ol>

        <div class="carousel-inner">
            <?php
            $item = 0;
            foreach ($instance['sliders'] as $sliders) {
                $src = wp_get_attachment_image_src($sliders['image'], 'full');
                ?>
                <div class="item <?php echo $item == 0 ? 'active' : '' ?>">
                    <div class="fill"
                         style="background-image:url('<?php echo $src['0'] ?>'); height: 650px;">
                    </div>
                    <div class="carousel-caption">
                        <h5 class="middle-title animated fadeInUp"> <?php echo wp_trim_words($sliders['subtitle'], 2, ''); ?> </h5>
                        <h2 class="big-title animated fadeInDown"><?php echo wp_trim_words($sliders['title'], 2, ''); ?></h2>
                        <p class="small-title animated fadeInUp"><?php echo wp_trim_words($sliders['description'], '10', '---'); ?></p>
                        <p class="animated fadeInUp">
                            <a href="<?php echo $sliders['link']; ?>"
                               class="btn btn-transparent btn-rounded btn-large"><?php echo $sliders['button_text']; ?></a>
                        </p>
                    </div>
                </div>
                <?php $item++;
            } ?>
        </div>
        <a class="left trt-slider-controls" href="#trt-bootstrap-slider" data-slide="prev"></a>
        <a class="right trt-slider-controls" href="#trt-bootstrap-slider" data-slide="next"></a>
    </div>

<?php } ?>