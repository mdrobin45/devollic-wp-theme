<?php 

// Remove default WooCommerce product title function
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

// Add custom product title function with custom class
add_action('woocommerce_shop_loop_item_title','devollic_add_product_title_class',10);

function devollic_add_product_title_class(){
   echo " <h3 class='product-card__meta_title'>".get_the_title()."</h3>";
}

// Remove ratings
remove_action("woocommerce_after_shop_loop_item_title","woocommerce_template_loop_rating",5);
remove_action("woocommerce_after_shop_loop_item_title","woocommerce_template_loop_price",10);

// Add custom product price
add_action('woocommerce_shop_loop_item_title','devollic_add_product_price_class',10);

function devollic_add_product_price_class(){
   global $product;

   if ( ! $product ) {
       return;
   }

   $price_html = $product->get_regular_price();


   if ( $price_html ) {
       echo "<div class='product-card__meta_price'>".wc_price($price_html)."</div>";
   }
}


// Show thumbnail
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);

add_action('woocommerce_before_shop_loop_item_title','devollic_add_product_thumbnail',10);

function devollic_add_product_thumbnail(){
   global $product;

   if(!$product){
      return;
   }

   $image_url = wp_get_attachment_image_url( $product->get_image_id(),'full');
   
   if($image_url){
      echo "<div class='screen'>";
      echo "<img class='product-thumbnail-image'
      src=".esc_url( $image_url )." alt=".esc_attr($product->get_name())."/>";
      echo "</div>";
   }else{
      echo "<div class='screen'>";
      echo "<img
      src=".esc_url(wc_placeholder_img_src())." alt=".esc_attr__('Placeholder','devollic')."/>";
      echo "</div>";
   }
}

// Add product categories in shop page card
add_action('woocommerce_shop_loop_item_title','devollic_add_product_categories_list',15);

function devollic_add_product_categories_list(){
   global $product;

   // Check if the product object is available
   if(!$product){
      return;
   }

   // Get the product categories
   $categories_term = get_the_terms($product->get_id(),'product_cat');

    // Check if there are categories and no errors
   if($categories_term && !is_wp_error($categories_term)){
      $categories = array();

      // Loop through the categories and add them to the array
      foreach($categories_term as $category){
         $categories[]=$category->name;
      }

      // Display the categories
      echo "<span class='product_card_meta_categories'>". implode(', ',$categories) . "</span>";
   }
}