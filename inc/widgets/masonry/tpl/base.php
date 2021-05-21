<div class="tr_masonry_full_wrapper">

	<?php 
	if(  $instance['image1'] != '' ){ 
		$src = wp_get_attachment_url(  $instance['image1'] );	
	?>

	<div class="tr_masonry_item" style="content:url(<?php echo $src; ?>);">
	</div>

	<?php } 

	if(  $instance['heading1'] != '' || $instance['content1'] != '' ){ ?>

		<div class="tr_masonry_item" style="background:<?php echo $instance['text1_bg_clr']; ?>; color:<?php echo $instance['text1_font_clr']; ?>">
			<div class="tr_mansory_content_wrapper">

				<?php if( !empty($instance['heading1']) ){ ?>
				
				<h2 class="mansory_heading" style="color:<?php echo $instance['text1_font_clr']; ?>"><?php echo esc_html( $instance['heading1'] ); ?></h2>

				<?php } ?>


				<?php if( $instance['content1'] !='' ){ ?>
					<p class="mansory_content"><?php echo esc_html( $instance['content1'] ); ?></p>
				<?php } ?>

				<?php if($instance['active_num1_btn'] == 'show'){ ?>

					<a href="<?php echo esc_url( $instance['btn_one_link'] ); ?>">
						<button class="tr_masonry_btn" style="background:<?php echo $instance['btn1_bg_clr']; ?>; color:<?php echo $instance['btn1_font_clr']; ?>"><?php echo $instance['btn_one_text']; ?></button>
					</a>

				<?php } ?>

			</div>
		</div>

	<?php } ?>

	<?php 
	if(  $instance['image2'] != '' ){ 
		$src = wp_get_attachment_url(  $instance['image2'] );
		
	?>

	<div class="tr_masonry_item" style="content:url(<?php echo $src; ?>);">
	</div>

	<?php } ?>

	<?php if(  $instance['heading2'] != '' || $instance['content2'] != '' ){ ?>

		<div class="tr_masonry_item" style="background:<?php echo $instance['text2_bg_clr']; ?>; color:<?php echo $instance['text2_font_clr']; ?>">
			<div class="tr_mansory_content_wrapper">

				<?php if( !empty($instance['heading2']) ){ ?>
				
				<h2 class="mansory_heading" style="color:<?php echo $instance['text2_font_clr']; ?>"><?php echo esc_html( $instance['heading2'] ); ?></h2>
				
				<?php } ?>


				<?php if( $instance['content2'] !='' ){ ?>
					<p class="mansory_content"><?php echo esc_html( $instance['content2'] ); ?></p>
				<?php } ?>

				<?php if($instance['active_num2_btn'] == 'show'){ ?>

					<a href="<?php echo esc_url( $instance['btn_two_link'] ); ?>">
						<button class="tr_masonry_btn" style="background:<?php echo $instance['btn2_bg_clr']; ?>; color:<?php echo $instance['btn2_font_clr']; ?>"><?php echo $instance['btn_two_text']; ?></button>
					</a>

				<?php } ?>

			</div>
		</div>

	<?php } ?>

	<?php 
	if(  $instance['image3'] != '' ){ 
		$src = wp_get_attachment_url(  $instance['image3'] );
		
	?>

	<div class="tr_masonry_item" style="content:url(<?php echo $src; ?>);">
	</div>
	<?php } ?>

	<?php if(  $instance['heading3'] != '' || $instance['content3'] != '' ){ ?>

		<div class="tr_masonry_item" style="background:<?php echo $instance['text3_bg_clr']; ?>; color:<?php echo $instance['text3_font_clr']; ?>">
			<div class="tr_mansory_content_wrapper">

				<?php if( !empty($instance['heading3']) ){ ?>
				
				<h2 class="mansory_heading" style="color:<?php echo $instance['text3_font_clr']; ?>"><?php echo esc_html( $instance['heading3'] ); ?></h2>
				
				<?php } ?>


				<?php if( $instance['content3'] !='' ){ ?>
					<p class="mansory_content"><?php echo esc_html( $instance['content3'] ); ?></p>
				<?php } ?>

				<?php if($instance['active_num3_btn'] == 'show'){ ?>

					<a href="<?php echo esc_url( $instance['btn_three_link'] ); ?>">
						<button class="tr_masonry_btn" style="background:<?php echo $instance['btn3_bg_clr']; ?>; color:<?php echo $instance['btn3_font_clr']; ?>"><?php echo $instance['btn_three_text']; ?></button>
					</a>

				<?php } ?>

			</div>
		</div>

	<?php } ?>

</div>