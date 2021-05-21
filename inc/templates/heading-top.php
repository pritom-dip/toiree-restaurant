<?php
global $wp_query;
/***********custom Top Images*************/
$text_color = $custom_title = $subtitle = $bg_color = $bg_header = $class_full = $text_color_header =
$bg_image = $thim_custom_heading = $cate_top_image_src = $front_title = '';
$text_color = $bg_color = $cate_top_image_src = '';

$hide_breadcrumbs = $hide_title = 0;
// color theme options
$cat_obj = $wp_query->get_queried_object();

if (isset($cat_obj->term_id)) {
	$cat_ID = $cat_obj->term_id;
} else {
	$cat_ID = "";
}

if (get_post_type() == "product") {
	$prefix = 'thim_woo';
} else {
	if (get_post_type() == "hb_room") {
		$prefix = 'thim_hb';
	} else {
		if (is_front_page() || is_home()) {
			$prefix = 'thim_';
		} else {
			$prefix = 'thim_archive';
		}
	}


}

// single and archive
if (is_page() || is_single()) {
	$prefix_inner = '_single_';
} else {
	if (is_front_page() || is_home()) {
		$prefix_inner = 'front_page_';
	} else {
		$prefix_inner = '_cate_';
	}
}
// get data for theme customizer
if (get_theme_mod($prefix . $prefix_inner . 'custom_title') <> '') {
	$front_title = get_theme_mod($prefix . $prefix_inner . 'custom_title');
}

if (get_theme_mod($prefix . $prefix_inner . 'heading_text_color') <> '') {
	$text_color = get_theme_mod($prefix . $prefix_inner . 'heading_text_color');
}

if (get_theme_mod($prefix . $prefix_inner . 'heading_bg_color') <> '') {
	$bg_color = get_theme_mod($prefix . $prefix_inner . 'heading_bg_color');
}

if (get_theme_mod($prefix . $prefix_inner . 'sub_title') <> '') {
	$subtitle = get_theme_mod($prefix . $prefix_inner . 'sub_title');
}

if (get_theme_mod($prefix . $prefix_inner . 'title') <> '') {
	$custom_title = get_theme_mod($prefix . $prefix_inner . 'title');
}

if (get_theme_mod($prefix . $prefix_inner . 'top_image') <> '') {
	$cate_top_image = get_theme_mod($prefix . $prefix_inner . 'top_image');
	$cate_top_image_src = $cate_top_image;
}

if (get_theme_mod($prefix . $prefix_inner . 'hide_title') == 1) {
	$hide_title = get_theme_mod($prefix . $prefix_inner . 'hide_title');
}

// Get style blog && shop from metabox
if (is_front_page() || is_home()) {

	if (is_front_page() || is_home()) {
		$postid = get_option('page_for_posts');
	} elseif (is_post_type_archive('product')) {
		$postid = get_option('woocommerce_shop_page_id');
	}

	$using_custom_heading = get_post_meta($postid, 'thim_mtb_using_custom_heading', true);

	if ($using_custom_heading) {

		if (get_post_meta($postid, 'thim_mtb_hide_title_and_subtitle', true)) {
			$hide_title = get_post_meta($postid, 'thim_mtb_hide_title_and_subtitle', true);
		}
		if (get_post_meta($postid, 'thim_mtb_hide_breadcrumbs', true)) {
			$hide_breadcrumb = get_post_meta($postid, 'thim_mtb_hide_breadcrumbs', true);
		}
		if (get_post_meta($postid, 'thim_mtb_custom_title', true)) {
			$custom_title = get_post_meta($postid, 'thim_mtb_custom_title', true);
		}
		if (get_post_meta($postid, 'thim_subtitle', true)) {
			$subtitle = get_post_meta($postid, 'thim_subtitle', true);
		}
		if (get_post_meta($postid, 'thim_mtb_text_color', true)) {
			$text_color_1 = get_post_meta($postid, 'thim_mtb_text_color', true);
			if ($text_color_1 <> '') {
				$text_color = $text_color_1;
			}
		}
		if (get_post_meta($postid, 'thim_mtb_color_sub_title', true)) {
			$sub_color_1 = get_post_meta($postid, 'thim_mtb_color_sub_title', true);
			if ($sub_color_1 <> '') {
				$sub_color = $sub_color_1;
			}
		}
		$bg_color_1 = '';
		if (get_post_meta($postid, 'thim_mtb_bg_color', true)) {
			$bg_color_1 = get_post_meta($postid, 'thim_mtb_bg_color', true);
		}
		if ($bg_color_1 <> '') {
			$bg_color = $bg_color_1;
		}
		if (get_post_meta($postid, 'thim_mtb_top_image', true)) {
			$thim_heading_top_img = get_post_meta($postid, 'thim_mtb_top_image', true);
			$thim_heading_top_src = $thim_heading_top_img;

			if (is_numeric($thim_heading_top_src)) {
				$thim_heading_top_attachment = wp_get_attachment_image_src($thim_heading_top_img, 'full');
				$cate_top_image_src = $thim_heading_top_attachment[0];
			}
		}
	}
}

