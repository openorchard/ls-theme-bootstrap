<?= open_form() ?>
  <?
  switch ($checkout_step)
  {
    case 'billing_info': $this->render_partial('shop:checkout_billing_info'); break;
    case 'shipping_info': $this->render_partial('shop:checkout_shipping_info'); break;
    case 'shipping_method': $this->render_partial('shop:checkout_shipping_method'); break;
   // case 'payment_method': $this->render_partial('shop:checkout_payment_method'); break;
    case 'review': $this->render_partial('shop:checkout_review'); break;
  }
  ?>
</form>