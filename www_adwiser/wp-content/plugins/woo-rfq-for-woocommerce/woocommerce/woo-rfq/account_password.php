<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$hint = __('Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).', 'woo-rfq-for-woocommerce');
$password_placeholder = __('Please choose a password', 'woo-rfq-for-woocommerce');
$account_options = get_option( 'rfq_cart_sc_section_rfq_page_create_accounts',"yes" );

if($account_options=="always_pwd" || $account_options=="always" ){
  $create_account= __('Create an account', 'woo-rfq-for-woocommerce');
}
else {
    $create_account= __('Create an account?', 'woo-rfq-for-woocommerce');
}

echo '<tr class="info_tr"><td class="info_td"
                              style="text-align: left !important;overflow: hidden; width: 280px; text-align: left; valign: top; whitespace: nowrap;">
        <div class="create-account">
            <input class="input-checkbox" id="rfq_createaccount" name="rfq_createaccount" value="1" type="checkbox"
                   style="-webkit-appearance: checkbox !important;" />&nbsp;' . $create_account . '</div>';
        echo '<div class="password_input_div">
<span class="woocommerce-input-wrapper password-input">
               <input type="password"  class="input-text " name="account_password" id="account_password" placeholder="'.$password_placeholder.'" style="width: 100%" value="" autocomplete="new-password">
              <div class="woocommerce-password-strength" id="password-length" aria-live="polite" style=""></div>
              
 </span>
            <small class="woocommerce-password-hint">'.$hint.'</small></div>

    </td></tr>
';

?>