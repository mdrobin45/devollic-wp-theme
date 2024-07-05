<?php
/**
 * My Downloads - Deprecated
 *
 * Shows downloads on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 * @deprecated  2.6.0
 */

defined( 'ABSPATH' ) || exit;

$downloads = WC()->customer->get_downloadable_products();

if ( $downloads ) : ?>

<div class="dashboard-main-body">
         <div class="card basic-data-table">
            <div class="card-body">
               <table class="table bordered-table mb-0" id="dataTable">
                  <thead>
                     <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Download Remaining</th>
                        <th scope="col">Expires</th>
                        <th scope="col">Action</th>
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
                           <td>
                              <a href="<?php echo $download_url; ?>"><?php echo $product_name; ?></a>
                           </td>
                           <td><?php echo $downloads_remaining; ?></td>
                           <td><?php echo $access_expires; ?></td>
                           <td>
                              <?php 
                              echo apply_filters( 'woocommerce_available_download_link', '<a class="download-btn" href="' . esc_url( $download['download_url'] ) . '">' . $download['download_name'] . '</a>', $download );
                              ?>
                           </td>
                        </tr>
                        <?php
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

	<?php do_action( 'woocommerce_after_available_downloads' ); ?>

<?php endif; ?>
