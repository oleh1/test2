<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if($product->is_on_sale()) {
	$price = '<span class="strikethrough-text">' . wc_price($product->get_regular_price()) . '</span> ' . wc_price(wc_get_price_to_display($product));
} else {
	$price = wc_price($product->get_price());
}
?>
<p class="text product__sum-result message">
	<?php echo $price; ?>
</p>
