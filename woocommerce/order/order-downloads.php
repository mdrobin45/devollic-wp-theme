<?php
/**
 * Order Downloads.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="woocommerce-order-downloads">
	<?php if ( isset( $show_title ) ) : ?>
		<h4><?php esc_html_e( 'Downloads', 'woocommerce' ); ?></h4>
	<?php endif; ?>

	<table class="table bordered-table mb-0" id="dataTable">
      <thead>
         <tr>
            <th scope="col" class="bg-transparent">Product Name</th>
            <th scope="col" class="bg-transparent">Remaining</th>
            <th scope="col" class="bg-transparent">Expires</th>
            <th scope="col" class="bg-transparent">Action</th>
         </tr>
      </thead>
      <tbody>
      <?php
         foreach ( $downloads as $download) {
            $product_name = $download['product_name'];
            $downloads_remaining = isset($download['downloads_remaining']) && $download['downloads_remaining'] !== '' ? $download['downloads_remaining'] : '<i class="fa-solid fa-infinity"></i>';
            $access_expires = !empty($download['access_expires']) ? date_i18n(get_option('date_format'), strtotime($download['access_expires'])) : 'Never';
            $download_url = $download['download_url'];

            ?>
            <tr>
               <td class="bg-transparent"><a href="<?php echo $download_url; ?>"><?php echo $product_name; ?></a></td>
               <td class="bg-transparent"><?php echo $downloads_remaining; ?></td>
               <td class="bg-transparent"><?php echo $access_expires; ?></td>
               <td class="bg-transparent"><?php echo apply_filters( 'woocommerce_available_download_link', '<a class="download-btn" href="' . esc_url( $download['download_url'] ) . '">' . $download['download_name'] . '</a>', $download ); ?></td>
            </tr>
            <?php
         }
         ?>
      </tbody>
   </table>
</section>
