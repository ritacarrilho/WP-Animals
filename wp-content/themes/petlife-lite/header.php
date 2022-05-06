<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Petlife Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#sitemain">
		<?php esc_html_e( 'Skip to content', 'petlife-lite' ); ?>
	</a>

	<?php
		$pethidetophead = get_theme_mod('hide_tophead', '1'); 
		if( $pethidetophead == '' ){
			get_template_part('inc/top','header');
		}
	?>

	<div id="header">

		<div class="header-inner">

			<div class="left-header-box">

				<div class="logo">

					<?php petlife_lite_the_custom_logo(); ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p><?php echo esc_html($description); ?></p>
					<?php endif; ?>

				</div><!-- .logo -->

			</div><!-- left header box -->
			
			<div class="right-header-box">

				<div class="toggle">

					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','petlife-lite'); ?></a>

				</div><!-- toggle -->

				<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">

					<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>

				</nav><!-- main-navigation -->

			</div><!-- right-header-box -->

			<?php
				$petheadbtntxt = get_theme_mod('headbtn-txt');
				$petheadbtnlnk = get_theme_mod('headbtn-link');
				if( !empty( $petheadbtntxt ) ){
			?>
				<div class="header-button">

					<a class="paw-effect" href="#">
						<?php echo esc_html(get_theme_mod('headbtn-txt')); ?>
						<span class="paw1"><i class="fa fa-paw" aria-hidden="true"></i></span>
						<span class="paw2"><i class="fa fa-paw" aria-hidden="true"></i></span>
						<span class="paw3"><i class="fa fa-paw" aria-hidden="true"></i></span>
						<span class="paw4"><i class="fa fa-paw" aria-hidden="true"></i></span>
						<span class="paw5"><i class="fa fa-paw" aria-hidden="true"></i></span>
						<span class="paw6"><i class="fa-paw fa-paw" aria-hidden="true"></i></span>
					</a>

				</div><!-- cont-info -->
			<?php } ?>

		</div><!-- .header-inner-->
		
	</div><!-- #header -->