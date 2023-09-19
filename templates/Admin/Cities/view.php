<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New City'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cities view content">
            <h3><?= h($city->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('City Name') ?></th>
                    <td><?= h($city->city_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('City Slug') ?></th>
                    <td><?= h($city->city_slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('City Configs') ?></th>
                    <td><?= h($city->city_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($city->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $this->Number->format($city->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country Id') ?></th>
                    <td><?= $this->Number->format($city->country_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($city->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($city->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($city->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Regions') ?></h4>
                <?php if (!empty($city->regions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('City Id') ?></th>
                            <th><?= __('Region Name') ?></th>
                            <th><?= __('Region Slug') ?></th>
                            <th><?= __('Region Configs') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($city->regions as $regions) : ?>
                        <tr>
                            <td><?= h($regions->id) ?></td>
                            <td><?= h($regions->language_id) ?></td>
                            <td><?= h($regions->city_id) ?></td>
                            <td><?= h($regions->region_name) ?></td>
                            <td><?= h($regions->region_slug) ?></td>
                            <td><?= h($regions->region_configs) ?></td>
                            <td><?= h($regions->rec_state) ?></td>
                            <td><?= h($regions->created_at) ?></td>
                            <td><?= h($regions->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Regions', 'action' => 'view', $regions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Regions', 'action' => 'edit', $regions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regions', 'action' => 'delete', $regions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
