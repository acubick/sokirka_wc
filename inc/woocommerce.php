<?php


/**
* Check if WooCommerce is active
**/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
// Устанавливаем поддержку Woocommerce
// wooCommerce Support
	function sokirka_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'sokirka_add_woocommerce_support' );     
	
// Отключить хлебные крошки

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// Персонализируем хлебные крошки
/**
 * Change the breadcrumb separator
 */
		add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
		function wcc_change_breadcrumb_delimiter( $defaults ) {
		// Change the breadcrumb delimeter from '/' to '>'
		// $defaults['delimiter'] = ' &gt; ';
		$defaults['delimiter'] = ' &nbsp; ';
		$defaults['wrap_before'] = '<p class="breadcrumbs"><span class="mr-2">';
		$defaults['wrap_after']  = '</span></p>';
		return $defaults;
		}
	// Отключаем верх магазина
	// remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	// remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Отключаем sidebar
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


}



