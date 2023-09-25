<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <h3><?= h($sale->client_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $sale->has('client') ? $this->Html->link($sale->client->client_name, ['controller' => 'Clients', 'action' => 'view', $sale->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Source') ?></th>
                    <td><?= $sale->has('source') ? $this->Html->link($sale->source->category_name, ['controller' => 'Categories', 'action' => 'view', $sale->source->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $sale->has('category') ? $this->Html->link($sale->category->category_name, ['controller' => 'Categories', 'action' => 'view', $sale->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pool') ?></th>
                    <td><?= $sale->has('pool') ? $this->Html->link($sale->pool->category_name, ['controller' => 'Categories', 'action' => 'view', $sale->pool->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tag') ?></th>
                    <td><?= $sale->has('tag') ? $this->Html->link($sale->tag->category_name, ['controller' => 'Categories', 'action' => 'view', $sale->tag->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Shared Roles') ?></th>
                    <td><?= h($sale->sale_shared_roles) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Priority') ?></th>
                    <td><?= $sale->sale_priority === null ? '' : $this->Number->format($sale->sale_priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Finance') ?></th>
                    <td><?= $sale->sale_finance === null ? '' : $this->Number->format($sale->sale_finance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Current Stage') ?></th>
                    <td><?= $this->Number->format($sale->sale_current_stage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Budget') ?></th>
                    <td><?= $sale->sale_budget === null ? '' : $this->Number->format($sale->sale_budget) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Commission') ?></th>
                    <td><?= $sale->sale_commission === null ? '' : $this->Number->format($sale->sale_commission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Units') ?></th>
                    <td><?= $sale->sale_units === null ? '' : $this->Number->format($sale->sale_units) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($sale->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($sale->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($sale->stat_updated) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reports') ?></h4>
                <?php if (!empty($sale->reports)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Tar Id') ?></th>
                            <th><?= __('Tar Tbl') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Report Type') ?></th>
                            <th><?= __('Report Priority') ?></th>
                            <th><?= __('Report Text') ?></th>
                            <th><?= __('Iscalled') ?></th>
                            <th><?= __('Isspoken') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->reports as $reports) : ?>
                        <tr>
                            <td><?= h($reports->id) ?></td>
                            <td><?= h($reports->user_id) ?></td>
                            <td><?= h($reports->tar_id) ?></td>
                            <td><?= h($reports->tar_tbl) ?></td>
                            <td><?= h($reports->status_id) ?></td>
                            <td><?= h($reports->report_type) ?></td>
                            <td><?= h($reports->report_priority) ?></td>
                            <td><?= h($reports->report_text) ?></td>
                            <td><?= h($reports->iscalled) ?></td>
                            <td><?= h($reports->isspoken) ?></td>
                            <td><?= h($reports->stat_created) ?></td>
                            <td><?= h($reports->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Books') ?></h4>
                <?php if (!empty($sale->books)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Book Arrivedate') ?></th>
                            <th><?= __('Book Current Stay') ?></th>
                            <th><?= __('Book Meetdate') ?></th>
                            <th><?= __('Book Meetperiod') ?></th>
                            <th><?= __('Book Meetplace') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->books as $books) : ?>
                        <tr>
                            <td><?= h($books->id) ?></td>
                            <td><?= h($books->sale_id) ?></td>
                            <td><?= h($books->book_arrivedate) ?></td>
                            <td><?= h($books->book_current_stay) ?></td>
                            <td><?= h($books->book_meetdate) ?></td>
                            <td><?= h($books->book_meetperiod) ?></td>
                            <td><?= h($books->book_meetplace) ?></td>
                            <td><?= h($books->stat_created) ?></td>
                            <td><?= h($books->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Books', 'action' => 'view', $books->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Books', 'action' => 'edit', $books->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Books', 'action' => 'delete', $books->id], ['confirm' => __('Are you sure you want to delete # {0}?', $books->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Usersale') ?></h4>
                <?php if (!empty($sale->usersale)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Lead Id') ?></th>
                            <th><?= __('User Lead Configs') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->usersale as $usersale) : ?>
                        <tr>
                            <td><?= h($usersale->id) ?></td>
                            <td><?= h($usersale->user_id) ?></td>
                            <td><?= h($usersale->lead_id) ?></td>
                            <td><?= h($usersale->user_lead_configs) ?></td>
                            <td><?= h($usersale->stat_created) ?></td>
                            <td><?= h($usersale->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Usersale', 'action' => 'view', $usersale->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Usersale', 'action' => 'edit', $usersale->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usersale', 'action' => 'delete', $usersale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersale->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sale Specs') ?></h4>
                <?php if (!empty($sale->sale_specs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Salespec Current Location') ?></th>
                            <th><?= __('Salespec Propertytype') ?></th>
                            <th><?= __('Salespec Currency') ?></th>
                            <th><?= __('Salespec Buyerpersona') ?></th>
                            <th><?= __('Salespec Socialstyle') ?></th>
                            <th><?= __('Salespec Beds') ?></th>
                            <th><?= __('Salespec Loction Target') ?></th>
                            <th><?= __('Salespec Isowner') ?></th>
                            <th><?= __('Salespec Isready') ?></th>
                            <th><?= __('Salespec Saved') ?></th>
                            <th><?= __('Salespec Configs') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->sale_specs as $saleSpecs) : ?>
                        <tr>
                            <td><?= h($saleSpecs->id) ?></td>
                            <td><?= h($saleSpecs->sale_id) ?></td>
                            <td><?= h($saleSpecs->salespec_current_location) ?></td>
                            <td><?= h($saleSpecs->salespec_propertytype) ?></td>
                            <td><?= h($saleSpecs->salespec_currency) ?></td>
                            <td><?= h($saleSpecs->salespec_buyerpersona) ?></td>
                            <td><?= h($saleSpecs->salespec_socialstyle) ?></td>
                            <td><?= h($saleSpecs->salespec_beds) ?></td>
                            <td><?= h($saleSpecs->salespec_loction_target) ?></td>
                            <td><?= h($saleSpecs->salespec_isowner) ?></td>
                            <td><?= h($saleSpecs->salespec_isready) ?></td>
                            <td><?= h($saleSpecs->salespec_saved) ?></td>
                            <td><?= h($saleSpecs->salespec_configs) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SaleSpecs', 'action' => 'view', $saleSpecs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SaleSpecs', 'action' => 'edit', $saleSpecs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaleSpecs', 'action' => 'delete', $saleSpecs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleSpecs->id)]) ?>
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
