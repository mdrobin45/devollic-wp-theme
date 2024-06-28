<?php

// Remove default WooCommerce product title function
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

// Add custom product title function with custom class
add_action('woocommerce_shop_loop_item_title', 'devollic_add_product_title_class', 10);

/**
 * Custom function to display product title with a custom class.
 */
function devollic_add_product_title_class()
{
    echo "<a href=".get_permalink().">";
    echo "<h3 class='product-card__meta_title'>" . get_the_title() . "</h3>";
    echo "</a>";
}

// Remove ratings and price display
remove_action("woocommerce_after_shop_loop_item_title", "woocommerce_template_loop_rating", 5);
remove_action("woocommerce_after_shop_loop_item_title", "woocommerce_template_loop_price", 10);

// Add custom product price display
add_action('woocommerce_shop_loop_item_title', 'devollic_add_product_price_class', 10);

/**
 * Custom function to display product price with a custom class.
 */
function devollic_add_product_price_class()
{
    global $product;

    if (!$product) {
        return;
    }

    $price_html = $product->get_regular_price();

    if ($price_html) {
        echo "<div class='product-card__meta_price'>" . wc_price($price_html) . "</div>";
    }
}

// Show thumbnail instead of default
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_shop_loop_item_title', 'devollic_add_product_thumbnail', 10);

/**
 * Custom function to display product thumbnail.
 */
function devollic_add_product_thumbnail()
{
    global $product;

    if (!$product) {
        return;
    }

    $image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');

    if ($image_url) {
        echo "<div class='screen'>";
        echo "<img class='product-thumbnail-image' src=" . esc_url($image_url) . " alt=" . esc_attr($product->get_name()) . "/>";
        echo "</div>";
    } else {
        echo "<div class='screen'>";
        echo "<img src=" . esc_url(wc_placeholder_img_src()) . " alt=" . esc_attr__('Placeholder', 'devollic') . "/>";
        echo "</div>";
    }
}

// Add product categories in shop page card
add_action('woocommerce_shop_loop_item_title', 'devollic_add_product_categories_list', 15);

/**
 * Custom function to display product categories.
 */
function devollic_add_product_categories_list()
{
    global $product;

    if (!$product) {
        return;
    }

    $categories_term = get_the_terms($product->get_id(), 'product_cat');

    if ($categories_term && !is_wp_error($categories_term)) {
        $categories = array();

        foreach ($categories_term as $category) {
            $categories[] = $category->name;
        }

        echo "<span class='product_card_meta_categories'>" . implode(', ', $categories) . "</span>";
    }
}

// Remove add to cart default hook
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Add custom add to cart button
add_action('woocommerce_after_shop_loop_item', 'devollic_product_cart_meta_buttons', 10);

/**
 * Custom function to display custom add to cart button.
 */
function devollic_product_cart_meta_buttons()
{
    global $product;

    if (!$product) {
        return;
    }

    $product_permalink = get_permalink($product->get_id());

    echo "<div>";
    echo "<a data-product_id=" . esc_attr($product->get_id()) . " data-product_sku=" . esc_attr($product->get_sku()) . " aria-label=" . esc_attr($product->get_name()) . " class='product_card__meta_button' href=" . esc_url($product->add_to_cart_url()) . ">" . esc_html('Add to Cart') . "</a>";
    echo "</div>";
}

// Custom function to change the "View Cart" URL
function custom_woocommerce_view_cart_url() {
   return site_url('/cart'); // Replace with your desired URL
}
add_filter('woocommerce_get_cart_url', 'custom_woocommerce_view_cart_url');


// Add function for single product price
add_action('devollic_product_details_sidebar','devollic_single_product_sidebar_function');
function devollic_single_product_sidebar_function(){
   global $product;
   $product_price = $product->get_price();
   $total_sales = $product->get_total_sales();
   $rating_count = $product->get_review_count();
   $product_id = $product->get_id();
   $product_url = esc_url($product->add_to_cart_url());

   echo "<h3 class='price'>".wc_price($product_price)."</h3>";
   echo '<span class="ratting">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
   </span>';
   echo "<ul>";
      echo "<li><i class='fa fa-shopping-cart'></i>".$total_sales." Sales</li>";
      echo "<li><i class='fa fa-star'></i>".$rating_count." Ratting</li>";
      echo "<li><i class='fa fa-eye'></i>125 Views</li>";
   echo "</ul>";
   echo "<a data-product_id=".$product_id." class='btn btn-base' href=".$product_url.">".esc_html('Add to cart')."</a>";
}

// Product title and category
add_action('devollic_product_single_page_title_category','devollic_product_title_category');
function devollic_product_title_category(){
   global $product;

   echo "<h4>".get_the_title()."</h4>";
   
   $categories_term = get_the_terms($product->get_id(), 'product_cat');

   if ($categories_term && !is_wp_error($categories_term)) {
       $categories = array();

       foreach ($categories_term as $category) {
           $categories[] = $category->name;
       }
       echo "<p>".implode(', ', $categories)."</p>";
   }
   
}

// SHow tags
add_action('devollic_single_product_tags_hook','devollic_single_product_tags');
function devollic_single_product_tags(){
   global $product;
   $tags_ids = $product->get_tag_ids();

   if(empty($tags_ids)){
      return;
   };
   print_r($tags_ids);
   exit();

   $tags_array=array();
   foreach($tags_ids as $tags_id){
      echo get_term($tags_id,'product_tag');
      // if(!is_wp_error($tag)){
      //    $tags_array[] = $tag->name;
      // }
   };

   
   // echo "<span>Tags: </span>" . implode(', ', $tags_array);
}