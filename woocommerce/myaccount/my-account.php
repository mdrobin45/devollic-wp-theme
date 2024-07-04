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
                  <img
                     src="assets/images/user-grid/user-grid-bg1.png"
                     alt=""
                     class="w-100 object-fit-cover" />
                  <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                     <div
                        class="text-center border border-top-0 border-start-0 border-end-0">
                        <img
                           src="assets/images/user-grid/user-grid-img14.png"
                           alt=""
                           class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover" />
                        <h6 class="mb-0 mt-16">Jacob Jones</h6>
                        <span class="text-secondary-light mb-16"
                           >ifrandom@gmail.com</span
                        >
                     </div>
                     <div class="mt-24">
                        <h6 class="text-xl mb-16">Personal Info</h6>
                        <ul>
                           <li class="d-flex align-items-center gap-1 mb-12">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light"
                                 >Full Name</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: Will Jonto</span
                              >
                           </li>
                           <li class="d-flex align-items-center gap-1 mb-12">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light">
                                 Email</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: willjontoax@gmail.com</span
                              >
                           </li>
                           <li class="d-flex align-items-center gap-1 mb-12">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light">
                                 Phone Number</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: (1) 2536 2561 2365</span
                              >
                           </li>
                           <li class="d-flex align-items-center gap-1 mb-12">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light">
                                 Department</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: Design</span
                              >
                           </li>
                           <li class="d-flex align-items-center gap-1 mb-12">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light">
                                 Designation</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: UI UX Designer</span
                              >
                           </li>
                           <li class="d-flex align-items-center gap-1 mb-12">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light">
                                 Languages</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: English</span
                              >
                           </li>
                           <li class="d-flex align-items-center gap-1">
                              <span
                                 class="w-30 text-md fw-semibold text-primary-light">
                                 Bio</span
                              >
                              <span class="w-70 text-secondary-light fw-medium"
                                 >: Lorem Ipsum is simply dummy text of the
                                 printing and typesetting industry.</span
                              >
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-8">
               <div class="card h-100">
                  <div class="card-body p-24">
                     <ul
                        class="nav border-gradient-tab nav-pills mb-20 d-inline-flex"
                        id="pills-tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                           <button
                              class="nav-link d-flex align-items-center px-24 active"
                              id="my-ac-orders-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#my-ac-orders"
                              type="button"
                              role="tab"
                              aria-controls="my-ac-orders"
                              aria-selected="true">
                              Orders
                           </button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button
                              class="nav-link d-flex align-items-center px-24"
                              id="my-ac-downloads-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#my-ac-downloads"
                              type="button"
                              role="tab"
                              aria-controls="my-ac-downloads"
                              aria-selected="true">
                              Downloads
                           </button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button
                              class="nav-link d-flex align-items-center px-24"
                              id="my-ac-address-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#my-ac-address"
                              type="button"
                              role="tab"
                              aria-controls="my-ac-address"
                              aria-selected="true">
                              Addresss
                           </button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button
                              class="nav-link d-flex align-items-center px-24"
                              id="my-ac-payment-methods-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#my-ac-payment-methods"
                              type="button"
                              role="tab"
                              aria-controls="my-ac-payment-methods"
                              aria-selected="true">
                              Payment Methods
                           </button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button
                              class="nav-link d-flex align-items-center px-24"
                              id="my-ac-edit-profile-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#my-ac-edit-profile"
                              type="button"
                              role="tab"
                              aria-controls="my-ac-edit-profile"
                              aria-selected="true">
                              Edit Profile
                           </button>
                        </li>
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


