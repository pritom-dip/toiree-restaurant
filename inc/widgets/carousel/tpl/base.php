<?php
$number_show     = $instance['number_show'];
$auto_play       = $instance['auto_play'] ? $instance['auto_play'] : 'false';
$auto_play_speed = $instance['auto_play_speed'];
$surplus         = count($instance['carousels']);

echo '<div class="thim_carousels_slider">';

echo '<ul class="owl-carousel owl-theme">';
if ($instance['carousels']) {
    foreach ($instance['carousels'] as $carousels) {
        echo '<li class="style1-item">';

        $src = wp_get_attachment_image_src($carousels['image'], 'full');
        echo '<img src="' . $src['0'] . '" alt="' . get_the_title() . '">';

        echo '<div class="style1-title-sec" style="margin-top: 20px"><h4>' . $carousels['small_title'] . '</h4><h3 style="margin: 0 0 5px"><a href="' . $carousels['link'] . '">' . $carousels['big_title'] . '</a></h3></div>';
        echo '<div class="carousel_price" style="margin:0;font-size:18px">';
        echo '<span class="price">';
        echo $carousels['price'];
        echo '</span>';
        echo '<span class="unit">';
		echo ' '.$carousels['price_type'];
        echo '</span>';
        echo '</div>';

        echo '<div class="carousel_content" style="margin-top: 20px">';
        echo '<span class="carousel_infosale" style="font-size: 36px;">';
        echo $carousels['info_sale'];
        echo '</span>';
        echo '<h5 class="carousel_name">';
        echo '<a style="font-size:18px" href="' . $carousels['link'] . '" target="_self">';
        echo $carousels['name'];
        echo '</a>';
        echo '</h5>';
        echo '</div>';

        echo '</li>';
    }
}
echo '</ul>';
if ($surplus > $number_show) {
    echo '<div class="owl-theme">';
    echo '<div class="owl-controls">';
    echo '<div class="custom-nav owl-nav"></div>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';
?>

<script type="text/javascript">
    (function ($) {
        "use strict";
        $(document).ready(function () {
            var thimpress_carousel_carousel = $('.thim_carousels_slider ul');
            thimpress_carousel_carousel.owlCarousel({
                nav: true,
                stagePadding: 50,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '.thim_carousels_slider .custom-nav',
                dots: true,
                loop: true,
                items: <?php echo esc_js($number_show); ?>,
                dotsSpeed: 600,
                smartSpeed: 600,
                autoplay: <?php echo esc_js($auto_play); ?>,
                autoplaySpeed: <?php echo esc_js($auto_play_speed); ?>,
                autoplayHoverPause: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1400: {
                        items:<?php echo esc_js($number_show); ?>
                    }
                }
            });
            // next
            $('.thim_carousels_slider .navigation .next').click(function () {
                thimpress_carousel_carousel.trigger('next.owl.carousel');
            });
            // prev
            $('.thim_carousels_slider .navigation .prev').click(function () {
                thimpress_carousel_carousel.trigger('prev.owl.carousel');
            });
        });
    })(jQuery);
</script>
