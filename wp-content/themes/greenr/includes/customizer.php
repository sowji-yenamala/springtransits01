<?php
/**
 * Greenr Theme Customizer
 *
 * @package Greenr
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function greenr_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'greenr_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function greenr_customize_preview_js() {
	wp_enqueue_script( 'greenr_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'greenr_customize_preview_js' );


if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_primary_custom_css' );

	function wbls_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#56cc00'); 
			$newcolor = array($primary_color,substr(str_replace(',',', ',Kirki_Color::get_rgb($primary_color,true)),4,-1)); ?>

	<style type="text/css">
			.portfolioeffects:hover .portfolio_overlay {
				background-color: rgba(<?php echo $newcolor[1];?>,0.6);
			}
			.site-footer .scroll-to-top:hover {
				opacity: 0.6;
			}
	</style>
<?php
	}
}

