<div class="menu-design-5">

	<style>
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
			background: #eee;
		}

		.menu5-title {
			display: -webkit-box;
			display: flex;
			-webkit-box-align: center;
			align-items: center;
		}

		.menu5-title::before,
		.menu5-title::after {
			content: "";
			-webkit-box-flex: 1;
			flex: 1;
			box-shadow: 0 -0.5px 0 <?php $instance['heading_color']; ?>, 0 0.5px 0<?php $instance['heading_color']; ?>;
			height: 3px;
			border-width: 0;
		}
	</style>

	<?php

	$lan = tr_get_current_language();

	$options = get_option($lan . '_menulist_sorting_order');

	// $options = get_option('menulist_sorting_order');

	if (!empty($options)) {
		echo '<div id="exTab1" class="container menu-d5-container">';

		$sorting_array = explode(',', $options);
		echo '<ul class="nav nav-pills md5-cat-list" id="myTabs">';
		foreach ($sorting_array as $option) {
			$category_info = get_term_by('id', $option, 'menu_list_category');
			?>
			<li class="<?php echo $ci == 0 ? 'active' : ''; ?>">
				<a href="<?php echo '#' . $category_info->slug; ?>" data-toggle="tab"
				   style="color:<?php echo $instance['category_color']; ?>"><?php echo $category_info->name; ?></a>
			</li>
			<?php
			$ci++;
		}
		echo '</ul>';
		?>
		<select name="tr_menu_select" class="tr_menu_select"></select>
		<div
			style="background-color:<?php echo $instance['menu_background_image_overlay'] ?>;opacity:0.8;border-radius: 4px;margin:auto;">
			<div class="tab-content clearfix menu5-padding-wrap" style="
			<?php if (!empty($instance['menu_background_image'])) {
				$attachment = wp_get_attachment_image_src($instance['menu_background_image'], 'full'); ?>
				background-color: rgba(255, 255, 255, 0.9);
				background: url('<?php echo sow_esc_url( $attachment[0] ) ?>') repeat top left;
				margin: auto;
				border-radius: 4px;
			<?php } ?>">

				<?php
				$pi = 0;
				global $post;

				foreach ($sorting_array as $option) {
					setup_postdata($post);
					$category_info = get_term_by('id', $option, 'menu_list_category');

					$menu_lists = get_posts(array(
						'post_type' => 'menu_list',
						'numberposts' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'menu_list_category',
								'field' => 'slug',
								'terms' => $category_info->slug,
							)
						)
					));

					?>

					<div role="tabpanel" class="tab-pane fade <?php echo $pi == 0 ? 'in active' : ''; ?>"
						 id="<?php echo $category_info->slug; ?>" tabcontent="#<?php echo $category_info->slug; ?>">

						<?php foreach ($menu_lists as $post) {
							setup_postdata($post);
							?>

							<div class="col-md-12">


								<h1 class="category-name" style="<?php if ($instance['border_line'] == 'show') {
									echo 'border-bottom: 1px solid' . $instance['heading_color'] . ';';
								}
								echo 'color:' . $instance['heading_color'] . ';'; ?>text-align: center;line-height: 24px">
									<span class="menu5-title"><?php echo get_the_title(); ?></span>
									<?php
									if (!empty($instance['content']) == 'show') { ?>
										<span class="price-item-subheading"
											  style="color:<?php echo $instance['heading_color']; ?>; font-size:18px; font-weight: 400;padding:10px 0;display: block;text-align: justify"><?php echo get_the_content(); ?></span>
									<?php } ?>
								</h1>
							</div>

							<?php
							$room_all_infos = get_post_meta($post->ID, 'tt_room_info', true);

							if (is_serialized($room_all_infos)) {
								$menu_lists = unserialize($room_all_infos);
							} else {
								$menu_lists = '';
							}

							if (!empty($menu_lists)) {
								echo "<div class='col-md-12 menu-list-items'>";
								foreach ($menu_lists as $menu_list) {
									$title = empty($menu_list['title']) ? '' : $menu_list['title'];
									$price = empty($menu_list['price']) ? '' : $menu_list['price'];
									$desc  = empty($menu_list['desc']) ? '' : $menu_list['desc'];
									?>
									<div class="menu-list-item"
										 style="<?php if ($instance['border_line'] == 'show') {
											 echo 'border-bottom: 1px solid' . $instance['heading_color'];
										 } ?>">
										<div class="menu-list-item-title"
											 style="font-weight:<?php echo $instance['content_price_font_weight']; ?>;">
											<h4 class="item-title"
												style="color:<?php echo $instance['content_color']; ?>"><?php echo $title; ?></h4>
											<span class="menu-list-item-price"
												  style="color:<?php echo $instance['content_color']; ?>"><?php echo $instance['currency'] . ' ' . $price; ?></span>
										</div>
										<p class="menu-list-item-desc" style="text-align: left;">
											<span class="desc-content"
												  style="color:<?php echo $instance['content_desc_color']; ?>"><?php echo $desc; ?></span>
										</p>
									</div>
									<?php
									wp_reset_postdata();
								}
								echo '</div>';
							}
							?>

							<?php wp_reset_postdata();
						} ?>

						<?php if (empty($menu_lists)) {
							echo _e("Please add some menu within this category", 'themeplate');
						}
						?>
					</div>

					<?php
					$pi++;
				}
				?>

			</div>
		</div>
		<?php
		echo '</div>';
	}
	?>
</div>
