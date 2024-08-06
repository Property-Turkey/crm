<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 * @var string[]|\Cake\Collection\CollectionInterface $sales
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations form content">
            <?= $this->Form->create($reservation) ?>
            <fieldset>
                <legend><?= __('Edit Reservation') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('reservation_amount');
                    echo $this->Form->control('reservation_price');
                    echo $this->Form->control('reservation_currency');
                    echo $this->Form->control('reservation_usdprice');
                    echo $this->Form->control('reservation_paytype');
                    echo $this->Form->control('reservation_downpayment_date', ['empty' => true]);
                    echo $this->Form->control('reservation_downpayment');
                    echo $this->Form->control('reservation_isinvoice_sent');
                    echo $this->Form->control('reservation_invoice_date', ['empty' => true]);
                    echo $this->Form->control('reservation_comission');
                    echo $this->Form->control('reservation_usdcomission');
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
