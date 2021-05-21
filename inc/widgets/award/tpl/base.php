<?php
$instance['title'];
$html = '';
if (!empty($instance['bg_image'])) {
    $bg_image = wp_get_attachment_image_src($instance['bg_image'], 'full');
} else {
    $bg_image[0] = get_template_directory_uri() . '/assets/images/award-banner.jpg';
}
$html .= '<div id="award-area" class="award-area" style="background-image:url(' . $bg_image['0'] . '); background-size: cover;background-repeat: no-repeat;">';
$html .= '<div class="brand-container"><div class="brands-block"><div class="border">';

$html .= '<h3 class="sec-title">' . $instance['title'] . '</h3>';
$html .= '<ul>';
if ($instance['awards']) {
    foreach ($instance['awards'] as $award) {
        $src  = wp_get_attachment_image_src($award['image'], 'full');
        $html .= ' <li><a href="#">';
        $html .= '<img src="' . $src[0] . '" alt/>';
        $html .= '</a></li>';
    }
}
$html .= '</ul>';
$html .= '</div>';
$html .= '</div></div></div>';
echo $html;