// Get style from metabox
if (is_page() || is_single()) {
	$postid = get_the_ID();
	$using_custom_heading = get_post_meta($postid, 'thim_mtb_using_custom_heading', true);

	if ($using_custom_heading) {

		if (get_post_meta($postid, 'thim_mtb_hide_title_and_subtitle', true)) {
			$hide_title = get_post_meta($postid, 'thim_mtb_hide_title_and_subtitle', true);
		}
		if (get_post_meta($postid, 'thim_mtb_hide_breadcrumbs', true)) {
			$hide_breadcrumb = get_post_meta($postid, 'thim_mtb_hide_breadcrumbs', true);
		}
		if (get_post_meta($postid, 'thim_mtb_custom_title', true)) {
			$custom_title = get_post_meta($postid, 'thim_mtb_custom_title', true);
		}
		if (get_post_meta($postid, 'thim_subtitle', true)) {
			$subtitle = get_post_meta($postid, 'thim_subtitle', true);
		}
		if (get_post_meta($postid, 'thim_mtb_text_color', true)) {
			$text_color_1 = get_post_meta($postid, 'thim_mtb_text_color', true);
			if ($text_color_1 <> '') {
				$text_color = $text_color_1;
			}
		}
		if (get_post_meta($postid, 'thim_mtb_color_sub_title', true)) {
			$sub_color_1 = get_post_meta($postid, 'thim_mtb_color_sub_title', true);
			if ($sub_color_1 <> '') {
				$sub_color = $sub_color_1;
			}
		}
		$bg_color_1 = '';
		if (get_post_meta($postid, 'thim_mtb_bg_color', true)) {
			$bg_color_1 = get_post_meta($postid, 'thim_mtb_bg_color', true);
		}
		if ($bg_color_1 <> '') {
			$bg_color = $bg_color_1;
		}
		if (get_post_meta($postid, 'thim_mtb_top_image', true)) {
			$thim_heading_top_img = get_post_meta($postid, 'thim_mtb_top_image', true);
			$thim_heading_top_src = $thim_heading_top_img;

			if (is_numeric($thim_heading_top_src)) {
				$thim_heading_top_attachment = wp_get_attachment_image_src($thim_heading_top_img, 'full');
				$cate_top_image_src = $thim_heading_top_attachment[0];
			}
		}
	}
}

//custom in category and room type
$thim_custom_heading = get_term_meta($cat_ID, 'thim_custom_heading', true);
if ($thim_custom_heading == 'custom' || $thim_custom_heading == 'on') {
	$queried_object = get_queried_object();
	if ($queried_object->taxonomy == "hb_room_type") {
		$top_image = get_term_meta($cat_ID, 'thim_hb_room_top_image', true);
	} elseif ($queried_object->taxonomy == 'product_cat') {
		$top_image = get_term_meta($cat_ID, 'thim_woo_top_image', true);
	}

	if (!empty($top_image)) {
		$cate_top_image_src = $top_image['url'];
		//var_dump($cate_top_image_src);
	}
}

$cate_top_image_src = thim_ssl_secure_url($cate_top_image_src);
$hide_title = ($hide_title == 1) ? true : false;

// css
$c_css_style = $css_line = '';
$c_css_style .= ($text_color != '') ? 'color: ' . $text_color . ';' : '';
$c_css_style .= ($bg_color != '') ? 'background-color: ' . $bg_color . ';' : '';
$c_css_style .= ($cate_top_image_src != '') ? 'background-image: url(' . $cate_top_image_src . ');' : '';
$c_css_style .= 'background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;';
$css_line .= ($text_color != '') ? 'background-color: ' . $text_color . ';' : '';
//css background and color
$c_css = ($c_css_style != '') ? 'style="' . $c_css_style . '"' : '';
// css inline line
$c_css_line = ($css_line != '') ? 'style="' . $css_line . '"' : '';
$top_images = ($cate_top_image_src != '') ? '<img alt="" src="' . $cate_top_image_src . '" /><span class="overlay-top-header" ' . $c_css . '></span>' : '';
// show title and category
//Custom title for page hotel-booking
$hb_custom_title = (get_theme_mod('thim_hb_cate_custom_title') == true) ? get_theme_mod('thim_hb_cate_custom_title') : esc_html__('Hotel Booking', 'themeplate');
//Custom title for single room page hotel-booking
$hb_single_custom_title = (get_theme_mod('thim_hb_single_custom_title') == true) ? get_theme_mod('thim_hb_single_custom_title') : esc_html__('Single Room Title', 'themeplate');
?>




