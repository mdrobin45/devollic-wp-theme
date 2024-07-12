<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Devollic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<header>
   <nav>
      <div class="logo"><a href="#"> King</a></div>
      <label for="menubrop" class="bartoggle">≡</label>
      <input type="checkbox" id="menubrop" />
      <ul class="NavMenu m-0 m-0">
         <li><a href="#">Home</a></li>
         <li><a href="#">About Us</a></li>
         <li>
            <a href="javascript:void(0)"
               ><label for="droplist1" class="toggle"
                  >Our Service</label
               ></a
            >
            <input type="checkbox" id="droplist1" />
            <!-- =============FirstDropDown================== -->
            <ul class="p-0">
               <li><a href="#">Service A</a></li>
               <li><a href="#">Service B</a></li>
               <li>
                  <a href="javascript:void(0)"
                     ><label for="droplist2" class="toggle"
                        >Service C</label
                     ></a
                  >
                  <input type="checkbox" id="droplist2" />
                  <!-- =========Sub Drop Menu========== -->
                  <ul class="p-0 m-0">
                     <li><a href="#">Sub Service 1</a></li>
                     <li><a href="#">Sub Service 2</a></li>
                     <li><a href="#">Sub Service 3</a></li>
                     <li><a href="#">Sub Service 4</a></li>
                  </ul>
               </li>
               <li><a href="#">Service D</a></li>
            </ul>
         </li>
         <li><a href="#">Our Gallery</a></li>
         <li><a href="#">Contact Us</a></li>
         <li><a href="#">Enquiry</a></li>
      </ul>
      <div class="d-flex align-items-center">
         <!-- Cart items -->
         <div class="dropdown">
            <button
               class="has-indicator devollic_nav_cart-icon"
               type="button"
               data-bs-toggle="dropdown">
               <div class="navbar_cart-btn">
                  <div class="cart-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512"><circle cx="176" cy="416" r="16" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="16" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 80h64l48 272h256"/><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M160 288h249.44a8 8 0 0 0 7.85-6.43l28.8-144a8 8 0 0 0-7.85-9.57H128"/></svg>
                  </div>
                  <div class="navbar_cart-btn-cart-badge">7</div>
               </div>
            </button>

            <div class="dropdown-menu to-top dropdown-menu-lg p-0">
               <div
                  class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                  <div>
                     <h6
                        class="text-lg text-primary-light fw-semibold mb-0">
                        Cart
                     </h6>
                  </div>
                  <span
                     class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center"
                     >05</span
                  >
               </div>

               <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                  <a
                     href="javascript:void(0)"
                     class="px-24 py-12 d-flex align-items-center gap-3 mb-2 justify-content-between bg-neutral-50">
                     <div
                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                        <span
                           class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                           <img
                              src="assets/images/notification/profile-1.png"
                              alt="" />
                        </span>
                        <div>
                           <h6 class="text-md fw-semibold">
                              Ronald Richards
                           </h6>
                           <p
                              class="mb-0 text-sm text-secondary-light text-w-200-px">
                              <strong class="fw-semibold text-black"
                                 >Category:</strong
                              >
                              Wordpress
                           </p>
                        </div>
                     </div>
                     <p
                        class="m-0 text-lg fw-semibold text-black text-secondary-light flex-shrink-0">
                        $20
                     </p>
                  </a>
               </div>
               <div class="text-center cart-dropdown-footer">
                  <a
                     href="javascript:void(0)"
                     class="text-white fw-semibold text-md py-12 px-16 d-block"
                     >Proceed to Checkout</a
                  >
               </div>
            </div>
         </div>
         <!-- Login Button -->
         <a class="header-login-btn" href="#">Login</a>

         <!-- User dropdown -->
         <div class="dropdown">
            <button
               class="header-user-dropdown-btn"
               type="button"
               data-bs-toggle="dropdown">
               <img
                  src="https://wowdash.wowtheme7.com/demo/assets/images/user.png"
                  alt="image"
                  class="w-40-px h-40-px object-fit-cover rounded-circle" />
            </button>
            <div class="dropdown-menu to-top dropdown-menu-sm">
               <div
                  class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                  <div>
                     <h6
                        class="text-lg text-primary-light fw-semibold mb-2">
                        Shaidul Islam
                     </h6>
                     <span class="text-secondary-light fw-medium text-sm"
                        >Admin</span
                     >
                  </div>
                  <button type="button" class="hover-text-danger header-user-dropdown-close-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.758 17.243L12.001 12m5.243-5.243L12 12m0 0L6.758 6.757M12.001 12l5.243 5.243"/></svg>
                  </button>
               </div>
               <ul class="to-top-list">
                  <li>
                     <a
                        class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                        href="view-profile.html">
                        <iconify-icon
                           icon="solar:user-linear"
                           class="icon text-xl"></iconify-icon>
                        My Profile</a
                     >
                  </li>
                  <li>
                     <a
                        class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                        href="email.html">
                        <iconify-icon
                           icon="tabler:message-check"
                           class="icon text-xl"></iconify-icon>
                        Inbox</a
                     >
                  </li>
                  <li>
                     <a
                        class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                        href="company.html">
                        <iconify-icon
                           icon="icon-park-outline:setting-two"
                           class="icon text-xl"></iconify-icon>
                        Setting</a
                     >
                  </li>
                  <li>
                     <a
                        class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                        href="javascript:void(0)">
                        <iconify-icon
                           icon="lucide:power"
                           class="icon text-xl"></iconify-icon>
                        Log Out</a
                     >
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
   </header>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

