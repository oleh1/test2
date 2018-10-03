<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';

?><table id="addresses" cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
	<tr>
		<td class="td" style="text-align:<?php echo $text_align; ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
			<h3><?php _e( 'Billing address', 'woocommerce' ); ?></h3>
       
			<p class="text">
			<?php
			$output  = '<strong>' . __( 'Customer Name:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_first_name', true) . '<br>';
            $output .= '<strong>' . __( 'Customer Last Name:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_last_name', true) . '<br>';
            $output .= '<strong>' . __( 'Postcode:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_postcode', true) . '<br>';
            $output .= '<strong>' . __( 'Country:', 'woocommerce' ) . ' </strong>' . WC()->countries->countries[get_post_meta($order->id, '_billing_country', true)] . '<br>';
            $output .= '<strong>' . __( 'State:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_state', true) . '<br>';
            $output .= '<strong>' . __( 'City:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_city', true) . '<br>';
            $output .= '<strong>' . __( 'Street:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_address_1', true) . '<br>';
            $output .= '<strong>' . __( 'Building number:', 'woocommerce' ) . ' </strong>' . get_post_meta($order->id, '_billing_address_2', true) . '<br>';
            $output .= '<strong>' . __( 'Office:', 'woocommerce' ). ' </strong>' . get_post_meta($order->id, '_billing_company', true) . '<br>';
            echo $output;
            ?>
            </p>
			
		</td>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
			<td class="td" style="text-align:<?php echo $text_align; ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
				<h3><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

				<p class="text"><?php echo $shipping; ?></p>
			</td>
		<?php endif; ?>
	</tr>
</table>
