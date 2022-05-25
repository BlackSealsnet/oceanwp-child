<?php
/**
 * The template for displaying 404 pages.
 *
 * @package OceanWP WordPress theme
 */

// Get ID.
$get_id = get_theme_mod( 'ocean_error_page_template' );

// Check if page is Elementor page.
$elementor = get_post_meta( $get_id, '_elementor_edit_mode', true );

// Get content.
$get_content = oceanwp_error_page_template_content();

// If blank page.
if ( 'on' === get_theme_mod( 'ocean_error_page_blank', 'off' ) ) { ?>

	<!DOCTYPE html>
	<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<link rel="profile" href="https://gmpg.org/xfn/11">

			<?php wp_head(); ?>
		</head>

		<!-- Begin Body -->
		<body <?php body_class(); ?><?php oceanwp_schema_markup( 'html' ); ?>>

			<?php wp_body_open(); ?>

			<?php do_action( 'ocean_before_outer_wrap' ); ?>

			<div id="outer-wrap" class="site clr">

				<a class="skip-link screen-reader-text" href="#main"><?php oceanwp_theme_strings( 'owp-string-header-skip-link', 'oceanwp' ); ?></a>

				<?php do_action( 'ocean_before_wrap' ); ?>

				<div id="wrap" class="clr">

					<?php do_action( 'ocean_before_main' ); ?>

					<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

	<?php
} else {

	get_header();

}
?>

						<?php do_action( 'ocean_before_content_wrap' ); ?>

						<div id="content-wrap" class="container clr">

							<?php do_action( 'ocean_before_primary' ); ?>

							<div id="primary" class="content-area clr">

								<?php do_action( 'ocean_before_content' ); ?>

								<div id="content" class="clr site-content">

									<?php do_action( 'ocean_before_content_inner' ); ?>

									<article class="entry clr">

										<?php
										// Elementor `404` location.
										if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

											// Check if there is a template.
											if ( ! empty( $get_id ) ) {

												// If Elementor.
												if ( OCEANWP_ELEMENTOR_ACTIVE && $elementor ) {

													OceanWP_Elementor::get_error_page_content();

												} elseif ( OCEANWP_BEAVER_BUILDER_ACTIVE && ! empty( $get_id ) ) {

													echo do_shortcode( '[fl_builder_insert_layout id="' . $get_id . '"]' );

												} else {

													// Display template content.
													echo do_blocks( $get_content );

												}
											} else {
												?>

													<div class="error404-content clr">

													<h2 class="error-title">Inhalt nicht gefunden / Content not found</h2>
													<p class="error-text">Entschuldige bitte, aber die Seite konnte nicht gefunden werden. Wom&ouml;glich ein Tippfehler? Bitte pr&uuml;fe die Eingabe...<br />Sorry, but the page you requested could not be found. Perhaps an entry error? Please check the input...</p>
													<br />
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/deep-hole.png" alt="deep-hole">
													<br />
													<p class="error-text">...andererseits, versuche die Suche...<br />...on the other side, try the search...
													<?php get_search_form(); ?>
													</p>
													<br />
													<br />
													<p class="error-text">Zum Schluss kann ein Blick in das <a href="<?php bloginfo( 'url' ); ?>/sitemap.xml">Inhaltsverzeichnis</a> hilfreich sein...<br/>
													Finally maybe a look into the <a href="<?php bloginfo( 'url' ); ?>/sitemap.xml">Sitemap</a> is helpful...</p>
													<a class="error-btn button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back To Homepage', 'oceanwp' ); ?></a>

												</div><!-- .error404-content -->

												<?php
											}
										}
										?>

									</article><!-- .entry -->

									<?php do_action( 'ocean_after_content_inner' ); ?>

								</div><!-- #content -->

								<?php do_action( 'ocean_after_content' ); ?>

							</div><!-- #primary -->

							<?php do_action( 'ocean_after_primary' ); ?>

						</div><!-- #content-wrap -->

						<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php
// If blank page.
if ( 'on' === get_theme_mod( 'ocean_error_page_blank', 'off' ) ) {
	?>

					</main><!-- #main-content -->

					<?php do_action( 'ocean_after_main' ); ?>

				</div><!-- #wrap -->

				<?php do_action( 'ocean_after_wrap' ); ?>

			</div><!-- .outer-wrap -->

			<?php do_action( 'ocean_after_outer_wrap' ); ?>

			<?php wp_footer(); ?>

		</body>
	</html>

	<?php
} else {

	get_footer();

}
?>
