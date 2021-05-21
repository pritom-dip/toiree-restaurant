<!-- 2 -->
<?php 
    if( get_theme_mod('topbar_show') === true ){
        get_template_part('inc/header/top-header');
    } 
?>


<div class="container">
	<div class="row table">
		<div class="col-sm-12 inner-header-top">
			<div class="header-left table-cell col-md-4">
				<?php 
					if ( is_active_sidebar( 'logo_left' ) ) { 
						dynamic_sidebar( 'logo_left' ); 
					} 
				?>
			</div>
			<div class="width-logo sm-logo table-cell col-md-4 align-center">
				<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
				<div class="v2_logo">
					<?php
					do_action( 'thim_logo' );
					do_action( 'thim_sticky_logo' );
					do_action( 'thim_mobile_logo' );
					?>
				</div>
			</div>
			<div class="header-right table-cell col-md-4">
				<?php 
					if ( is_active_sidebar( 'logo_right' ) ) { 
						dynamic_sidebar( 'logo_right' ); 
					} 
				?>
			</div>
			<!--end .row-->
		</div>
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