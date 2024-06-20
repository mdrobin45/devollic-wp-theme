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
