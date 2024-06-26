<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquire $enquire
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Enquires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquires form content">
            <?= $this->Form->create($enquire) ?>
            <fieldset>
                <legend><?= __('Add Enquire') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('property_id');
                    echo $this->Form->control('enquiry_clname');
                    echo $this->Form->control('enquiry_clemail');
                    echo $this->Form->control('enquiry_clphone');
                    echo $this->Form->control('enquiry_clcountry');
                    echo $this->Form->control('enquiry_source');
                    echo $this->Form->control('enquiry_message');
                    echo $this->Form->control('enquiry_ipaddress');
                    echo $this->Form->control('enquiry_lastpage');
                    echo $this->Form->control('seo_keywords');
                    echo $this->Form->control('seo_host');
                    echo $this->Form->control('isindex');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
