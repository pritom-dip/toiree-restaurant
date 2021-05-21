<div class="inner-navigation">
	
	<ul class="nav navbar-nav menu-main-menu" id="site-main-menu">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'link_before'    => '<span>',
				'link_after'     => '</span>'
			) );
		} else {
			wp_nav_menu( array(
				'theme_location' => '',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'link_before'    => '<span>',
				'link_after'     => '</span>'
			) );
		}
		?>
	</ul>

</div>
<!--</div>-->