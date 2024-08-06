<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books view content">
            <h3><?= h($book->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $book->has('sale') ? $this->Html->link($book->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $book->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Current Stay') ?></th>
                    <td><?= h($book->book_current_stay) ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Meetplace') ?></th>
                    <td><?= h($book->book_meetplace) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($book->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Meetperiod') ?></th>
                    <td><?= $book->book_meetperiod === null ? '' : $this->Number->format($book->book_meetperiod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($book->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Arrivedate') ?></th>
                    <td><?= h($book->book_arrivedate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Meetdate') ?></th>
                    <td><?= h($book->book_meetdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($book->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