<?php if ($hide_title == true && (get_theme_mod('header_position') == true)) { ?>
	<div <?php if (get_theme_mod('thim_top_section_hide') == true) {echo 'style="display:none"';}?> class="top_site_main
    <?php if ($top_images == '') {
		echo ' top-site-no-image-custom';
	} else {
		echo ' images_parallax';
	} ?>" <?php echo ent2ncr($c_css); ?> style="" data-parallax_images="scroll"
		 data-image-src="<?php echo esc_url($cate_top_image_src); ?>">
	</div>
<?php } else { ?>
	<div <?php if (get_theme_mod('thim_top_section_hide') == true) {echo 'style="display:none"';}?> class="top_site_main<?php if ($top_images == '') {
		echo ' top-site-no-image';
	} else {
		echo ' images_parallax';
	} ?>" <?php echo ent2ncr($c_css); ?> style="" data-parallax_images="scroll"
		 data-image-src="<?php echo esc_url($cate_top_image_src); ?>">
		<?php if ($hide_title == false) { ?>
			<div class="page-title-wrapper">
				<div class="banner-wrapper container article_heading">

					<?php
					if (is_single()) {
						$typography = 'h2';
					} else {
						$typography = 'h1';
					}
					if ((is_page() || is_single()) && get_post_type() != 'product' && get_post_type() != 'hb_room') {
						if (is_single()) {
							if (get_post_type() == "portfolio") {
								echo '<' . $typography . ' class="heading__secondary">' . esc_html__('Portfolio', 'themeplate') . '</' . $typography . '>';
							} else {
								$category = get_the_category();
								if (isset($category[0])) {
									$category_id = get_cat_ID($category[0]->cat_name);
									echo ' <' . $typography . ' class="heading__secondary">';
									if (get_theme_mod('thim_archive_single_hide_title') == false) {
										echo ($custom_title != '') ? $custom_title : get_the_title(get_the_ID());
									}
									echo '</' . $typography . '>';
									echo ($subtitle != '') ? '<div class="banner-description"><p class="heading__primary ">' . $subtitle . '</p></div>' : '';
								}
							}
						} else {
							if (false == get_theme_mod('top_header_banner_info')) {
								echo '<' . $typography . ' class="heading__secondary">';
								echo ($custom_title != '') ? $custom_title : get_the_title(get_the_ID());
								echo '</' . $typography . '>';
								echo ($subtitle != '') ? '<div class="banner-description"><p class="heading__primary ">' . $subtitle . '</p></div>' : '';
							} else {
								 ?>
								<div class="header-banner-columns">

									<div class="icon_box">
										<a href="#eatarea">
											<div class="image_wrapper">
												<img
													src="<?php bloginfo('template_directory'); ?>/assets/images/eat.png"
													class="scale-with-grid" alt="" width="" height="">
											</div>
											<div class="desc_wrapper">
												<h4><?php echo __('Eat', 'themeplate'); ?></h4>
											</div>
										</a>
									</div>

									<div class="icon_box">
										<a href="#drinkarea">
											<div class="image_wrapper">
												<img
													src="<?php bloginfo('template_directory'); ?>/assets/images/drink.png"
													class="scale-with-grid" alt="" width="" height="">
											</div>
											<div class="desc_wrapper">
												<h4><?php echo __('Drink', 'themeplate'); ?></h4>
											</div>
										</a>
									</div>

									<div class="icon_box">
										<a href="#meetarea">
											<div class="image_wrapper">
												<img
													src="<?php bloginfo('template_directory'); ?>/assets/images/meet.png"
													class="scale-with-grid" alt="" width="" height="">
											</div>
											<div class="desc_wrapper">
												<h4><?php echo __('Meet', 'themeplate'); ?></h4>
											</div>
										</a>
									</div>
								</div>
							<?php
							}

						}
					} elseif (get_post_type() == 'product') {
						echo '<' . $typography . ' class="heading__secondary">';
						echo ($custom_title != '') ? $custom_title : woocommerce_page_title();
						echo '</' . $typography . '>';
						echo ($subtitle != '') ? '<div class="banner-description"><p class="heading__primary ">' . $subtitle . '</p></div>' : '';
					} elseif (get_post_type() == 'hb_room') {
						echo '<' . $typography . ' class="heading__secondary">';
						if (!is_post_type_archive('hb_room')) {
							echo get_queried_object()->name;
						} else {
							if ($custom_title) {
								echo $custom_title;
							} else {
								echo esc_attr($hb_custom_title);
							}
						}
						if (is_single()) {
							if ($custom_title) {
								echo $custom_title;
							} else {
								echo esc_attr($hb_single_custom_title);
							}
						}
						echo '</' . $typography . '>';
						echo ($subtitle != '') ? '<div class="banner-description"><p class="heading__primary ">' . $subtitle . '</p></div>' : '';
					} elseif (is_front_page() || is_home()) {
						echo '<' . $typography . ' class="heading__secondary">';
						echo ($front_title != '') ? $front_title : esc_html__('Blog', 'themeplate');
						echo '</' . $typography . '>';
						echo ($subtitle != '') ? '<div class="banner-description"><p class="heading__primary ">' . $subtitle . '</p></div>' : '';
					} else {
						echo '<' . $typography . ' class="heading__secondary">';
						thim_the_archive_title();
						echo '</' . $typography . '>';
						echo ($subtitle != '') ? '<div class="banner-description"><p class="heading__primary ">' . $subtitle . '</p></div>' : '';
					}
					?>
				</div>
			</div>
		<?php } ?>
	</div>

<?php } ?>
