<div class="menu-design-4">
	<style>
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
			background: #eee;
		}
	</style>

	<?php
	$lan     = tr_get_current_language();
	$options = get_option($lan . '_menulist_sorting_order');
	// $options = get_option('menulist_sorting_order');

	if (!empty($options)) {
		echo '<div id="exTab1" class="container menu-d4-container">';
		$sorting_array = explode(',', $options);
		?>

		<div class="tab-content clearfix">

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

				<div role="tabpanel" class="tab-pane1 fade1 <?php echo $pi == 0 ? 'in active' : ''; ?>"
					 id="<?php echo $category_info->slug; ?>" tabcontent="#<?php echo $category_info->slug; ?>">


					<?php foreach ($menu_lists as $post) {
						setup_postdata($post);
						?>

						<div class="col-md-12 tr-pl-0px">
							<h1 class="category-name" style="<?php if ($instance['border_line'] == 'show') {
								echo 'border-bottom: 1px solid' . $instance['heading_color'] . ';';
							}
							echo 'color:' . $instance['heading_color'] . ';'; ?>text-align: center;line-height: 24px"><?php echo get_the_title(); ?>

								<?php
								if (!empty($instance['content']) == 'show') { ?>
									<span class="price-item-subheading"
										  style="color:<?php echo $instance['heading_color']; ?>; font-size:18px; font-weight: 400;padding-top:10px;display: block;padding-bottom: 30px"><?php echo get_the_content(); ?></span>
								<?php } ?>
							</h1>
						</div>
						<?php wp_reset_postdata();
					} ?>

					<?php if (empty($menu_lists)) {
						echo _e("Please add some menu within this category", 'themeplate');
					}
					foreach ($menu_lists as $post) {
						setup_postdata($post);

						$room_all_infos = get_post_meta($post->ID, 'tt_room_info', true);
						if (is_serialized($room_all_infos)) {
							$menu_lists = unserialize($room_all_infos);
						} else {
							$menu_lists = '';
						}

						if (!empty($menu_lists)) {
							echo "<ul class='menu-list-items'>";
							foreach ($menu_lists as $menu_list) {
								$title = empty($menu_list['title']) ? '' : $menu_list['title'];
								$price = empty($menu_list['price']) ? '' : $menu_list['price'];
								$desc  = empty($menu_list['desc']) ? '' : $menu_list['desc'];
								?>
								<div class="col-md-12 tr-pl-0px">
									<div class="menu-list-item" style="<?php if ($instance['border_line'] == 'show') {
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
								</div>
								<?php
								wp_reset_postdata();
							}
							echo '</ul>';
						}
					}
					wp_reset_postdata(); ?>
				</div>

				<?php
				$pi++;
			}
			?>

		</div>
		<?php
		echo '</div>';
	}
	?>
</div>
