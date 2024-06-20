<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( '', $product ); ?>>
   <div class="product-card">
      <figure class="product-card__image-wrapper">
         <img
            class="w-100"
            src="<?php echo woocommerce_template_loop_product_thumbnail(); ?>"
            alt="Theme" />
      </figure>
      <div class="product-card__meta">
         <div class="product-card__meta_price">$17</div>
         <h3 class="product-card__meta_title">
            <?php echo woocommerce_template_loop_product_title(); ?>
         </h3>
         <ul class="product-card__meta_category-list">
            <li>Company,</li>
            <li>Industry,</li>
            <li>Agency Theme</li>
         </ul>
      </div>
   </div>
</div>

