<?php

//

{
    if ( !is_admin()&&get_option('settings_gpls_woo_rfq_no_payment_checkout', 'no') == 'yes') {

        //  $GLOBALS["gpls_woo_rfq_show_prices"] = "yes";
        //  $GLOBALS["hide_for_visitor"] = "no";


        if (!function_exists('gpls_woo_rfq_needs_payment')){
            function gpls_woo_rfq_needs_payment($needs_payment, $cart) {
                return false;
            }
        }

        if (!function_exists('gpls_woo_rfq_check')) {
            function gpls_woo_rfq_check()
            {
                add_filter('woocommerce_cart_needs_payment', 'gpls_woo_rfq_needs_payment', 1000, 2);
            }
        }

        add_action('wp', 'gpls_woo_rfq_check');
        //return;
    }

}