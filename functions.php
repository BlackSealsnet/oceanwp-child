<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).

	// Get the parent theme's directory path.
	$parent_theme_dir = get_template_directory();

	// Read the parent theme's style.css file.
	$parent_style = $parent_theme_dir . '/style.css';

	// Get the parent theme's version number.
	$version = wp_get_theme( basename( $parent_theme_dir ) )->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );	
}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

/**
 * Hide single post modified date if the same as the published date.
*/
function my_single_modified_date_state() {
return true;
}
add_filter( 'ocean_single_modified_date_state', 'my_single_modified_date_state' );

/*
 * Flex Posts   Widget and Gutenberg Block
*/
	/**
	 * Display author meta.
	 */
	function flex_posts_author_meta() {
		?>
		<span class="fp-author">
			<span class="author vcard">
					<?php the_author(); ?>
			</span>
		</span>
		<?php
	}
	/**
	 * Display date meta.
	 */
	function flex_posts_date_meta() {
		?>
		<span class="fp-date">
			<time class="entry-date published" datetime="<?php the_date( 'c' ); ?>">
				<?php echo esc_html( get_the_date() ); ?>
			</time>
		</span>
		<?php
	}