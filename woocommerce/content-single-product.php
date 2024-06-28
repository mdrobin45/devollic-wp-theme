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
<div class="row">
         <div class="col-lg-8">
            <div class="single-product-wrap">
               <div class="thumb">
                  <img
                     class="w-100"
                     src="https://solverwp.com/demo/html/drketa/assets/img/product/1.png"
                     alt="image" />
                  <a class="btn btn-white" href="#">Live Preview</a>
                  <a class="btn btn-white btn-buy" href="#">Buy Now</a>
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
                  <li class="nav-item">
                     <a
                        class="nav-link"
                        data-toggle="pill"
                        href="#pills-profile"
                        >Reviews <?php echo $product->get_review_count(); ?></a
                     >
                  </li>
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
                        <!-- <div class="star-rating">
                           <p>Your Rating:</p>
                           <span><i class="la la-star star-o"></i></span>
                           <span><i class="la la-star star-o"></i></span>
                           <span><i class="la la-star star-o"></i></span>
                           <span><i class="la la-star star-o"></i></span>
                           <span><i class="la la-star star-o"></i></span>
                        </div> -->
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
                  <ul>
                     <li><span>Last Update</span><?php $product->get_date_modified()->date('F j, Y'); ?></li>
                     <li><span>Created</span><?php $product->get_date_created(); ?></li>
                     <li><span>High Resolution</span>Yes</li>
                     <li>
                        <span>Browsers</span>IE11, Firefox, Safari, Opera,
                        Chrome, Edge
                     </li>
                     <li>
                        <span>Compatible With</span>Bootstrap 4.x <br />Included
                        PHP Files, <br />HTML Files, CSS, <br />JS Files
                     </li>
                     <li><span>Documentation</span>Well Documentation</li>
                     <li><span>Layout</span>Responsive</li>
                     <li>
                     <?php do_action('devollic_single_product_tags_hook'); ?>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
