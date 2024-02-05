<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salespec $salespec
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Salespec'), ['action' => 'edit', $salespec->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Salespec'), ['action' => 'delete', $salespec->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salespec->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Salespecs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Salespec'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="salespecs view content">
            <h3><?= h($salespec->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $salespec->has('sale') ? $this->Html->link($salespec->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $salespec->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Propertytype') ?></th>
                    <td><?= h($salespec->salespec_propertytype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $salespec->has('currency') ? $this->Html->link($salespec->currency->category_name, ['controller' => 'Categories', 'action' => 'view', $salespec->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Persona') ?></th>
                    <td><?= $salespec->has('persona') ? $this->Html->link($salespec->persona->category_name, ['controller' => 'Categories', 'action' => 'view', $salespec->persona->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Style') ?></th>
                    <td><?= $salespec->has('style') ? $this->Html->link($salespec->style->category_name, ['controller' => 'Categories', 'action' => 'view', $salespec->style->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Beds') ?></th>
                    <td><?= h($salespec->salespec_beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Loction Target') ?></th>
                    <td><?= h($salespec->salespec_loction_target) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Id') ?></th>
                    <td><?= $this->Number->format($salespec->sale_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Isowner') ?></th>
                    <td><?= $this->Number->format($salespec->salespec_isowner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Isready') ?></th>
                    <td><?= $this->Number->format($salespec->salespec_isready) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Saved') ?></th>
                    <td><?= $salespec->salespec_saved === null ? '' : $this->Number->format($salespec->salespec_saved) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Salespec Configs') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($salespec->salespec_configs)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
