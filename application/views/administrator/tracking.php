        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Tracking
                        <!--<small>Here your job post should be</small>-->
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>administrator/student">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Tracking Voucher</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->

                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Tracking</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="#modal_add" class="btn btn-circle btn-md-indigo" data-toggle="modal">
                                <i class="fa fa-plus"></i> New Tracking </a>                        
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover  order-column xremo_table">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Voucher Code </th>
                                    <th> Company </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($voucher as $key => $value): ?>
                                    <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $value['code'] ?></td>
                                            <td><?= $value['company_name'] ?></td>
                                            <td>                                                
                                                <a href="#modal_edit_<?= $i ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
                                                    <i class="fa fa-edit"></i> 
                                                </a>

                                                <a href="javascript:void(0);" class="btn btn-icon-only red removeVoucher" key="<?= $value['id'] ?>" title="Remove" style="margin-right:0;">
                                                    <i class="fa fa-remove"></i> 
                                                </a>
                                            </td>
                                    </tr>                                        
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        
        <?php $i = 1; foreach ($voucher as $key => $value) {?>
            <div id="modal_edit_<?= $i; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header ">
                            <h4 class="modal-title">Edit Tracking Referral</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>administrator/tracking/update" method="POST">
                                <div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
                                <input type="hidden" name="voucher_id" value="<?= $value['id']?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Voucher Code</label>
                                        <input type="text" name="voucher" class="form-control" placeholder="" value="<?=!empty($value['code']) ? $value['code'] : '' ?>"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Company Name</label>
                                        <input type="text" name="company" class="form-control" placeholder="" value="<?=!empty($value['company_name']) ? $value['company_name'] : '' ?>"> 
                                    </div>            
                                </div>
                                </div>
                                <div class="modal-footer form-action ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        <?php $i++;} ?>

        <div id="modal_add" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header ">
                            <h4 class="modal-title">Add New Tracking Referral </h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>administrator/tracking/post/" method="POST">
                                <div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Referral Code</label>
                                        <input type="text" name="voucher" class="form-control" placeholder="Referral Code" > 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Company</label>
                                        <input type="text" name="company" class="form-control" placeholder="Company"> 
                                    </div>                                  
                                </div>
                                </div>
                                <div class="modal-footer form-action ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>