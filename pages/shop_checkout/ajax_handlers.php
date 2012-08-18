<?
function on_process_billing_address($controller, $page, $params)
{
// Call the default action handler
$controller->action();
 
// If the checkbox is checked,
// copy billing address to shipping address
// and move to the next step
 
if (post('ship_to_billing_address'))
{
Shop_CheckoutData::copy_billing_to_shipping();
 
$_POST['skip_to'] = 'shipping_method';
$controller->action();
}
}

function place_order_and_pay($controller, $page, $params)
{
Shop_CheckoutData::set_payment_method(Shop_PaymentMethod::find_by_api_code('default')->id);
 
// Call the default action handler
$controller->action();
 
// Pretend that we are on the Review checkout step
// to force LemonStand to place the order
$_POST['checkout_step'] = 'review';
$controller->action();
}
?>