<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Book> $books
 */
?>
<div class="books index content">
    <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Books') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('book_arrivedate') ?></th>
                    <th><?= $this->Paginator->sort('book_current_stay') ?></th>
                    <th><?= $this->Paginator->sort('book_meetperiod') ?></th>
                    <th><?= $this->Paginator->sort('book_meetdate') ?></th>
                    <th><?= $this->Paginator->sort('book_meetplace') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $this->Number->format($book->id) ?></td>
                    <td><?= $book->has('client') ? $this->Html->link($book->client->client_name, ['controller' => 'Clients', 'action' => 'view', $book->client->id]) : '' ?></td>
                    <td><?= h($book->book_arrivedate) ?></td>
                    <td><?= h($book->book_current_stay) ?></td>
                    <td><?= $book->book_meetperiod === null ? '' : $this->Number->format($book->book_meetperiod) ?></td>
                    <td><?= h($book->book_meetdate) ?></td>
                    <td><?= h($book->book_meetplace) ?></td>
                    <td><?= h($book->stat_created) ?></td>
                    <td><?= $this->Number->format($book->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
