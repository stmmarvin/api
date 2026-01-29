<?php
/**
 * Online Documentation: Block Patterns
 *
 * @since Online Documentation 1.0
 */

 /**
  * Get patterns content.
  *
  * @param string $file_name Filename.
  * @return string
  */
function online_documentation_get_pattern_content( $file_name ) {
	ob_start();
	include get_theme_file_path( '/patterns/' . $file_name . '.php' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Registers block patterns and categories.
 *
 * @since Online Documentation 1.0
 *
 * @return void
 */
function online_documentation_register_block_patterns() {

	$patterns = array(
		'header-default' => array(
			'title'      => __( 'Default header', 'online-documentation' ),
			'categories' => array( 'online-documentation-headers' ),
			'blockTypes' => array( 'parts/header' ),
		),
		'footer-default' => array(
			'title'      => __( 'Default footer', 'online-documentation' ),
			'categories' => array( 'online-documentation-footers' ),
			'blockTypes' => array( 'parts/footer' ),
		),
		'home-banner' => array(
			'title'      => __( 'Home Banner', 'online-documentation' ),
			'categories' => array( 'online-documentation-banner' ),
		),
		'document-section' => array(
			'title'      => __( 'Document Section', 'online-documentation' ),
			'categories' => array( 'online-documentation-document-section' ),
		),
		'about-us-section' => array(
			'title'      => __( 'About Us Section', 'online-documentation' ),
			'categories' => array( 'online-documentation-about-us-section' ),
		),
		'testimonial-section' => array(
			'title'      => __( 'Testimonial Section', 'online-documentation' ),
			'categories' => array( 'online-documentation-testimonial-section' ),
		),
		'news-section' => array(
			'title'      => __( 'News Section', 'online-documentation' ),
			'categories' => array( 'online-documentation-news-section' ),
		),
		'faq-section' => array(
			'title'      => __( 'FAQ Section', 'online-documentation' ),
			'categories' => array( 'online-documentation-faq-section' ),
		),
		'primary-sidebar' => array(
			'title'    => __( 'Primary Sidebar', 'online-documentation' ),
			'categories' => array( 'online-documentation-sidebars' ),
		),
		'hidden-404' => array(
			'title'    => __( '404 content', 'online-documentation' ),
			'categories' => array( 'online-documentation-pages' ),
		),
		'post-listing-single-column' => array(
			'title'    => __( 'Post Single Column', 'online-documentation' ),
			//'inserter' => false,
			'categories' => array( 'online-documentation-query' ),
		),
		'post-listing-two-column' => array(
			'title'    => __( 'Post Two Column', 'online-documentation' ),
			//'inserter' => false,
			'categories' => array( 'online-documentation-query' ),
		),
		'post-listing-three-column' => array(
			'title'    => __( 'Post Three Column', 'online-documentation' ),
			//'inserter' => false,
			'categories' => array( 'online-documentation-query' ),
		),
		'post-listing-four-column' => array(
			'title'    => __( 'Post Four Column', 'online-documentation' ),
			//'inserter' => false,
			'categories' => array( 'online-documentation-query' ),
		),
		'feature-post-column' => array(
			'title'    => __( 'Feature Post Column', 'online-documentation' ),
			//'inserter' => false,
			'categories' => array( 'online-documentation-query' ),
		),
		'comment-section-1' => array(
			'title'    => __( 'Comment Section 1', 'online-documentation' ),
			'categories' => array( 'online-documentation-comment-sections' ),
		),
		'cover-with-post-title' => array(
			'title'    => __( 'Cover With Post Title', 'online-documentation' ),
			'categories' => array( 'online-documentation-banner-sections' ),
		),
		'cover-with-search-title' => array(
			'title'    => __( 'Cover With Search Title', 'online-documentation' ),
			'categories' => array( 'online-documentation-banner-sections' ),
		),
		'cover-with-archive-title' => array(
			'title'    => __( 'Cover With Archive Title', 'online-documentation' ),
			'categories' => array( 'online-documentation-banner-sections' ),
		),
		'cover-with-index-title' => array(
			'title'    => __( 'Cover With Index Title', 'online-documentation' ),
			'categories' => array( 'online-documentation-banner-sections' ),
		),
		'theme-button' => array(
			'title'    => __( 'Theme Button', 'online-documentation' ),
			'categories' => array( 'online-documentation-theme-button' ),
		),
	);

	$block_pattern_categories = array(
		'online-documentation-footers' => array( 'label' => __( 'Footers', 'online-documentation' ) ),
		'online-documentation-headers' => array( 'label' => __( 'Headers', 'online-documentation' ) ),
		'online-documentation-pages'   => array( 'label' => __( 'Pages', 'online-documentation' ) ),
		'online-documentation-query'   => array( 'label' => __( 'Query', 'online-documentation' ) ),
		'online-documentation-sidebars'   => array( 'label' => __( 'Sidebars', 'online-documentation' ) ),
		'online-documentation-banner'   => array( 'label' => __( 'Banner Sections', 'online-documentation' ) ),
		'online-documentation-document-section'   => array( 'label' => __( 'Document Section', 'online-documentation' ) ),
		'online-documentation-about-us-section'   => array( 'label' => __( 'About Us Section', 'online-documentation' ) ),
		'online-documentation-testimonial-section'   => array( 'label' => __( 'Testimonial Section', 'online-documentation' ) ),
		'online-documentation-news-section'   => array( 'label' => __( 'News Section', 'online-documentation' ) ),
		'online-documentation-faq-section'   => array( 'label' => __( 'FAQ Section', 'online-documentation' ) ),
		'online-documentation-comment-section'   => array( 'label' => __( 'Comment Sections', 'online-documentation' ) ),
		'online-documentation-theme-button'   => array( 'label' => __( 'Theme Button Sections', 'online-documentation' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Online Documentation 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'online_documentation_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Online Documentation 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$patterns = apply_filters( 'online_documentation_block_patterns', $patterns );

	foreach ( $patterns as $block_pattern => $pattern ) {
		$pattern['content'] = online_documentation_get_pattern_content( $block_pattern );
		register_block_pattern(
			'online-documentation/' . $block_pattern,
			$pattern
		);
	}
}
add_action( 'init', 'online_documentation_register_block_patterns', 9 );
