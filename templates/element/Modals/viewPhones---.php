<div class="modal fade mt-5 pt-5" id="viewPhones_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <!-- {{rec.client.sales[0]}} -->

        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button type="button" class="btn-exit" data-bs-dismiss="modal">
                        <?= $this->Html->image('/img/export-svgrepo-com.svg', ['' => '', 'width' => 30]) ?>Lead Preview
                    </button>
                </div>



                <div class="accordion accordion-flush" id="client1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseOne" aria-expanded="true"
                                aria-controls="client1-collapseOne">
                                <span class="title">Phone List</span>
                            </button>
                        </h2>
                        <div id="client1-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">

                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-center flex-gap-5">
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#messageSection">Mesaj Gönder</button>
                                    </div>
                                </div>

                                <div id="messageSection" class="collapse">
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <span class="sm-txt">Mesajınızı Girin:</span>
                                                <textarea class="form-control" ng-model="messageContent"
                                                    rows="4"></textarea>
                                                <button class="btn btn-success mt-2"
                                                    ng-click="sendWhatsAppMessages()">Gönder</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <span class="sm-txt">
                                                <?= __('client_name') ?>
                                            </span>
                                            <div class="wb-ele-empahty" ng-if="phone.client_mobile"
                                                ng-repeat="phone in rec.client">{{phone.client_mobile}}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

