<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 * @var \Cake\Collection\CollectionInterface|string[] $sales
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books form content">
            <?= $this->Form->create($book) ?>
            <fieldset>
                <legend><?= __('Add Book') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('book_arrivedate', ['empty' => true]);
                    echo $this->Form->control('book_current_stay');
                    echo $this->Form->control('book_meetdate', ['empty' => true]);
                    echo $this->Form->control('book_meetperiod');
                    echo $this->Form->control('book_meetplace');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
