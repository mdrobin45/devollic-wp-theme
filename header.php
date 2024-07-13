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
      <div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo site_url('/wp-content/uploads/2024/06/devollic-logo.png'); ?>" alt="Logo"></a></div>
      
      <?php
      wp_nav_menu( array(
         'theme_location' =>'primary_menu',
         'container' =>'ul',
         'menu_class' => 'NavMenu m-0 p-0',
         'walker' => new Custom_Walker_Nav_Menu(),
      ) )
      ?>
      <div class="d-flex align-items-center">
         <!-- Cart items -->
          <?php
          if(is_user_logged_in()): ?>
            <div class="dropdown">
               <button
                  class="has-indicator devollic_nav_cart-icon"
                  type="button"
                  data-bs-toggle="dropdown">
                  <div class="navbar_cart-btn">
                     <div class="cart-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512"><circle cx="176" cy="416" r="16" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="16" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 80h64l48 272h256"/><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M160 288h249.44a8 8 0 0 0 7.85-6.43l28.8-144a8 8 0 0 0-7.85-9.57H128"/></svg>
                     </div>
                     <div class="navbar_cart-btn-cart-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
                  </div>
               </button>

               <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                  <div
                     class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                     <div>
                        <h6
                           class="text-lg text-primary-light fw-semibold mb-0">
                           Total
                        </h6>
                     </div>
                     <span
                        class="align-items-center bg-base d-flex fw-semibold h-40-px justify-content-center p-3 rounded-5 text-lg text-primary-600"
                        ><?php wc_cart_totals_subtotal_html(); ?></span
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
         <?php endif; ?>

         <!-- Login button -->
         <?php
          if(!is_user_logged_in()): ?>
         <a class="header-login-btn" href="#">Login</a>
         <?php endif; ?>
         

         <!-- User dropdown -->
         <?php
          if(is_user_logged_in()): ?>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="black" d="M9 1v6H5l7 7l7-7h-4V1zM5 16v2h14v-2zm0 4v2h14v-2z"/></svg>
                        Downloads</a>
                  </li>
                  <li>
                     <a
                        class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                        href="email.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="black" d="m23.5 17l-5 5l-3.5-3.5l1.5-1.5l2 2l3.5-3.5zM6 2a2 2 0 0 0-2 2v16c0 1.11.89 2 2 2h7.81c-.36-.62-.61-1.3-.73-2H6V4h7v5h5v4.08c.33-.05.67-.08 1-.08c.34 0 .67.03 1 .08V8l-6-6M8 12v2h8v-2m-8 4v2h5v-2Z"/></svg>
                        Invoice</a
                     >
                  </li>
                  <li>
                     <a
                        class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                        href="javascript:void(0)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24"><path fill="black" d="M4 12a.5.5 0 0 0 .5.5h8.793l-2.647 2.646a.5.5 0 1 0 .707.708l3.5-3.5a.5.5 0 0 0 0-.707l-3.5-3.5a.5.5 0 0 0-.707.707l2.647 2.646H4.5a.5.5 0 0 0-.5.5M17.5 2h-11A2.502 2.502 0 0 0 4 4.5v4a.5.5 0 0 0 1 0v-4A1.5 1.5 0 0 1 6.5 3h11A1.5 1.5 0 0 1 19 4.5v15a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 5 19.5v-4a.5.5 0 0 0-1 0v4A2.502 2.502 0 0 0 6.5 22h11a2.502 2.502 0 0 0 2.5-2.5v-15A2.502 2.502 0 0 0 17.5 2"/></svg>
                        Log Out</a
                     >
                  </li>
               </ul>
            </div>
         </div>
         <?php endif; ?>
         
      </div>
   </nav>
   </header>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

