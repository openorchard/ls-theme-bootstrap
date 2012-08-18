            <h2>My Orders</h2>
        <?
            $orders = $this->customer->orders;
        ?>
                <? if (!$orders): ?>
                    <p>Orders not found</p>
                <? else: ?>
                    <p>Click an order for details.</p>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? if (!$orders->count): ?>
                                    <tr>
                                        <td colspan="5">No orders found</td>
                                    </tr>
                                <? endif ?>
                                <? foreach ($orders as $order):
                                    $url = root_url('shop/order/'.$order->id);
                                ?>
                                    <tr class="<?php if ($order->status->code == 'paid'): echo 'success'; elseif ($order->status->code == 'new'): echo 'info'; else: echo ''; endif ?>">
                                        <td><a href="<?= $url ?>"><?= $order->id ?></a></td>
                                        <td><a href="<?= $url ?>"><?= $order->order_datetime->format('%x') ?></a></td>
                                        <td><a href="<?= $url ?>"><strong><?= h($order->status->name) ?></strong> since <?= $order->status_update_datetime->format('%x') ?></a></td>
                                        <td><a href="<?= $url ?>"><?= format_currency($order->total) ?></a></td>
                                    </tr>
                                <? endforeach ?>
                            </tbody>
                        </table>
                    <? endif ?>
