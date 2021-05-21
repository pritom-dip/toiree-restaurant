<!-- 1 -->
<?php if (get_theme_mod('topbar_show') === true) { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 toolbar-footer dfgsdfg">
				<?php get_template_part('inc/header/top-header'); ?>
				<div class="bottom-line"
					 style="background: url(https://deroyalchophouse.nl/wp-content/uploads/2019/02/shape-topbar.jpg) center bottom no-repeat;height: 1px; width: 100%;"></div>
			</div>
		</div>
	</div>
<?php } ?>

<div class="container">
	<div class="row">
		<div class="navigation col-sm-12">
			<div class="tm-table">
				<div id="menuToggle" class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
					<input type="checkbox" class="humberger-check"/>

					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>

					<ul id="menu">
					</ul>

				</div>
				<div class="width-logo table-cell sm-logo v1_logo">
					<?php
					do_action('thim_logo');
					do_action('thim_sticky_logo');
					do_action('thim_mobile_logo');
					?>
				</div>
				<nav class="width-navigation table-cell table-right">
					<?php get_template_part('inc/header/main-menu'); ?>
				</nav>


				<?php if (is_active_sidebar('menu_right')) { ?>
					<div class="main-menu-right">
						<?php dynamic_sidebar('menu_right'); ?>
					</div>
				<?php } ?>
				<style>
					.main-menu-right {
						display: -ms-flexbox;
						display: -webkit-flex;
						display: flex;
						-ms-flex-align: center;
						-webkit-align-items: center;
						-webkit-box-align: center;
						align-items: center;
						margin-left: 25px;
					}

					.main-menu-right p {
						margin: 0;
					}

					.main-menu-right a:hover,
					.main-menu-right a:active,
					.main-menu-right a:focus {
						text-decoration: none;
					}
				</style>
			</div>
		</div>
	</div>
</div>
