<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AddressCategory $addressCategory
 * @var string[]|\Cake\Collection\CollectionInterface $parentAddressCategories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $addressCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $addressCategory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Address Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addressCategories form content">
            <?= $this->Form->create($addressCategory) ?>
            <fieldset>
                <legend><?= __('Edit Address Category') ?></legend>
                <?php
                    echo $this->Form->control('language_id');
                    echo $this->Form->control('parent_id', ['options' => $parentAddressCategories, 'empty' => true]);
                    echo $this->Form->control('category_name');
                    echo $this->Form->control('category_slug');
                    echo $this->Form->control('category_configs');
                    echo $this->Form->control('category_priority');
                    echo $this->Form->control('rec_state');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
