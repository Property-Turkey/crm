<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients view content">
            <h3><?= h($client->client_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $client->has('category') ? $this->Html->link($client->category->category_name, ['controller' => 'Categories', 'action' => 'view', $client->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Source') ?></th>
                    <td><?= $client->has('source') ? $this->Html->link($client->source->category_name, ['controller' => 'Categories', 'action' => 'view', $client->source->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pool Category') ?></th>
                    <td><?= $client->has('pool_category') ? $this->Html->link($client->pool_category->category_name, ['controller' => 'Categories', 'action' => 'view', $client->pool_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Name') ?></th>
                    <td><?= h($client->client_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Email') ?></th>
                    <td><?= h($client->client_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Address') ?></th>
                    <td><?= h($client->client_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Nationality') ?></th>
                    <td><?= h($client->client_nationality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Shared Roles') ?></th>
                    <td><?= h($client->client_shared_roles) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= $client->has('country') ? $this->Html->link($client->country->id, ['controller' => 'Addresses', 'action' => 'view', $client->country->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= $client->has('city') ? $this->Html->link($client->city->category_name, ['controller' => 'Categories', 'action' => 'view', $client->city->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Region') ?></th>
                    <td><?= $client->has('region') ? $this->Html->link($client->region->category_name, ['controller' => 'Categories', 'action' => 'view', $client->region->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $client->has('user') ? $this->Html->link($client->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation') ?></th>
                    <td><?= $client->has('reservation') ? $this->Html->link($client->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $client->reservation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $client->has('book') ? $this->Html->link($client->book->id, ['controller' => 'Books', 'action' => 'view', $client->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($client->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Phone') ?></th>
                    <td><?= $client->client_phone === null ? '' : $this->Number->format($client->client_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Mobile') ?></th>
                    <td><?= $client->client_mobile === null ? '' : $this->Number->format($client->client_mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Priority') ?></th>
                    <td><?= $client->client_priority === null ? '' : $this->Number->format($client->client_priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Finance') ?></th>
                    <td><?= $client->client_finance === null ? '' : $this->Number->format($client->client_finance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Current Stage') ?></th>
                    <td><?= $this->Number->format($client->client_current_stage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Budget') ?></th>
                    <td><?= $client->client_budget === null ? '' : $this->Number->format($client->client_budget) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Commission') ?></th>
                    <td><?= $client->client_commission === null ? '' : $this->Number->format($client->client_commission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Units') ?></th>
                    <td><?= $client->client_units === null ? '' : $this->Number->format($client->client_units) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($client->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($client->stat_created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Client Configs') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($client->client_configs)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Client Tags') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($client->client_tags)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Enquires') ?></h4>
                <?php if (!empty($client->enquires)) : ?>
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
                        <?php foreach ($client->enquires as $enquires) : ?>
                        <tr>
                            <td><?= h($enquires->id) ?></td>
                            <td><?= h($enquires->client_id) ?></td>
                            <td><?= h($enquires->property_id) ?></td>
                            <td><?= h($enquires->enquiry_clname) ?></td>
                            <td><?= h($enquires->enquiry_clemail) ?></td>
                            <td><?= h($enquires->enquiry_clphone) ?></td>
                            <td><?= h($enquires->enquiry_clcountry) ?></td>
                            <td><?= h($enquires->enquiry_clsource) ?></td>
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
                <h4><?= __('Related Reports') ?></h4>
                <?php if (!empty($client->reports)) : ?>
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
                        <?php foreach ($client->reports as $reports) : ?>
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
                <?php if (!empty($client->actions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Action Type') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->actions as $actions) : ?>
                        <tr>
                            <td><?= h($actions->id) ?></td>
                            <td><?= h($actions->client_id) ?></td>
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
                <h4><?= __('Related Offers') ?></h4>
                <?php if (!empty($client->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('Offer Desc') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Isinterested') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->offers as $offers) : ?>
                        <tr>
                            <td><?= h($offers->id) ?></td>
                            <td><?= h($offers->client_id) ?></td>
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
                <?php if (!empty($client->reminders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Reminder Nextcall') ?></th>
                            <th><?= __('Reminder Desc') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->reminders as $reminders) : ?>
                        <tr>
                            <td><?= h($reminders->id) ?></td>
                            <td><?= h($reminders->user_id) ?></td>
                            <td><?= h($reminders->client_id) ?></td>
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
                <h4><?= __('Related User Sale') ?></h4>
                <?php if (!empty($client->user_sale)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->user_sale as $userSale) : ?>
                        <tr>
                            <td><?= h($userSale->id) ?></td>
                            <td><?= h($userSale->user_id) ?></td>
                            <td><?= h($userSale->client_id) ?></td>
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
                <h4><?= __('Related Clientspecs') ?></h4>
                <?php if (!empty($client->client_specs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Clientspec Propertytype') ?></th>
                            <th><?= __('Clientspec Currency') ?></th>
                            <th><?= __('Clientspec Buyerpersona') ?></th>
                            <th><?= __('Clientspec Socialstyle') ?></th>
                            <th><?= __('Clientspec Beds') ?></th>
                            <th><?= __('Clientspec Loction Target') ?></th>
                            <th><?= __('Clientspec Isowner') ?></th>
                            <th><?= __('Clientspec Isready') ?></th>
                            <th><?= __('Clientspec Saved') ?></th>
                            <th><?= __('Clientspec Configs') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->client_specs as $clientSpecs) : ?>
                        <tr>
                            <td><?= h($clientSpecs->id) ?></td>
                            <td><?= h($clientSpecs->client_id) ?></td>
                            <td><?= h($clientSpecs->clientspec_propertytype) ?></td>
                            <td><?= h($clientSpecs->clientspec_currency) ?></td>
                            <td><?= h($clientSpecs->clientspec_buyerpersona) ?></td>
                            <td><?= h($clientSpecs->clientspec_socialstyle) ?></td>
                            <td><?= h($clientSpecs->clientspec_beds) ?></td>
                            <td><?= h($clientSpecs->clientspec_loction_target) ?></td>
                            <td><?= h($clientSpecs->clientspec_isowner) ?></td>
                            <td><?= h($clientSpecs->clientspec_isready) ?></td>
                            <td><?= h($clientSpecs->clientspec_saved) ?></td>
                            <td><?= h($clientSpecs->clientspec_configs) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clientspecs', 'action' => 'view', $clientSpecs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clientspecs', 'action' => 'edit', $clientSpecs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientspecs', 'action' => 'delete', $clientSpecs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientSpecs->id)]) ?>
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
