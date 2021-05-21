<?php
echo '<div class="video-area">';
if (!empty($instance['video_link'])) {
	$video_link = $instance['video_link'];
} else {
	$video_link = TP_THEME_URI . "/assets/images/default-video.mp4";
}
?>
	<section class="hero-video-banner " id="hero-video-banner" data-module="fixheightmobile">
		<div class="hero-video-banner__bg">
			<div class="hero-video-banner__carousel" data-module="herovideo-bannercarousel">
				<div class="carousel-cell carousel-cell--video cover-bg">
					<video muted loop autoplay id="video_id" src="<?php echo $video_link; ?>"
						   class="hero-video-banner__vimeo"></video>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="hero-content">
					<div class="hero-video-banner__container">
						<?php if (!empty($instance['video_title'])) {
							echo '<h1 class="title" style="color:' . $instance['video_title_color'] . '">' . __($instance["video_title"], "themeplate") . '</h1>';
						} ?>
						<?php if (!empty($instance['video_description'])) {
							echo '<p class="description" style="color:' . $instance['video_description_color'] . '">' . __($instance["video_description"], "themeplate") . '</p>';
						} ?>
						<?php if (!empty($instance['video_button'])) {
							echo '<p><a href="' . $instance['button_link'] . '" class="btn btn-transparent btn-rounded btn-large">' . __($instance["video_button"], "themeplate") . '</a></p>';
						} ?>
						<div class="sound-button-area">
							<div class="videosoundon videosoundon--ison"
								 style="background-color:<?php echo $instance['video_sound_button_bg_color']; ?>">
								<span onclick="disableMute()"  class="video--muted"> <svg width="32" height="32"
																						xmlns="http://www.w3.org/2000/svg"><path
											d="M19.919.14a1.15 1.15 0 0 0-1.2.098L6.18 9.438a1.144 1.144 0 0 0-.745-.276H1.15A1.15 1.15 0 0 0 0 10.312v10.574c0 .635.515 1.15 1.15 1.15h4.285c.285 0 .544-.104.745-.275l12.54 9.199a1.149 1.149 0 0 0 1.83-.927l-.001-28.868c0-.433-.244-.83-.63-1.025zM2.299 11.46h1.987v8.276H2.299V11.46zm4.286 7.745v-7.214L18.25 3.434v24.33L6.585 19.206zM28.23 15.6l3.367-3.367a1.15 1.15 0 1 0-1.626-1.626l-3.367 3.367-3.368-3.367a1.15 1.15 0 0 0-1.625 1.626l3.367 3.367-3.367 3.367a1.15 1.15 0 0 0 1.626 1.626l3.367-3.367 3.367 3.367a1.146 1.146 0 0 0 1.626 0 1.15 1.15 0 0 0 0-1.626L28.23 15.6z"
											fill="#000" fill-rule="nonzero"></path></svg> </span>
								<span  onclick="enableMute()" class="video--sound"> <svg width="32" height="33"
																						 xmlns="http://www.w3.org/2000/svg"><path
											d="M21.142.131a1.216 1.216 0 0 0-1.269.104L6.61 9.965a1.21 1.21 0 0 0-.789-.29H1.288c-.671 0-1.216.544-1.216 1.216v11.185c0 .672.545 1.216 1.216 1.216h4.533c.301 0 .576-.11.789-.291l13.263 9.73a1.214 1.214 0 0 0 1.935-.98V1.216c0-.458-.258-.878-.666-1.085zM4.606 20.861H2.504v-8.754h2.102v8.753zm2.431-.562v-7.631l12.34-9.052V29.35L7.036 20.3zM27.152 7.226a1.216 1.216 0 1 0-1.413 1.98 8.961 8.961 0 0 1 3.75 7.277 8.961 8.961 0 0 1-3.75 7.278 1.216 1.216 0 0 0 1.413 1.98 11.397 11.397 0 0 0 4.77-9.258c0-3.664-1.783-7.125-4.77-9.257z"
											fill="#000" fill-rule="nonzero"></path></svg> </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		var vid = document.getElementById("video_id");
		function enableMute() {
			vid.muted = true;
		}
		function disableMute() {
			vid.muted = false;
		}
	</script>
	<style>
		.hero-video-banner__container .btn-transparent {
			background: 0 0;
			color: <?php echo $instance['video_button_color'];?>;
			border: 2px solid  <?php echo $instance['video_button_bg_color'];?>;
			-webkit-transition: all .25s ease;
			transition: all .25s ease;
		}
		.hero-video-banner__container .btn-transparent:hover {
			background-color: <?php echo $instance['video_button_hover_color'];?>;
			color: <?php echo $instance['video_button_color'];?>;
			border-color: <?php echo $instance['video_button_hover_color'];?>;
		}
	</style>
<?php echo '</div>';


