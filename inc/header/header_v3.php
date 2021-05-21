<!-- 3 -->
<?php 
    if( get_theme_mod('topbar_show') === true ){
        get_template_part('inc/header/top-header');
    } 
?>
<div class="navigation">
	<div class="tm-flex">
		<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</div>
		<div class="width-logo sm-logo row">

			<div class="col-md-4 align-center">
				<?php
				if ( is_active_sidebar( 'menu_left' ) ) {
					dynamic_sidebar( 'menu_left' );
				}
				?>
			</div>

			<div class="col-md-4 align-center v3_logo">

				<?php 
					do_action( 'thim_logo' );
					do_action( 'thim_sticky_logo' );
					do_action( 'thim_mobile_logo' ); 
				?>

			</div>

			<div class="col-md-4 align-center">
				<?php
				if ( is_active_sidebar( 'menu_left' ) ) {
					dynamic_sidebar( 'menu_left' );
				}
				?>
			</div>
		</div>
	</div>

	<div>
	
		<!-- <div class="header-right">
			<div class="right-menu">
				<nav class="width-navigation main-navigation">
					<div class="inner-navigation">
						<?php //get_template_part( 'inc/header/main-menu-v3' ); ?>
					</div>
				</nav>
			</div>
			
			<div class="menu-mobile-effect navbar-toggle hidden" data-effect="mobile-effect">
				<div class="icon-wrap">
					<i class="ion-navicon"></i>
				</div>
			</div>
		</div> -->

		<div class="navigation col-sm-12">
			<div class="tm-table">
				<nav class="width-navigation table-cell table-center">
					<?php
						get_template_part( 'inc/header/main-menu' );
					?>
				</nav>
			</div>
			<!--end .row-->
		</div>

	</div>

</div>
