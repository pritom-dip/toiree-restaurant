<?php
$number_show     = $instance['number_show'] ? $instance['number_show'] : 1;
$auto_play       = $instance['auto_play'] ? $instance['auto_play'] : 'false';
$auto_play_speed = $instance['auto_play_speed'];
$surplus         = count($instance['carousels']);

echo '<div class="thim_carousels_slider_style2">';

echo '<div class="owl-carousel owl-theme owl_ss2">';
if ($instance['carousels']) {
	foreach ($instance['carousels'] as $carousels) {
		echo '<div class="style2-item">';

		$src = wp_get_attachment_image_src($carousels['image'], 'large');
		echo '<div class="side left-side"><a href="' . $carousels['link'] . '"><img src="' . $src['0'] . '" alt="' . get_the_title() . '"></a></div>';
		echo '<div class="side right-side">';
		echo '<div class="style2-title-sec">
             <h4>' . $carousels['small_title'] . '</h4>
             <h2><a href="' . $carousels['link'] . '">' . $carousels['big_title'] . '</a></h2>
             </div>';
		echo '<div class="carousel_price" style="font-size: 18px">';
		echo '<span class="price">';
		echo $carousels['price'];
		echo '</span>';
		echo '<span class="unit" >';
		echo " " . $carousels['price_type'];
		echo '</span>';
		echo '</div>';

		echo '<div class="carousel_content" style="margin-top: 40px">';
		echo '<span class="carousel_infosale" style="font-size: 36px;">';
		echo $carousels['info_sale'];
		echo '</span>';
		echo '<h4 class="carousel_name">';
		echo '<a style="font-size:18px" href="' . $carousels['link'] . '" target="_self">';
		echo $carousels['name'];
		echo '</a>';
		echo '</h4>';
		echo '</div></div>';
		echo '</div>';
	}
}
echo '</div>';
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
            var thimpress_carousel_carousel = $('.thim_carousels_slider_style2 .owl_ss2');
            thimpress_carousel_carousel.owlCarousel({
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '.thim_carousels_slider_style2 .custom-nav',
                dots: true,
                loop: true,
                items: 1,
                dotsSpeed: 600,
                smartSpeed: 600,
                autoplay: <?php echo esc_js($auto_play); ?>,
                autoplaySpeed: <?php echo esc_js($auto_play_speed); ?>,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1400: {
                        items: 1
                    }
                }
            });
        });
    })(jQuery);
</script>
