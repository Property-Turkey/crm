<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Category') ?></th>
                    <td><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->id, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($category->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Configs') ?></th>
                    <td><?= h($category->category_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $this->Number->format($category->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Priority') ?></th>
                    <td><?= $this->Number->format($category->category_priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($category->rec_state) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Categories') ?></h4>
                <?php if (!empty($category->child_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Category Name') ?></th>
                            <th><?= __('Category Configs') ?></th>
                            <th><?= __('Category Priority') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->child_categories as $childCategories) : ?>
                        <tr>
                            <td><?= h($childCategories->id) ?></td>
                            <td><?= h($childCategories->language_id) ?></td>
                            <td><?= h($childCategories->parent_id) ?></td>
                            <td><?= h($childCategories->category_name) ?></td>
                            <td><?= h($childCategories->category_configs) ?></td>
                            <td><?= h($childCategories->category_priority) ?></td>
                            <td><?= h($childCategories->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $childCategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $childCategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $childCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Clients') ?></h4>
                <?php if (!empty($category->clients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Source Id') ?></th>
                            <th><?= __('Pool Id') ?></th>
                            <th><?= __('Client Name') ?></th>
                            <th><?= __('Client Phone') ?></th>
                            <th><?= __('Client Mobile') ?></th>
                            <th><?= __('Client Email') ?></th>
                            <th><?= __('Client Address') ?></th>
                            <th><?= __('Client Nationality') ?></th>
                            <th><?= __('Client Configs') ?></th>
                            <th><?= __('Client Priority') ?></th>
                            <th><?= __('Client Finance') ?></th>
                            <th><?= __('Client Current Stage') ?></th>
                            <th><?= __('Client Tags') ?></th>
                            <th><?= __('Client Budget') ?></th>
                            <th><?= __('Client Commission') ?></th>
                            <th><?= __('Client Units') ?></th>
                            <th><?= __('Client Shared Roles') ?></th>
                            <th><?= __('Adrs Country') ?></th>
                            <th><?= __('Adrs City') ?></th>
                            <th><?= __('Adrs Region') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->clients as $clients) : ?>
                        <tr>
                            <td><?= h($clients->id) ?></td>
                            <td><?= h($clients->category_id) ?></td>
                            <td><?= h($clients->source_id) ?></td>
                            <td><?= h($clients->pool_id) ?></td>
                            <td><?= h($clients->client_name) ?></td>
                            <td><?= h($clients->client_phone) ?></td>
                            <td><?= h($clients->client_mobile) ?></td>
                            <td><?= h($clients->client_email) ?></td>
                            <td><?= h($clients->client_address) ?></td>
                            <td><?= h($clients->client_nationality) ?></td>
                            <td><?= h($clients->client_configs) ?></td>
                            <td><?= h($clients->client_priority) ?></td>
                            <td><?= h($clients->client_finance) ?></td>
                            <td><?= h($clients->client_current_stage) ?></td>
                            <td><?= h($clients->client_tags) ?></td>
                            <td><?= h($clients->client_budget) ?></td>
                            <td><?= h($clients->client_commission) ?></td>
                            <td><?= h($clients->client_units) ?></td>
                            <td><?= h($clients->client_shared_roles) ?></td>
                            <td><?= h($clients->adrs_country) ?></td>
                            <td><?= h($clients->adrs_city) ?></td>
                            <td><?= h($clients->adrs_region) ?></td>
                            <td><?= h($clients->stat_created) ?></td>
                            <td><?= h($clients->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reservations') ?></h4>
                <?php if (!empty($category->reservations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Source Id') ?></th>
                            <th><?= __('Developer Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Sellertype Id') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th><?= __('Reservation Amount') ?></th>
                            <th><?= __('Reservation Price') ?></th>
                            <th><?= __('Reservation Currency') ?></th>
                            <th><?= __('Reservation Usdprice') ?></th>
                            <th><?= __('Reservation Paytype') ?></th>
                            <th><?= __('Reservation Downpayment Date') ?></th>
                            <th><?= __('Reservation Downpayment') ?></th>
                            <th><?= __('Reservation Isinvoice Sent') ?></th>
                            <th><?= __('Reservation Invoice Date') ?></th>
                            <th><?= __('Reservation Comission') ?></th>
                            <th><?= __('Reservation Usdcomission') ?></th>
                            <th><?= __('Reservation Details') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->reservations as $reservations) : ?>
                        <tr>
                            <td><?= h($reservations->id) ?></td>
                            <td><?= h($reservations->client_id) ?></td>
                            <td><?= h($reservations->property_id) ?></td>
                            <td><?= h($reservations->project_id) ?></td>
                            <td><?= h($reservations->type_id) ?></td>
                            <td><?= h($reservations->source_id) ?></td>
                            <td><?= h($reservations->developer_id) ?></td>
                            <td><?= h($reservations->category_id) ?></td>
                            <td><?= h($reservations->sellertype_id) ?></td>
                            <td><?= h($reservations->seller_id) ?></td>
                            <td><?= h($reservations->reservation_amount) ?></td>
                            <td><?= h($reservations->reservation_price) ?></td>
                            <td><?= h($reservations->reservation_currency) ?></td>
                            <td><?= h($reservations->reservation_usdprice) ?></td>
                            <td><?= h($reservations->reservation_paytype) ?></td>
                            <td><?= h($reservations->reservation_downpayment_date) ?></td>
                            <td><?= h($reservations->reservation_downpayment) ?></td>
                            <td><?= h($reservations->reservation_isinvoice_sent) ?></td>
                            <td><?= h($reservations->reservation_invoice_date) ?></td>
                            <td><?= h($reservations->reservation_comission) ?></td>
                            <td><?= h($reservations->reservation_usdcomission) ?></td>
                            <td><?= h($reservations->reservation_details) ?></td>
                            <td><?= h($reservations->stat_created) ?></td>
                            <td><?= h($reservations->stat_updated) ?></td>
                            <td><?= h($reservations->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
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
