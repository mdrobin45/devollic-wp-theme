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
                  <?php
                     
                     foreach ( $customer_orders->orders as $serial_number => $customer_order ) {
                        $order      = wc_get_order( $customer_order );
                        $item_count = $order->get_item_count() - $order->get_item_count_refunded();

                        $order_id= $order->get_id();
                        $order_date = $order->get_date_created()->date('c');
                        $order_status = $order->get_status();
                        $order_total = $order->get_total();
                        $order_view_url = $order->get_view_order_url();
                        $invoice_link = do_shortcode('[wcpdf_document_link order_id="'.$order_id.'"]');
                        ?>
                        <tr>
                           <td>
                              <label class="form-check-label"><?php echo sprintf('%02d', ++$serial_number); ?></label>
                           </td>
                           <td>
                              <span>#<?php echo esc_html($order_id) ;?></span>
                           </td>
                           <td><time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time></td>
                           <td>
                              <?php
                              echo wc_price($order_total)." for ".$item_count." item";
                              ?>
                           </td>
                           <td>
                              <?php
                              switch ( $order_status ) {
                                 case "completed":
                                    echo "<span class='bg-completed fw-medium p-1 px-24 rounded-1 text-sm text-success-main'>".esc_html($order_status)."</span>";
                                    break;
                                 case "on-hold":
                                    echo "<span class='bg-on-hold fw-medium p-1 px-24 rounded-1 text-sm text-success-main'>".esc_html($order_status)."</span>";
                                    break;
                                 case "pending":
                                    echo "<span class='bg-pending fw-medium p-1 px-24 rounded-1 text-sm text-success-main'>".esc_html($order_status)."</span>";
                                    break;
                                 case "processing":
                                    echo "<span class='bg-processing fw-medium p-1 px-24 rounded-1 text-sm text-success-main'>".esc_html($order_status)."</span>";
                                    break;
                                 case "cancelled":
                                    echo "<span class='bg-cancelled fw-medium p-1 px-24 rounded-1 text-sm text-success-main'>".esc_html($order_status)."</span>";
                                    break;
                                 default:
                                 echo "";
                              }
                              ?>
                           </td>
                           <td class="order-table-action-wrapper">
                              <a
                                 href="<?php echo esc_url($order_view_url);?>"
                                 class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                 <i class="fa-regular fa-eye"></i>
                              </a>
                              <?php 
                              if($invoice_link): ?>
                              <a
                                 href="<?php echo $invoice_link; ?>"
                                 class="w-32-px h-32-px bg-success-focus text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                 <i class="fa-solid fa-file-invoice"></i>
                              </a>
                              <?php endif; ?>
                              
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
