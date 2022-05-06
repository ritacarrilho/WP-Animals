<?php
	$pettpadd = get_theme_mod('add-txt');
	$pettpwrk = get_theme_mod('wrkhrs-txt');
	$pettpphn = get_theme_mod('call-txt');
	$pettpmail = get_theme_mod('email-txt');

	$petfb = get_theme_mod('facebook');
	$pettw = get_theme_mod('twitter');
	$petyt = get_theme_mod('youtube');
	$petin = get_theme_mod('linkedin');
	$petpi = get_theme_mod('pinterest');
?>

<div class="top-bar">
	<div class="container">
		<div class="flex-box">

			<?php if( !empty ( $pettpadd || $pettpwrk || $pettpphn || $pettpmail ) ) { ?>
			<div class="top-bar-left">
				<div class="flex-box">
					<?php if( !empty( $pettpadd ) ) {
						echo '<div class="top-bar-col"><i class="fa fa-map-marker"></i> '.esc_html($pettpadd).'</div>';
					} if( !empty( $pettpwrk ) ) {
						echo '<div class="top-bar-col"><i class="fa fa-clock-o"></i> '.esc_html($pettpwrk).'</div>';
					} if( !empty( $pettpphn ) ) {
						echo '<div class="top-bar-col"><a href="tel:'.esc_attr($pettpphn).'"><i class="fa fa-phone"></i> '.esc_html($pettpphn).'</a></div>';
					} if( !empty( $pettpmail ) ) {
						echo '<div class="top-bar-col"><a href="mailto:'.sanitize_email($pettpmail).'"><i class="fa fa-envelope-o"></i> '.sanitize_email($pettpmail).'</a></div>';
					} ?>
				</div><!-- flex -->
			</div><!-- top bar left -->
			<?php } ?>
			<div class="top-bar-right">
				<div class="top-bar-col">
					<div class="social-icons">
						<?php if( !empty ( $petfb ) ) { ?>
							<a href="<?php echo esc_url($petfb); ?>" target="_blank" title="facebook-f"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
						<?php } if( !empty ( $pettw ) ) { ?>
							<a href="<?php echo esc_url($pettw); ?>" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<?php } if( !empty ( $petyt ) ) { ?>
							<a href="<?php echo esc_url($petyt); ?>" target="_blank" title="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
						<?php } if( !empty ( $petin ) ) { ?>
							<a href="<?php echo esc_url($petin); ?>" target="_blank" title="linkedin-in"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<?php } if( !empty ( $petpi ) ) { ?>
							<a href="<?php echo esc_url($petpi); ?>" target="_blank" title="pinterest-p"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
						<?php } ?>
					</div>
				</div><!-- header col -->
			</div><!-- top-bar-right -->

		</div><!-- flex -->
	</div><!-- container -->
</div><!-- top-bar -->