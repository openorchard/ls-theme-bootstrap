<?
  $steps = array(
  'billing_info' => 'Billing Information',
  'shipping_info' => 'Shipping Information',
  'shipping_method' => 'Shipping Method',
 // 'payment_method' => 'Payment Method',
  'review' => 'Review and Pay',
 // 'pay' => 'Pay',
  );
?>
 <div id="checkout_progress_meter">
<div class="span3 well">
<ul class="checkout_progress">
  <?
    $current_found = false;
    foreach ($steps as $step=>$name):
    $is_current = $checkout_step == $step;
    $current_found = $current_found || $is_current;
  ?>
   
    <li <? if ($is_current): ?>class="current"<? endif ?>>
      <? if ($current_found): ?>
        <?= h($name) ?><? if ($is_current): ?><i class="icon-arrow-left pull-right"></i><? endif ?>
      <? else: ?>
        <a href="#" onclick="return $(this).getForm().sendRequest(
          'on_action',
          {update:{'checkout_page': 'checkout_partial'},
          extraFields: {'move_to': '<?= $step ?>'}})"><?= h($name) ?></a>
      <? endif ?>
    </li>

  <? endforeach ?>
</ul>
</div>
</div><!--Ending id for the progress meter.  
    This needs to be outside of the well/span in order to render properly upon update-->