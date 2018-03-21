        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> Gallery </h1>

                <!-- END PAGE HEADER-->

                <!-- version 1 -->
                <div class="row ">
                    <div class="col-xs-12">
                        <div class="portlet ">
                            <div class="portlet light ">
                                <div class="portlet-title ">
                                    <!--<div class="caption font-green-sharp">
                                        <i class="icon-briefcase font-green-sharp"></i>
                                        <span class="caption-subject"> Employer</span>
                                    </div>-->
                                    <div class="actions">
                                        <a href="#modal_add" class="btn btn-md-blue" data-toggle="modal">
                                            <i class="fa fa-plus"></i> Add Gallery Photo 
                                        </a>
                                    </div>
                                </div>
                                <!-- Tab Content -->
                                <div class="portlet-body ">
                                    

                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-striped table-bordered table-hover order-column" id="xremo_table">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th class="col-md-1 text-center"> # </th>
                                                    <th class="col-md-2"> Photo </th>
                                                    <th class="col-md-2 text-center"> Title </th>
                                                    <th class="col-md-2 text-center"> Description </th>
                                                    <th class="col-md-2 text-center"> Uploaded On </th>
                                                    <th class="col-md-1 text-center"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; foreach ($gallery as $key => $value) { ?>
                                                    <tr>
                                                        <td class="text-center"> <?php echo $i; ?> </td>
                                                        <td class="media">
                                                            <div class="pull-left">
                                                                <img src="<?php echo base_url()."assets/img/gallery/".$value['photo']; ?>" alt="" height="200" width="200" style="border-radius: 5px;">
                                                            </div>
                                                        </td>
                                                        <td class="text-center"> <?php echo $value['title']; ?> </td>
                                                        <td class="text-center"> <?php echo $value['description']; ?> </td>
                                                        <td class="text-center"> <?php echo date('j F Y H:i', strtotime($value['created_at'])); ?> </td>
                                                        <td class="text-center">
                                                            <a href="#modal_edit" id="edit_<?=$value['id'] ?>" class="btn btn-icon-only blue edit_button_gallery" data-toggle="modal" title="Edit" style="margin-right:0;">
                                                                <i class="fa fa-edit"></i> 
                                                            </a>

                                                            <a href="#modal_delete_<?=$value['id'] ?>" class="btn btn-icon-only red" data-toggle="modal" title="Delete" style="margin-right:0;">
                                                                <i class="fa fa-remove"></i> 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($gallery as $key => $value) { ?>
            <!-- BEGIN MODAL : Create Employer -->
            
            <div id="modal_delete_<?=$value['id']?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h4 class="modal-title">Delete Photo</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>student/gallery/delete" method="POST">
                                <div class="form-body">
                                    <h4>Are you sure?</h4><br>
                                </div>
                                <input type="hidden" name="id" value="<?=$value['id']?>"></input>
                                <input type="hidden" name="photo" value="<?=$value['photo']?>"></input>
                                
                                <div class="modal-footer form-action ">
                                    <button type="submit" class="btn btn-md-red  mt-width-150-xs font-20-xs letter-space-xs">Delete</button>
                                    <a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- EDIT -->
        <div class="modal fade in" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content portlet light">
                    <div class="modal-header portlet-title">
                        <div class="caption">
                            <span class="caption-subject text-capitalize font-weight-500">Edit Photo</span>
                        </div>
                        <div class="actions py-4">
                            <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </div>
                    </div>
                    <form action="<?php echo base_url();?>student/gallery/post" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                        <div class="modal-body portlet-body ">   
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
                                <div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: auto;">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" id="title_gallery" class="form-control" placeholder="Title" value="">
                                    </div>
                                </div>
                                <!-- Description -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="4" placeholder="Description." name="description" id="description_gallery"></textarea>
                                    </div>
                                </div>

                                <style type="text/css">
                                    #yourIdEdit {
                                        width: 500px;
                                        height: 500px;
                                        position:relative; /* or fixed or absolute */
                                        border: 1px solid #ccc;
                                    }
                                </style>

                                <!-- Photo Upload -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Current Photo</label>
                                    <div class="col-md-9">
                                        <img src="" width="250px" id="curr_photo"/>
                                    </div>
                                </div>

                                <!-- Photo Upload -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">New Photo</label>
                                    <div class="col-md-9">
                                        <div id="yourIdEdit" class="form-control"></div>
                                        <input type="hidden" name="photo" id="myOutputIdEdit">
                                        <input type="hidden" name="photo_old" id="myOutputIdEditOld">
                                        <input type="hidden" name="id" id="id_gallery" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                            
                            <div class="modal-footer form-action ">
                                <button type="submit" class="btn btn-md-blue  mt-width-150-xs font-20-xs letter-space-xs">Update</button>
                                <a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add  -->
            <div class="modal fade in" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content portlet light">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Add Photo</span>
                                <!-- <span class="caption-helper">add about your education info</span> -->
                            </div>
                            <div class="actions py-4">
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                            </div>

                        </div>
                        <form action="<?php echo base_url();?>student/gallery/post" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                            <div class="modal-body portlet-body ">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
                                    <div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: auto;">
                                        <!-- Institution Name -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Title</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control " placeholder="Title" name="title" required>
                                                <!-- <span class="help-block"> A block of help text.</span> -->
                                            </div>

                                        </div>                                    

                                        <!-- Description -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" rows="4" placeholder="Description." name="description"></textarea>
                                            </div>
                                        </div>

                                        <style type="text/css">
                                            #yourId {
                                                width: 500px;
                                                height: 500px;
                                                position:relative; /* or fixed or absolute */
                                                border: 1px solid #ccc;
                                            }
                                        </style>

                                        <!-- Photo Upload -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Photo</label>
                                            <div class="col-md-9">
                                                <div class="note note-warning">
                                                    <h4 class="block">Note!</h4>
                                                    <ul>
                                                        <li>File type : JPG, PNG</li>
                                                        <li>Max size : 1 MB</li>
                                                        <li>After choosing image, you can drag the image before cropping to get the best part to be shown</li>
                                                        <li>At the end don't forget to click the Crop Button <img src="<?=base_url()?>assets/img/gallery_nav.jpg"/></li>
                                                    </ul>
                                                </div>
                                                <div id="yourId" class="form-control"></div>
                                                <input type="hidden" name="photo" id="myOutputId">
                                                <input type="hidden" name="id" value="0">
                                            </div>
                                            <!--<div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn file-btn">
                                                            <span>Upload</span>
                                                            <input type="file" id="upload" value="Choose a file" accept="image/*" />
                                                        </a>
                                                        <button class="upload-result">Result</button>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="upload-msg">
                                                            Upload a file to start cropping
                                                        </div>
                                                        <div class="upload-demo-wrap">
                                                            <div id="upload-demo"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                    <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" id="button_save_gallery" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                </div>                        
                            </div>
                        </form>
                    </div>
                </div>
            </div>