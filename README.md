# Replace 1-Month Subscription Label

A lightweight WooCommerce plugin that improves clarity on subscription product pricing by replacing `"for 1 month"` with `"Pay in Full"` for single-payment variations. This helps avoid customer confusion when using variable subscription products with both instalment and full-payment options.

## Features

- Replaces `"for 1 month"` with `"Pay in Full"` on product pages when variations are selected
- Applies the same change in the cart and checkout
- Works specifically for variable subscription products using WooCommerce Subscriptions

## Installation

1. Download the plugin ZIP or clone this repository.
2. Upload the plugin folder to your `/wp-content/plugins/` directory.
3. Activate the plugin via **Plugins → Installed Plugins** in your WordPress admin.

## Usage

No settings or configuration needed. The plugin automatically detects when a variation is set to `1 month` and updates the price string accordingly:

- Product page: `£240.00 for 1 month` → `£240.00 Pay in Full`
- Cart/Checkout: `£240.00 for 1 month` → `£240.00 Pay in Full`

## Compatibility

- WordPress 5.0+
- WooCommerce 4.0+
- [WooCommerce Subscriptions](https://woocommerce.com/products/woocommerce-subscriptions/)

## Notes

- The plugin targets subscription variations with a duration of **1 month only**.
- For other durations or customizations, the code can easily be extended.

## License

MIT License

---

**Author:** Adam Smith 
**Website:** https://www.linkedin.com/in/adam-smith-42ab5490/
