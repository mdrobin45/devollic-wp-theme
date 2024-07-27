<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
   <div class="container">
      <div class="row pb-5">
         <div class="col-lg-8">
            <div class="single-product-wrap">
               <div class="thumb">
                  <?php do_action('devollic_product_page_thumbnail'); ?>
               </div>
               <div class="single-product-details">
                  <?php do_action('devollic_product_single_page_title_category'); ?>
               </div>
            </div>
            <div class="product-tab">
               <ul class="nav nav-pills">
                  <li class="nav-item">
                     <a
                        class="nav-link active"
                        data-toggle="pill"
                        href="#pills-home"
                        >Description</a
                     >
                  </li>
                  <!-- <li class="nav-item">
                     <a
                        class="nav-link"
                        data-toggle="pill"
                        href="#pills-profile"
                        >Reviews <?php ; ?></a
                     >
                     echo $product->get_review_count()
                  </li> -->
                  <?php
                  global $product;

                  $gallery_image_ids = $product -> get_gallery_image_ids();
                  if( $gallery_image_ids ): ?>
                     <li class="nav-item">
                        <a
                           class="nav-link"
                           data-toggle="pill"
                           href="#pills-screenshot"
                           >Screenshots</a
                        >
                     </li>
                 <?php endif; ?>
                  
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade show active" id="pills-home">
                     <?php echo $product->get_description(); ?>
                  </div>
                  <div class="tab-pane fade" id="pills-profile">
                     <h5 class="title">Reviews <?php echo $product->get_review_count(); ?></h5>
                     <div class="comments-list">
                        <?php
                        $comments = get_comments( array(
                              'post_type' => 'product',
                        ));
                        foreach ( $comments as $comment ) : ?>
                              <div class="single-review">
                                 <h6 class="name"><?php echo get_comment_author( $comment ); ?></h6>
                                 <span class="date"><?php echo get_comment_date( 'd F Y', $comment ); ?></span>
                                 <div class="product-star-rating">
                                    <?php
                                    $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
                                    for ( $i = 1; $i <= 5; $i++ ) {
                                          if ( $i <= $rating ) {
                                             echo '<span><i class="fa-solid fa-star"></i></span>';
                                          } else {
                                             echo '<span><i class="fa-regular fa-star"></i></span>';
                                          }
                                    }
                                    ?>
                                 </div>
                                 <p><?php echo esc_html( get_comment_text( $comment ) ); ?></p>
                              </div>
                        <?php endforeach; ?>
                     </div>
                     <div class="add-review">
                        <h5 class="title">Add Review</h5>
                        <form class="contact-form">
                           <div class="row">
                              <div class="col-12">
                                 <div class="single-input-wrap">
                                    <input
                                       type="text"
                                       class="single-input"
                                       placeholder="Your Name" />
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="single-input-wrap">
                                    <input
                                       type="text"
                                       class="single-input"
                                       placeholder="Your Email" />
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="single-input-wrap">
                                    <textarea
                                       class="single-input textarea"
                                       placeholder="Your Review"></textarea>
                                 </div>
                              </div>
                           </div>
                           <a class="btn btn-base" href="#">Submit</a>
                        </form>
                     </div>
                  </div>
                  <div class="tab-pane fade show" id="pills-screenshot">
                     <div class="screenshots-wrapper">
                        <?php
                        do_action('product_show_screenshots');
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="sidebar-area">
               <div class="widget widget-cart">
                  <div class="widget-cart-inner text-center">
                     <?php do_action('devollic_product_details_sidebar'); ?>
                  </div>
               </div>
               <div class="widget widget-list">
                 
                  <table class="template-details-template-info-sidebar">
                     <tr>
                        <td>Last Update</td>
                        <td><?php echo $product->get_date_modified()->date('F j, Y'); ?></td>
                     </tr>
                     <tr>
                        <td>Created</td>
                        <td><?php echo $product->get_date_created()->date('F j, Y'); ?></td>
                     </tr>
                     <tr>
                        <td>High Resolution</td>
                        <td>Yes</td>
                     </tr>
                     <tr>
                        <td>Browsers</td>
                        <td>IE11, Firefox, Safari, Opera, Chrome, Edge</td>
                     </tr>
                     <tr>
                        <td>Documentation</td>
                        <td>Well Documentation</td>
                     </tr>
                     <tr>
                        <td>Layout</td>
                        <td>Responsive</td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
</div>
   </div>


<?php do_action( 'woocommerce_after_single_product' ); ?>
