/**
 * Conditional Display for WooCommerce Specific Elements
 * This code checks if a user is on a WooCommerce specific page. If not, it hides the elements with the class `only-woocommerce`.
 * Ideal for hiding or showing menu items or any other elements based on WooCommerce page context.
 */

// Add custom CSS to hide elements with class 'only-woocommerce' on non-WooCommerce pages
function custom_css_for_only_woocommerce_class() {
    $display_style = '';
    
    // Check if WooCommerce is not active or if the user isn't on a WooCommerce page
    if (!function_exists('is_woocommerce') || 
        !(is_shop() || is_product() || is_cart() || is_checkout() || is_tax('product_cat') || is_tax('product_brand') || is_account_page())) {
        $display_style = '.only-woocommerce { display: none !important; }';
    }
    
    // Output the CSS if needed
    if (!empty($display_style)) {
        echo '<style>' . $display_style . '</style>';
    }
}
add_action('wp_head', 'custom_css_for_only_woocommerce_class');
