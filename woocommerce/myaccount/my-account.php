<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>

<div class="dashboard-main-body">
         <div class="row gy-4">
            <div class="col-lg-4">
               <div
                  class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                  <?php do_action('devollic_logged_in_user_info'); ?>
               </div>
            </div>
            <div class="col-lg-8">
               <div class="card h-100">
                  <div class="card-body p-24">
                     <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex">
                     <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                        <li class="nav-link <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                           <a class="nav-link d-flex align-items-center px-24" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                        </li>
                     <?php endforeach; ?>
                     </ul>

                     <div class="tab-content" id="pills-tabContent">
                     <div class="woocommerce-MyAccount-content">
                        <?php
                           /**
                            * My Account content.
                           *
                           * @since 2.6.0
                           */
                           do_action( 'woocommerce_account_content' );
                        ?>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


