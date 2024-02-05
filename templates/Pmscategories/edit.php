<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmscategory $pmscategory
 * @var string[]|\Cake\Collection\CollectionInterface $parentPmscategories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pmscategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pmscategory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pmscategories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmscategories form content">
            <?= $this->Form->create($pmscategory) ?>
            <fieldset>
                <legend><?= __('Edit Pmscategory') ?></legend>
                <?php
                    echo $this->Form->control('slug');
                    echo $this->Form->control('language_id');
                    echo $this->Form->control('parent_id', ['options' => $parentPmscategories]);
                    echo $this->Form->control('category_name');
                    echo $this->Form->control('category_configs');
                    echo $this->Form->control('category_priority');
                    echo $this->Form->control('stat_created', ['empty' => true]);
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
