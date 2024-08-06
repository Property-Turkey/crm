<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations view content">
            <h3><?= h($reservation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $reservation->has('sale') ? $this->Html->link($reservation->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $reservation->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reservation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Amount') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Price') ?></th>
                    <td><?= $reservation->reservation_price === null ? '' : $this->Number->format($reservation->reservation_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Currency') ?></th>
                    <td><?= $reservation->reservation_currency === null ? '' : $this->Number->format($reservation->reservation_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Usdprice') ?></th>
                    <td><?= $reservation->reservation_usdprice === null ? '' : $this->Number->format($reservation->reservation_usdprice) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Paytype') ?></th>
                    <td><?= $reservation->reservation_paytype === null ? '' : $this->Number->format($reservation->reservation_paytype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Downpayment') ?></th>
                    <td><?= $reservation->reservation_downpayment === null ? '' : $this->Number->format($reservation->reservation_downpayment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Isinvoice Sent') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_isinvoice_sent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Comission') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_comission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Usdcomission') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_usdcomission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($reservation->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Downpayment Date') ?></th>
                    <td><?= h($reservation->reservation_downpayment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Invoice Date') ?></th>
                    <td><?= h($reservation->reservation_invoice_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($reservation->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($reservation->stat_updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
