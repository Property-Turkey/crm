<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Countries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Country'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="countries view content">
            <h3><?= h($country->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Country Name') ?></th>
                    <td><?= h($country->country_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country Configs') ?></th>
                    <td><?= h($country->country_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($country->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Langauge Id') ?></th>
                    <td><?= $this->Number->format($country->langauge_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($country->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($country->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($country->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cities') ?></h4>
                <?php if (!empty($country->cities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Country Id') ?></th>
                            <th><?= __('City Name') ?></th>
                            <th><?= __('City Slug') ?></th>
                            <th><?= __('City Configs') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($country->cities as $cities) : ?>
                        <tr>
                            <td><?= h($cities->id) ?></td>
                            <td><?= h($cities->language_id) ?></td>
                            <td><?= h($cities->country_id) ?></td>
                            <td><?= h($cities->city_name) ?></td>
                            <td><?= h($cities->city_slug) ?></td>
                            <td><?= h($cities->city_configs) ?></td>
                            <td><?= h($cities->rec_state) ?></td>
                            <td><?= h($cities->created_at) ?></td>
                            <td><?= h($cities->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cities', 'action' => 'edit', $cities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cities', 'action' => 'delete', $cities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cities->id)]) ?>
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
