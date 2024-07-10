<?php
/*
Template Name: Custom Login Page
*/

function enqueue_custom_login_styles() {

   // Enqueue style only login page template
   if(is_page_template('custom-login.php')){
      wp_enqueue_style( 'custom-login-template', get_template_directory_uri().'/assets/css/custom-login.css', [], _S_VERSION, 'all' );
      wp_enqueue_script( 'custom-login-template-js', get_template_directory_uri() . '/assets/js/custom-login-page.js', array(), _S_VERSION, true );
      wp_enqueue_script( 'ajax-login-script', get_template_directory_uri() . '/assets/js/ajax-login-script.js', array(), _S_VERSION, true );
   }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_login_styles');

// Remove header and footer
remove_action('wp_head', '_admin_bar_bump_cb');


wp_head();
?>

<section class="auth bg-base d-flex flex-wrap">
   <div class="auth-left d-lg-block d-none">
      <div
         class="d-flex align-items-center flex-column h-100 justify-content-center">
         <img
            src="<?php echo site_url()."/wp-content/uploads/2024/07/login-vector.jpg"; ?>"
            alt="" />
      </div>
   </div>
   <div
      class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
      <div class="max-w-464-px mx-auto w-100">
         <div>
            <a href="index.html" class="mb-40 max-w-290-px">
               <img
                  src="<?php echo site_url()."/wp-content/uploads/2024/06/devollic-logo.png"; ?>"
                  alt="" />
            </a>
            <h4 class="mb-12">Sign In to your Account</h4>
            <p class="mb-32 text-secondary-light text-lg">
               Welcome back! please enter your detail
            </p>
         </div>
         <div id="login-error" style="color: red;"></div>
         <form id="clf_loginform" method="post">
            <div class="icon-field mb-16">
               <span class="icon top-50 translate-middle-y">
                  <svg
                     xmlns="http://www.w3.org/2000/svg"
                     width="1.2rem"
                     height="1.2rem"
                     viewBox="0 0 24 24">
                     <g
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <rect
                           width="18.5"
                           height="17"
                           x="2.682"
                           y="3.5"
                           rx="4" />
                        <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           d="m2.729 7.59l7.205 4.13a3.956 3.956 0 0 0 3.975 0l7.225-4.13" />
                     </g>
                  </svg>
               </span>
               <input
                  type="text"
                  id="user_login"
                  name="log"
                  class="form-control h-56-px bg-neutral-50 radius-12"
                  placeholder="Username or email" />
            </div>
            <div class="position-relative mb-20">
               <div class="icon-field">
                  <span class="icon top-50 translate-middle-y">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="1.2rem"
                        height="1.2rem"
                        viewBox="0 0 24 24">
                        <path
                           fill="currentColor"
                           d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm0-2h12V10H6zm6-3q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6zM6 20V10z" />
                     </svg>
                  </span>
                  <input
                     type="password"
                     name="pwd"
                     id="user_pass"
                     class="form-control h-56-px bg-neutral-50 radius-12"
                     placeholder="Password" />
               </div>
               <i
               style="cursor:pointer"
                  data-toggle="#your-password"
                  class="fa-regular fa-eye toggle-password cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"></i>
            </div>
            <div>
               <div class="d-flex justify-content-between gap-2">
                  <div
                     class="form-check style-check d-flex align-items-center">
                     <input
                        class="form-check-input border border-neutral-300"
                        type="checkbox"
                        value="forever"
                        name="rememberme"
                        id="rememberme" />
                     <label class="form-check-label" for="rememberme"
                        >Remember me
                     </label>
                  </div>
                  <a
                     href="javascript:void(0)"
                     class="text-primary-600 fw-medium"
                     >Forgot Password?</a
                  >
               </div>
            </div>

            <button
               type="submit"
               class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 mt-32">
               Sign In
            </button>
            <div class="mt-32 text-center text-sm">
               <p class="mb-0">
                  Don’t have an account?
                  <a
                     href="sign-up.html"
                     class="text-primary-600 fw-semibold"
                     >Sign Up</a
                  >
               </p>
            </div>
         </form>
      </div>
   </div>
</section>

      <?php wp_footer(); ?>