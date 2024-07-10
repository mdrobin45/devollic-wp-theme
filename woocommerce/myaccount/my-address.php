<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined( 'ABSPATH' ) || exit;

if(is_user_logged_in()):

   // Get current user Id
   $user_id = get_current_user_id();

   $billing_first_name = get_user_meta($user_id, 'billing_first_name', true);
    $billing_last_name = get_user_meta($user_id, 'billing_last_name', true);
    $billing_company = get_user_meta($user_id, 'billing_company', true);
    $billing_address_1 = get_user_meta($user_id, 'billing_address_1', true);
    $billing_city = get_user_meta($user_id, 'billing_city', true);
    $billing_postcode = get_user_meta($user_id, 'billing_postcode', true);
    $billing_country = get_user_meta($user_id, 'billing_country', true);
    $billing_phone = get_user_meta($user_id, 'billing_phone', true);
    $billing_email = get_user_meta($user_id, 'billing_email', true);

   //  Fields array
   $fields = array(
      'Full Name' => $billing_first_name ? $billing_first_name . ' ' . $billing_last_name : 'Not available',
      'Email' => $billing_email ? $billing_email : 'Not available',
      'Phone' => $billing_phone ? $billing_phone : 'Not available',
      'Company' => $billing_company ? $billing_company : 'Not available',
      'Post Code' => $billing_postcode ? $billing_postcode : 'Not available',
      'City' => $billing_city ? $billing_city : 'Not available',
      'Address' => $billing_address_1 ? $billing_address_1 : 'Not available',
      'Country' => $billing_country ? $billing_country : 'Not available'
   );

?>

<div class="card">
   <div class="card-body">
      <div class="mt-24">
         <h6 class="fw-bold mb-16 text-black text-xl">Billing Address</h6>
         <ul>
            <?php
            foreach($fields as $label => $value): ?>
               <li class="d-flex align-items-center gap-1 mb-12">
                  <span class="w-30 text-md fw-semibold text-primary-light"><?php echo $label; ?></span>
                  <span class="w-70 text-secondary-light fw-medium">: <?php echo $value; ?></span>
               </li>
            <?php endforeach; ?>
            
            <!-- Address edit button -->
            <li class="d-flex align-items-center gap-1 mb-12">
               <?php 
               $edit_address_url = wc_get_endpoint_url('edit-address', 'billing', wc_get_page_permalink('myaccount'));
               echo '<p><a href="' . esc_url($edit_address_url) . '" class="button">Edit Billing Address</a></p>';
               ?>
            </li>
         </ul>
      </div>
   </div>
</div>

<?php endif; ?>
