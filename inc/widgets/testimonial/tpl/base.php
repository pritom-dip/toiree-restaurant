<?php

$auto_play       = $instance['auto_play'] ? $instance['auto_play'] : 'false';
$auto_play_speed = $instance['auto_play_speed'];


echo '<div class="trt-testimonial-sec">';

echo '<h2 class="section-title text-center">' . $instance['sect_title'] . '</h2>';

echo '<ul class="owl-carousel owl-theme">';
if ($instance['testimonials']) {
    foreach ($instance['testimonials'] as $testimonial) {
        echo '<li class="style1-item">';
        echo '<div class="testimonial-item text-center">';
        echo '<p class="details">' . $testimonial['article'] . '</p>';

        echo '<div class="infor-client">';
        $src = wp_get_attachment_image_src($testimonial['image'], 'thumbnail');
        echo '<div class="icon-client"><img width="80" height="80" class="img-circle" src="' . $src['0'] . '" alt="' . get_the_title() . '"></div>';

        echo ' <span class="client-name"><a href="#">' . $testimonial['name'] . '</a></span>';

        echo '</div>';
        echo '</div>';

        echo '</li>';
    }
}
echo '</ul>';

echo '<div class="owl-theme">';
echo '<div class="owl-controls">';
echo '<div class="custom-nav owl-nav"></div>';
echo '</div>';
echo '</div>';

echo '</div>';
?>

<script type="text/javascript">
    (function ($) {
        "use strict";
        $(document).ready(function () {
            $('.trt-testimonial-sec ul').owlCarousel({
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '.trt-testimonial-sec .custom-nav',
                dots: true,
                loop: true,
                items: 1,
                dotsSpeed: 600,
                smartSpeed: 600,
                autoplay: <?php echo esc_js($auto_play); ?>,
                autoplaySpeed: <?php echo esc_js($auto_play_speed); ?>,
                autoplayHoverPause: true,
                margin: 10,

            });

        });
    })(jQuery);
</script>





