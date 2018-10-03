<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php if(is_product()) { ?>
	</ul>
	</div>
<?php } elseif(is_page_template('template-onlyinternet.php') || is_page_template('template-tezclub.php') || is_page_template('template-cooltel.php') || ('countries' == get_post_type())) { ?>
	</div>
	<!--p class="str__link center">
	<a href="<?php // the_permalink(30); ?>" class="large bold"><?php //pll_e('wherebuy'); ?> <span class="icon-to-right"></span></a>
	</p-->
	</section>
<?php } else { ?>
	</ul>
	</div>
	</div>
<?php } ?>
