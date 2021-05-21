<?php
$title            = $link_face = $link_twitter = $link_google = $link_dribble = $link_pinterest = $link_youtube = $link_digg = $link_linkedin = '';
$title            = $instance['title'];
$link_twitter     = $instance['link_twitter'];
$link_face        = $instance['link_face'];
$link_instagram   = $instance['link_instagram'];
$link_tripadvisor = $instance['link_tripadvisor'];
$link_pinterest   = $instance['link_pinterest'];
$link_youtube     = $instance['link_youtube'];
$link_yelp        = $instance['link_yelp'];
$link_foursquare  = $instance['link_foursquare'];


?>
<div class="thim-social version-old">
    <?php
    if ($title) {
        echo ent2ncr($before_title . esc_attr($title) . $after_title);
    }
    ?>
    <ul class="social_link">
        <?php
        if ($link_twitter != '') {
            echo '<li><a class="twitter hasTooltip" href="' . esc_attr($link_twitter) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-twitter"></i></a></li>';
        }
        if ($link_face != '') {
            echo '<li><a class="face hasTooltip" href="' . esc_attr($link_face) . '" target="' . $instance['link_target'] . '"><i class="fa fa-facebook"></i></a></li>';
        }
        if ($link_instagram != '') {
            echo '<li><a class="instagram hasTooltip" href="' . esc_attr($link_instagram) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-instagram"></i></a></li>';
        }
        if ($link_tripadvisor != '') {
            echo '<li><a class="tripadvisor hasTooltip" href="' . esc_attr($link_tripadvisor) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-tripadvisor"></i></a></li>';
        }
        if ($link_pinterest != '') {
            echo '<li><a class="pinterest hasTooltip" href="' . esc_attr($link_pinterest) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-pinterest"></i></a></li>';
        }
        if ($link_youtube != '') {
            echo '<li><a class="youtube hasTooltip" href="' . esc_attr($link_youtube) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-youtube"></i></a></li>';
        }

        if ($link_yelp != '') {
            echo '<li><a class="yelp hasTooltip" href="' . esc_attr($link_yelp) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-yelp"></i></a></li>';
        }
        if ($link_foursquare != '') {
            echo '<li><a class="foursquare hasTooltip" href="' . esc_attr($link_foursquare) . '" target="' . $instance['link_target'] . '" ><i class="fa fa-foursquare"></i></a></li>';
        }

        ?>
    </ul>
</div>