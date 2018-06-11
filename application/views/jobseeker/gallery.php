<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Gallery </h1>
        <!-- END PAGE HEADER-->
        <?php if(!empty($gallery)) { ?>
        <div class="portlet light ">
            <div class="portlet-title ">
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
                            <tr class="">
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
                                <td class="text-center">
                                    <?php echo $i; ?> </td>
                                <td class="media">
                                    <div class="pull-left">
                                        <img src="<?php echo IMG.'gallery/'.$value['photo']; ?>" class=" avatar  avatar-medium rounded-5">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php echo $value['title']; ?> </td>
                                <td class="text-center">
                                    <?php echo $value['description']; ?> </td>
                                <td class="text-center">
                                    <?php echo date('j F Y H:i', strtotime($value['created_at'])); ?> </td>
                                <td class="text-center">
                                    <a href="#modal_edit" id="edit_<?=$value['id'] ?>" class="btn btn-icon-only btn-md-blue edit_button_gallery" data-toggle="modal" title="Edit" style="margin-right:0;">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="#modal_delete_<?=$value['id'] ?>" class="btn btn-icon-only btn-md-red" data-toggle="modal" title="Delete" style="margin-right:0;">
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
        <?php } else { ?>
        <div class="portlet p-120 md-grey-lighten-5 light">
            <div class="portlet-body ">
                <h2 class="text-center font-weight-500 md-indigo-text mt-50"> It's Empty ... </h2>
                <h5 class="text-center font-18 font-grey-cascade mt-30"> Click button below to add new image. </h5>
                <div class="width-300 center-block mt-30">
                    <a href="#modal_add" data-toggle="modal" class="btn btn-outline btn-md-indigo btn-block mb-50">
                        <i class="icon-camera mr-2"></i> Add Image</a>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<!-- Modal : Delete -->
<?php foreach ($gallery as $key => $value) { ?>
<div id="modal_delete_<?=$value['id']?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content fade-in-up">
            <div class="modal-header ">
                <h4 class="modal-title">Delete Photo</h4>
            </div>
            <form action="<?php echo base_url(); ?>jobseeker/gallery/delete" method="POST">
                <div class="modal-body ">
                    <h4 class="my-40">Are you sure delete this
                        <?php echo $value['title']; ?> ?
                    </h4>
                    <input type="hidden" name="id" value="<?=$value['id']?>"></input>
                    <input type="hidden" name="photo" value="<?=$value['photo']?>"></input>
                </div>
                <div class="modal-footer mx-0 px-30">
                    <a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline btn-md-red  letter-space-xs">Cancel</a>
                    <button type="submit" class="btn btn-md-red width-200 letter-space-xs">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal : Edit -->
<div class="modal fade in" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content portlet light fade-in-up portlet-fit">
            <div class="modal-header portlet-title">
                <div class="caption">
                    <span class="caption-subject text-capitalize font-weight-500">Edit Photo</span>
                </div>
                <div class="actions py-4">
                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                </div>
            </div>
            <form action="<?php echo base_url();?>jobseeker/gallery/post" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                <div class="modal-body portlet-body ">
                    <div class="row mx-0">
                        <div class="col-md-5 col-sm-4">
                            <!-- Title -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Title</label>
                                <input type="text" name="title" id="title_gallery" class="form-control" placeholder="Title" value="">
                            </div>
                            <!-- Description -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Description</label>
                                <textarea class="form-control" rows="5" placeholder="Description." name="description" wrap="hard" id="description_gallery"></textarea>
                            </div>
                            <!-- Photo Upload -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Current Photo</label>
                                <br>
                                <img src="" class="img-fluid" id="curr_photo" style="width:150px;" />
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-8">
                            <style type="text/css">
                                #yourIdEdit {
                                    width: 400px;
                                    height: 400px;
                                    position: relative;
                                    /* or fixed or absolute */
                                    border: 1px solid #ccc;
                                    padding-bottom: 50px;
                                }

                            </style>

                            <!-- Photo Upload -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">New Photo</label>
                                <div id="yourIdEdit" class="form-control"></div>
                                <input type="hidden" name="photo" id="myOutputIdEdit">
                                <input type="hidden" name="photo_old" id="myOutputIdEditOld">
                                <input type="hidden" name="id" id="id_gallery" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer form-action ">
                    <a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                    <button type="submit" class="btn btn-md-indigo letter-space-xs width-200">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal : Add  -->
<div class="modal fade in" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content portlet light portlet-fit fade-in-up ">
            <div class="modal-header portlet-title">
                <div class="caption">
                    <span class="caption-subject text-capitalize font-weight-500">Add Photo</span>
                </div>
                <div class="actions py-4">
                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                </div>

            </div>
            <form action="<?php echo base_url();?>jobseeker/gallery/post" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                <div class="modal-body portlet-body ">
                    <div class="row mx-0">
                        <div class="col-md-6 col-sm-3">
                            <!-- Title -->
                            <div class="form-group mx-0">
                                <label class="control-labe">Title</label>
                                <input type="text" class="form-control " placeholder="Title" name="title" required>
                            </div>
                            <!-- Description -->
                            <div class="form-group mx-0">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" rows="4" placeholder="Description." name="description"></textarea>
                            </div>
                            <div class="note note-warning ">
                                <h4 class="block">Note!</h4>
                                <ul>
                                    <li>File type : JPG, PNG</li>
                                    <li>Max size : 1 MB</li>
                                    <li>After choosing image, you can drag the image before cropping to get the best part to be shown</li>
                                    <li>At the end don't forget to click the Crop Button
                                        <img src="<?=base_url()?>assets/img/gallery_nav.jpg" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3">
                            <style type="text/css">
                                #yourId {
                                    width: 410px;
                                    height: 410px;
                                    position: relative;
                                    /* or fixed or absolute */
                                    border: 1px solid #ccc;
                                }

                            </style>

                            <!-- Photo Upload -->
                            <div class="form-group mx-0">
                                <label class="control-label "> Upload Photo</label>
                                <div id="yourId" class="form-control"></div>
                                <input type="hidden" name="photo" id="myOutputId">
                                <input type="hidden" name="id" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer form-actions ">
                        <button type="submit" id="button_save_gallery" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
