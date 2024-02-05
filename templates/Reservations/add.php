<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 * @var \Cake\Collection\CollectionInterface|string[] $payment
 * @var \Cake\Collection\CollectionInterface|string[] $currency
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations form content">
            <?= $this->Form->create($reservation) ?>
            <fieldset>
                <legend><?= __('Add Reservation') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('property_id');
                    echo $this->Form->control('project_id');
                    echo $this->Form->control('type_id');
                    echo $this->Form->control('source_id');
                    echo $this->Form->control('developer_id');
                    echo $this->Form->control('category_id');
                    echo $this->Form->control('sellertype_id');
                    echo $this->Form->control('seller_id');
                    echo $this->Form->control('reservation_amount');
                    echo $this->Form->control('reservation_price');
                    echo $this->Form->control('reservation_currency', ['options' => $currency, 'empty' => true]);
                    echo $this->Form->control('reservation_usdprice');
                    echo $this->Form->control('reservation_paytype', ['options' => $payment, 'empty' => true]);
                    echo $this->Form->control('reservation_downpayment_date', ['empty' => true]);
                    echo $this->Form->control('reservation_downpayment');
                    echo $this->Form->control('reservation_isinvoice_sent');
                    echo $this->Form->control('reservation_invoice_date', ['empty' => true]);
                    echo $this->Form->control('reservation_comission');
                    echo $this->Form->control('reservation_usdcomission');
                    echo $this->Form->control('reservation_details');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
