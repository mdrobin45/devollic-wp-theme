<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

	<div class="dashboard-main-body">
         <div class="card basic-data-table">
            <div class="card-body">
               <table class="table bordered-table mb-0" id="dataTable">
                  <thead>
                     <tr>
                        <th scope="col">
                           <label class="form-check-label"> S.L </label>
                        </th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Issued Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <label class="form-check-label"> 01 </label>
                        </td>
                        <td>
                           <a href="javascript:void(0)" class="text-primary-600"
                              >#526534</a
                           >
                        </td>
                        <td>25 Jan 2024</td>
                        <td>$200.00</td>
                        <td>
                           <span
                              class="bg-success-focus fw-medium p-1 px-24 rounded-1 text-sm text-success-main"
                              >Paid</span
                           >
                        </td>
                        <td>
                           <a
                              href="javascript:void(0)"
                              class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                              <i class="fa-regular fa-eye"></i>
                           </a>
                           <a
                              href="javascript:void(0)"
                              class="w-32-px h-32-px bg-success-focus text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-file-invoice"></i>
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<?php wc_print_notice( esc_html__( 'No order has been made yet.', 'woocommerce' ) . ' <a class="woocommerce-Button wc-forward button' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment ?>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
