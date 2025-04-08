<?php
/*
Plugin Name: Replace 1-Month Subscription Label
Description: Replaces "for 1 month" text with "Pay in Full" on variable subscription products, including cart and checkout.
Version: 1.1
Author: Adam Smith
*/

// --------------------------------------------------
// FRONTEND PRODUCT PAGE (REPLACE TEXT WHEN VARIATION IS SELECTED)
// --------------------------------------------------

add_action('wp_footer', 'custom_replace_subscription_price_label');

function custom_replace_subscription_price_label() {
    // Only run this script on single product pages
    if (!is_product()) return;

    // Output JavaScript to modify price display dynamically
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Hook into variation change event on product page
            $('form.variations_form').on('show_variation', function(event, variation) {
                
                // Find the price container
                var $priceEl = $('.woocommerce-variation-price .price');

                // If variation or price data is missing, stop here
                if (!variation || !variation.price_html) return;

                // Grab the HTML of the price string
                const rawHTML = variation.price_html;

                // If the price string contains "for 1 month", replace it
                if (rawHTML.includes('for 1 month')) {
                    const updatedHTML = rawHTML.replace(/for 1 month/, 'Pay in Full');
                    
                    // Update the HTML in the DOM with the new version
                    $priceEl.html(updatedHTML);
                }
            });
        });
    </script>
    <?php
}

// --------------------------------------------------
// CART & CHECKOUT (MODIFY STATIC PRICE STRINGS)
// --------------------------------------------------

// Modify the price column in the cart
add_filter('woocommerce_cart_item_price', 'custom_replace_subscription_price_cart', 10, 3);

// Modify the subtotal column in the cart
add_filter('woocommerce_cart_item_subtotal', 'custom_replace_subscription_price_cart', 10, 3);

function custom_replace_subscription_price_cart($price_html, $cart_item, $cart_item_key) {
    // Check if the price string contains "for 1 month"
    if (strpos($price_html, 'for 1 month') !== false) {
        // Replace it with "Pay in Full"
        $price_html = str_replace('for 1 month', 'Pay in Full', $price_html);
    }

    // Return the modified (or unmodified) price string
    return $price_html;
}
