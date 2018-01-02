<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="portlet form " id="formEmployerWizard">
                    <form class="form-horizontal" action="#" id="submit_form" method="POST">
                        <div class="form-wizard">
                            <div class="portlet portlet-fit light">
                                <div class="portlet-title mt-element-step ">
                                    <ul class="nav nav-tabs step-line nav-justified">
                                        <div class="mt-step-desc ">
                                            <div class="font-dark bold uppercase"> Choose your package</div>
                                            <div class="caption-desc font-grey-cascade"> Currently use tab below to view the flow of payment
                                                <br> [Choose Package > Fill In the shipping and billing forms > Choose payment method > payment shall be complete once user agreed to pay and system show summary
                                                of invoice ]
                                            </div>
                                        </div>
                                        <li class=" mt-step-col first active">
                                            <a href="#tab_package" data-toggle="tab" class="px-0">
                                                <div class="mt-step-number bg-white">
                                                    <i class="icon-basket"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Choose Package</div>
                                                <div class="mt-step-content font-grey-cascade">Select suitable package for your company</div>
                                            </a>
                                        </li>
                                        <li class=" mt-step-col ">
                                            <a class="px-0" data-toggle="tab" href="#tab_billing">
                                                <div class="mt-step-number bg-white">
                                                    <i class="icon-credit-card"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Payment Form </div>
                                                <div class="mt-step-content font-grey-cascade">Complete your payment form</div>
                                            </a>
                                        </li>
                                        <li class="mt-step-col ">
                                            <a href="#tab_payment" data-toggle="tab" class="px-0">
                                                <div class="mt-step-number bg-white">
                                                    <i class="icon-credit-card"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Payment</div>
                                                <div class="mt-step-content font-grey-cascade">Complete your payment</div>
                                            </a>
                                        </li>
                                        <li class="mt-step-col last">
                                            <a href="#tab_complete" class="px-0" data-toggle="tab">
                                                <div class="mt-step-number bg-white">
                                                    <i class="icon-rocket"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Deploy</div>
                                                <div class="mt-step-content font-grey-cascade">Receive item integration</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!-- Pick Package -->
                                        <div class="tab-pane active" id="tab_package">
                                            <div class="pricing-content-1 ">
                                                <!-- <div class="row"> -->
                                                <div class="col-md-3">
                                                    <div class="price-column-container border-active" id="packageA">
                                                        <div class="price-table-head bg-blue">
                                                            <h2 class="no-margin">Budget</h2>
                                                        </div>
                                                        <div class="arrow-down border-top-blue"></div>
                                                        <div class="price-table-pricing">
                                                            <h3>
                                                                <sup class="price-sign">$</sup>24</h3>
                                                            <p>per month</p>
                                                        </div>
                                                        <div class="price-table-content">
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-user"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">3 Members</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-drawer"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">50GB Storage</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-screen-smartphone"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Single Device</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-refresh"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                                            </div>
                                                        </div>
                                                        <div class="arrow-down arrow-grey"></div>
                                                        <div class="price-table-footer">
                                                            <div class="btn-group" id="groupPackage">
                                                                <label class="btn green btn-outline font-weight-600 text-uppercase">
                                                                    <input type="radio" class="toggle" name="choosePackage" id="radioA"> Option 1 </label>
                                                            </div>
                                                            <!-- <a href="javascript:;" data-toggle="tab" class="btn grey-salsa btn-outline font-weight-600 text-uppercase price-button btn-next">Choose Me</a> -->
                                                            <!-- <button type="button" class="btn grey-salsa btn-outline font-weight-600 text-uppercase price-button">Choose Me</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="packageB">
                                                    <div class="price-column-container border-active">
                                                        <div class="price-table-head bg-red">
                                                            <h2 class="no-margin">Solo</h2>
                                                        </div>
                                                        <div class="arrow-down border-top-red"></div>
                                                        <div class="price-table-pricing">
                                                            <h3>
                                                                <sup class="price-sign">$</sup>39</h3>
                                                            <p>per month</p>
                                                        </div>
                                                        <div class="price-table-content">
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-user"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">5 Members</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-drawer"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">100GB Storage</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-screen-smartphone"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Single Device</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-refresh"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                                            </div>
                                                        </div>
                                                        <div class="arrow-down arrow-grey"></div>
                                                        <div class="price-table-footer">
                                                            <div class="btn-group" data-toggle="buttons" id="groupPackage">
                                                                <label class="btn green btn-outline font-weight-600 text-uppercase">
                                                                    <input type="radio" class="toggle" name="choosePackage" id="radioB"> Option 1 </label>
                                                            </div>
                                                            <!-- <a href="javascript:;" data-toggle="tab" class="btn grey-salsa btn-outline font-weight-600 text-uppercase price-button btn-next">Choose Me</a> -->
                                                            <!-- <button type="button" class="btn grey-salsa btn-outline font-weight-600 text-uppercase price-button">Choose Me</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="packageC">
                                                    <div class="price-column-container border-active">
                                                        <div class="price-table-head bg-green">
                                                            <h2 class="no-margin">Start up</h2>
                                                        </div>
                                                        <div class="arrow-down border-top-green"></div>
                                                        <div class="price-table-pricing">
                                                            <h3>
                                                                <sup class="price-sign">$</sup>59</h3>
                                                            <p>per month</p>
                                                            <div class="price-ribbon">Popular</div>
                                                        </div>
                                                        <div class="price-table-content">
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-user-follow"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">20 Members</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-drawer"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">500GB Storage</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-cloud-download"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Cloud Syncing</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-refresh"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Daily Backups</div>
                                                            </div>
                                                        </div>
                                                        <div class="arrow-down arrow-grey"></div>
                                                        <div class="price-table-footer">
                                                            <label class="btn green btn-outline font-weight-600 text-uppercase">
                                                                <input type="radio" class="toggle" name="choosePackage" id="radioC"> Option 1 </label>
                                                            <!-- <a href="javascript:;" class="btn green font-weight-600 text-uppercase price-button btn-next">Choose Me</a> -->
                                                            <!-- <button type="button" class="btn green font-weight-600 text-uppercase price-button">Choose Me</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="packageD">
                                                    <div class="price-column-container border-active">
                                                        <div class="price-table-head bg-purple">
                                                            <h2 class="no-margin">Enterprise</h2>
                                                        </div>
                                                        <div class="arrow-down border-top-purple"></div>
                                                        <div class="price-table-pricing">
                                                            <h3>
                                                                <sup class="price-sign">$</sup>128</h3>
                                                            <p>per month</p>
                                                        </div>
                                                        <div class="price-table-content">
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-users"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">100 Members</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-drawer"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">2TB Storage</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-cloud-download"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Cloud Syncing</div>
                                                            </div>
                                                            <div class="row mobile-padding">
                                                                <div class="col-xs-3 text-right mobile-padding">
                                                                    <i class="icon-refresh"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                                            </div>
                                                        </div>
                                                        <div class="arrow-down arrow-grey"></div>
                                                        <div class="price-table-footer">
                                                            <a href="javascript:;" data-toggle="tab" class="btn grey-salsa btn-outline font-weight-600 text-uppercase price-button btn-next">Choose Me</a>
                                                            <!-- <button type="button" class="btn grey-salsa btn-outline font-weight-600 text-uppercase price-button">Choose Me</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <!-- Billing & Shipping -->
                                        <div class="tab-pane form" id="tab_billing">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="" class="form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row mx-0">
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Full Name</label>
                                                                        <input type="text" class="form-control">
                                                                        <span class="help-block font-20-xs">Input person in charge </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h4 class="form-section">
                                                                Billing Form
                                                            </h4>
                                                            <!-- Company Name & Address -->
                                                            <div class="row mx-0">
                                                                <div class="col-md-4">
                                                                    <div class="form-group mr-0 ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Company Name</label>
                                                                        <input type="text" class="form-control">
                                                                        <span class="help-block font-20-xs">Company Name </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Address</label>
                                                                        <input type="text" class="form-control">
                                                                        <span class="help-block font-20-xs">Input person in charge </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mx-0">
                                                                <div class="col-md-4">
                                                                    <div class="form-group mr-0 ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Country</label>
                                                                        <input type="text" class="form-control">
                                                                        <!-- <span class="help-block font-20-xs">Company Name </span> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group mr-0 ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> City</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Postcode</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class=" col-md-8">
                                                                    <label class="mt-checkbox">
                                                                        <input type="checkbox"> My shipping and billing information is the same.
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <h4 class="form-section">
                                                                Shipping Form
                                                            </h4>
                                                            <!-- Company Name & Address -->
                                                            <div class="row mx-0">
                                                                <div class="col-md-4">
                                                                    <div class="form-group mr-0 ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Company Name</label>
                                                                        <input type="text" class="form-control">
                                                                        <span class="help-block font-20-xs">Company Name </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Address</label>
                                                                        <input type="text" class="form-control">
                                                                        <span class="help-block font-20-xs">Input person in charge </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mx-0">
                                                                <div class="col-md-4">
                                                                    <div class="form-group mr-0 ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Country</label>
                                                                        <input type="text" class="form-control">
                                                                        <!-- <span class="help-block font-20-xs">Company Name </span> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group mr-0 ">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> City</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="font-grey-cascade font-22-xs "> Postcode</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-action pull-right">
                                                            <a href="" class="btn btn-md-indigo "> Proceed to pay
                                                                <i class="fa fa-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4 hidden">

                                                    <div class="pricing-content-1">

                                                        <div class="price-column-container border-active">
                                                            <div class="price-table-head bg-blue">
                                                                <h2 class="no-margin">Budget</h2>
                                                            </div>
                                                            <div class="arrow-down border-top-blue"></div>
                                                            <div class="price-table-pricing">
                                                                <h3>
                                                                    <sup class="price-sign">$</sup>24</h3>
                                                                <p>per month</p>
                                                            </div>
                                                            <div class="price-table-content">
                                                                <div class="row mobile-padding">
                                                                    <div class="col-xs-3 text-right mobile-padding">
                                                                        <i class="icon-user"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-left mobile-padding">3 Members</div>
                                                                </div>
                                                                <div class="row mobile-padding">
                                                                    <div class="col-xs-3 text-right mobile-padding">
                                                                        <i class="icon-drawer"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-left mobile-padding">50GB Storage</div>
                                                                </div>
                                                                <div class="row mobile-padding">
                                                                    <div class="col-xs-3 text-right mobile-padding">
                                                                        <i class="icon-screen-smartphone"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-left mobile-padding">Single Device</div>
                                                                </div>
                                                                <div class="row mobile-padding">
                                                                    <div class="col-xs-3 text-right mobile-padding">
                                                                        <i class="icon-refresh"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                                                </div>
                                                            </div>
                                                            <div class="arrow-down arrow-grey"></div>
                                                            <div class="price-table-footer">
                                                                <button type="button" class="btn grey-salsa btn-outline font-weight-600  price-button">Choose Another Package</button>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="tab-pane form" id="tab_payment">
                                            <form action="" class="form-horizontal">
                                                <!-- Later -->
                                                <div class="row mx-0 hidden">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-md-radios">

                                                            <label>Choose Payment Option</label>
                                                            <div class="md-radio-inline">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="radio14" name="radio2" class="md-radiobtn" href="#tab_credit" data-toggle="tab">
                                                                        <label for="radio14">
                                                                            <span class="inc"></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Option 1 </label>
                                                                    </div>
                                                                    <div class="md-radio has-error">
                                                                        <input type="radio" id="radio15" name="radio2" class="md-radiobtn" checked="" href="#tab_fpx" data-toggle="tab">
                                                                        <label for="radio15">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Option 2 </label>
                                                                    </div>
                                                                    <div class="md-radio has-warning">
                                                                        <input type="radio" id="radio16" name="radio2" class="md-radiobtn" target="#tab_paypal" data-toggle="tab">
                                                                        <label for="radio16">
                                                                            <span class="inc"></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Option 3 </label>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="md-radio ">
                                                        <input type="radio" id="radio1001" name="radio200" class="md-radiobtn " target="#tab_credit">
                                                        <label for="radio6" class="vertical-middle">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Credit Or Debit Card
                                                            <ul class="list-unstyled list-inline px-0 hidden">
                                                                <li class="px-0">
                                                                    <img src="../HTML/img/Xremo/ipay88/visa.gif" class="mt-height-40-xs">
                                                                </li>
                                                                <li class="px-0">
                                                                    <img src="../HTML/img/Xremo/ipay88/mastercard.gif" class="mt-height-40-xs">
                                                                </li>
                                                                <li class="px-0">
                                                                    <img src="../HTML/img/Xremo/ipay88/amex.gif" class="mt-height-40-xs">
                                                                </li>
                                                            </ul>
                                                        </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="radio1002" name="radio200" class="md-radiobtn" target="#tab_fpx">
                                                        <label for="radio7">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Online Banking (FPX) </label>
                                                    </div>

                                                    <div class="md-radio">

                                                        <input type="radio" id="radio1003" name="radio200" class="md-radiobtn" checked="checked" data-toggle="tab" target="#tab_paypal">
                                                        <label for="radio8">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Paypal </label>
                                                    </div> -->
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="tab_paypal">
                                                                        <div class="portlet light">
                                                                            <div class="portlet-title">try</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane " id="tab_credit">
                                                                        <div class="portlet light">
                                                                            <div class="portlet-title">credt</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane " id="tab_fpx">
                                                                        <div class="portlet light">
                                                                            <div class="portlet-title">fpx</div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_complete"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions ">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> Back </a>
                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-outline green button-next first" style="display:none"> Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="javascript:;" class="btn green button-submit"> Submit
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- END CONTAINER -->
        </div>