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
                    <th><?= __('Book') ?></th>
                    <td><?= $sale->has('book') ? $this->Html->link($sale->book->id, ['controller' => 'Books', 'action' => 'view', $sale->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $sale->has('user') ? $this->Html->link($sale->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
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
                <h4><?= __('Related Enquires') ?></h4>
                <?php if (!empty($sale->enquires)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('Enquiry Clname') ?></th>
                            <th><?= __('Enquiry Clemail') ?></th>
                            <th><?= __('Enquiry Clphone') ?></th>
                            <th><?= __('Enquiry Clcountry') ?></th>
                            <th><?= __('Enquiry Clsource') ?></th>
                            <th><?= __('Enquiry Message') ?></th>
                            <th><?= __('Enquiry Ipaddress') ?></th>
                            <th><?= __('Enquiry Lastpage') ?></th>
                            <th><?= __('Seo Keywords') ?></th>
                            <th><?= __('Seo Host') ?></th>
                            <th><?= __('Isindex') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->enquires as $enquires) : ?>
                        <tr>
                            <td><?= h($enquires->id) ?></td>
                            <td><?= h($enquires->client_id) ?></td>
                            <td><?= h($enquires->property_id) ?></td>
                            <td><?= h($enquires->enquiry_clname) ?></td>
                            <td><?= h($enquires->enquiry_clemail) ?></td>
                            <td><?= h($enquires->enquiry_clphone) ?></td>
                            <td><?= h($enquires->enquiry_clcountry) ?></td>
                            <td><?= h($enquires->enquiry_source) ?></td>
                            <td><?= h($enquires->enquiry_message) ?></td>
                            <td><?= h($enquires->enquiry_ipaddress) ?></td>
                            <td><?= h($enquires->enquiry_lastpage) ?></td>
                            <td><?= h($enquires->seo_keywords) ?></td>
                            <td><?= h($enquires->seo_host) ?></td>
                            <td><?= h($enquires->isindex) ?></td>
                            <td><?= h($enquires->stat_created) ?></td>
                            <td><?= h($enquires->stat_updated) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Enquires', 'action' => 'view', $enquires->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Enquires', 'action' => 'edit', $enquires->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enquires', 'action' => 'delete', $enquires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquires->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Offers') ?></h4>
                <?php if (!empty($sale->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('Offer Desc') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Isinterested') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->offers as $offers) : ?>
                        <tr>
                            <td><?= h($offers->id) ?></td>
                            <td><?= h($offers->sale_id) ?></td>
                            <td><?= h($offers->property_id) ?></td>
                            <td><?= h($offers->offer_desc) ?></td>
                            <td><?= h($offers->stat_created) ?></td>
                            <td><?= h($offers->stat_updated) ?></td>
                            <td><?= h($offers->isinterested) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reminders') ?></h4>
                <?php if (!empty($sale->reminders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Reminder Nextcall') ?></th>
                            <th><?= __('Reminder Desc') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->reminders as $reminders) : ?>
                        <tr>
                            <td><?= h($reminders->id) ?></td>
                            <td><?= h($reminders->user_id) ?></td>
                            <td><?= h($reminders->sale_id) ?></td>
                            <td><?= h($reminders->reminder_nextcall) ?></td>
                            <td><?= h($reminders->reminder_desc) ?></td>
                            <td><?= h($reminders->stat_created) ?></td>
                            <td><?= h($reminders->stat_updated) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reminders', 'action' => 'view', $reminders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reminders', 'action' => 'edit', $reminders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reminders', 'action' => 'delete', $reminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reservations') ?></h4>
                <?php if (!empty($sale->reservations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
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
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->reservations as $reservations) : ?>
                        <tr>
                            <td><?= h($reservations->id) ?></td>
                            <td><?= h($reservations->sale_id) ?></td>
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
                            <th><?= __('Report Type') ?></th>
                            <th><?= __('Report Priority') ?></th>
                            <th><?= __('Report Text') ?></th>
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
                            <td><?= h($reports->report_type) ?></td>
                            <td><?= h($reports->report_priority) ?></td>
                            <td><?= h($reports->report_text) ?></td>
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
                <h4><?= __('Related Actions') ?></h4>
                <?php if (!empty($sale->actions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Action Type') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->actions as $actions) : ?>
                        <tr>
                            <td><?= h($actions->id) ?></td>
                            <td><?= h($actions->sale_id) ?></td>
                            <td><?= h($actions->user_id) ?></td>
                            <td><?= h($actions->action_type) ?></td>
                            <td><?= h($actions->stat_created) ?></td>
                            <td><?= h($actions->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Actions', 'action' => 'view', $actions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Actions', 'action' => 'edit', $actions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actions', 'action' => 'delete', $actions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Sale') ?></h4>
                <?php if (!empty($sale->user_sale)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->user_sale as $userSale) : ?>
                        <tr>
                            <td><?= h($userSale->id) ?></td>
                            <td><?= h($userSale->user_id) ?></td>
                            <td><?= h($userSale->sale_id) ?></td>
                            <td><?= h($userSale->stat_created) ?></td>
                            <td><?= h($userSale->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserSale', 'action' => 'view', $userSale->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserSale', 'action' => 'edit', $userSale->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSale', 'action' => 'delete', $userSale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSale->id)]) ?>
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
