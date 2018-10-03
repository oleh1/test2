<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

		<h1 class="woocommerce-products-header__title page-title"><?php pll_e('Shop'); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>


		<!-- Slider -->
		<?php $page_id = pll_get_post(get_option('woocommerce_shop_page_id')); ?>
		<?php $teSlide = get_post_meta($page_id, 'teSlide', 1); ?>

		<?php if(!empty($teSlide) && is_array($teSlide)) { ?>
			<div class="b-shop__banners">
				<div class="b-shop__banners-wrapper">
					<div class="b-shop__banners-slider swiper-container">
						<div class="b-shop__banners-slider-inner swiper-wrapper">

							<?php foreach($teSlide as $value) { ?>
								<div class="b-shop__banners-slider-item swiper-slide">
									<div class="banner-container">
										<a href="#">
											<img src="<?php echo $value; ?>" style="object-fit: containe; max-width: 100%;max-height:100%;">
										</a>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
					<p class="swiper-controls-prev icon-chevron"></p>
					<p class="swiper-controls-next icon-chevron"></p>
				</div>
				<p class="swiper-pagination"></p>
			</div>
		<?php } ?>

    </header>
</div>
</section>

        <?php
        //Вывод категорий
        $args = array(
          'taxonomy'     => 'product_cat',
          'orderby'      => 'name',
          'show_count'   => 0,
          'pad_counts'   => 0,
          'hierarchical' => 1,
          'title_li'     => '',
          'hide_empty'   => 0
        );

        $all_categories = get_categories($args); ?>

        <div class="b-shop__filters swiper-container">
            <div class="wrap">
				<div class="shop_category">
					<label class="b-shop__filters-label swiper-slide">
						<a href="<?php if(pll_current_language('slug') == 'en') echo "/en/shop2"; else echo "/shop"; ?>"><?php pll_e('All products'); ?></a>
					</label>

					<?php foreach($all_categories as $cat) { ?>

						<?php if($cat->category_parent == 0) { ?>
							<?php $category_id = $cat->term_id; ?>

							<label class="b-shop__filters-label swiper-slide">
								<a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name; ?></a>
							</label>

						<?php } ?>
					<?php } ?>
				</div>

				<?php
					wp_nav_menu(array(
						'theme_location' => 'shop_menu',
						'container' => false,
						'menu_class' => 'shop-menu'
					));
				?>
            </div>
        </div>

<section class="b-shop">
	<div class="wrap">
		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
