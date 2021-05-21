<?php
$facebook_page_link  = get_theme_mod('facebook_page_link');
$twitter_page_link   = get_theme_mod('twitter_page_link');
$pinterest_page_link = get_theme_mod('pinterest_page_link');
$instagram_page_link = get_theme_mod('instagram_page_link');
$weibo_page_link = get_theme_mod('weibo_page_link');
$wechat_page_link = get_theme_mod('wechat_page_link');


echo '<div class="social-page-link-area">';
if (!empty($facebook_page_link))
    echo '<a href="' . $facebook_page_link . '" target="_blank"><span><i class="fa fa-facebook"></i></span></a>';

if (!empty($twitter_page_link))
    echo '<a href="' . $twitter_page_link . '" target="_blank"><span><i class="fa fa-twitter"></i></span></a>';

if (!empty($pinterest_page_link))
    echo '<a href="' . $pinterest_page_link . '" target="_blank"><span><i class="fa fa-pinterest"></i></span></a>';

if (!empty($instagram_page_link))
	echo '<a href="' . $instagram_page_link . '" target="_blank"><span><i class="fa fa-instagram"></i></span></a>';
if (!empty($weibo_page_link))
	echo '<a href="' . $weibo_page_link . '" target="_blank"><span><i class="fa fa-weibo"></i></span></a>';

if (!empty($wechat_page_link))
	echo '<a href="' . $wechat_page_link . '" target="_blank"><span><i class="fa fa-weixin"></i></span></a>';


echo '</div>';

?>
