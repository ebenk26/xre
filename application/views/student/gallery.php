<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Gallery </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo base_url().'student/dashboard'; ?>"><?= !empty($language->site_home) ? $language->site_home : "Home" ?></a>                    
                    <i class="fa fa-angle-right"></i>
                </li>
                <li >
                    <span><?= !empty($language->site_gallery) ? $language->site_gallery : 'Gallery'?></span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <?php if(!empty($gallery)) { ?>
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="actions">
                    <a href="#modal_add" class="btn btn-md-indigo font-12" data-toggle="modal">
                        <i class="icon-camera"></i> Upload Photo
                    </a>
                </div>
            </div>
            <!-- Tab Content -->
            <div class="portlet-body ">
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
                                <img src="<?php echo IMG.'gallery/'.$value['photo']; ?>" class=" avatar avatar-small">
                            </td>
                            <td class="text-center">
                                <?php echo $value['title']; ?> </td>
                            <td class="text-center">
                                <?php echo $value['description']; ?> </td>
                            <td class="text-center">
                                <?php echo date('j F Y H:i', strtotime($value['created_at'])); ?> </td>
                            <td class="center-block">
                                <a href="#modal_edit" id="edit_<?=$value['id'] ?>" class="btn btn-icon-only btn-md-blue edit_button_gallery font-15 mt-display-block mx-auto my-10 tooltips" data-toggle="modal" title="Edit" data-container="body" data-placement="left" data-original-title="Edit Photo">
                                    <i class="icon-pencil"></i>
                                </a>
                                <a href="#modal_delete_<?=$value['id'] ?>" class="btn btn-icon-only btn-md-red font-15 mt-display- mx-auto my-10 tooltips" data-toggle="modal"  data-container="body" data-placement="left" data-original-title="Delete Photo">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } else { ?>
        <!-- # Empty States -->
        <div class="portlet height-600-md height-550-sm height-450 light flex-center mb-0">
            <div class="portlet-body text-center">
                <i class="fa fa-picture-o font-80-md font-70-sm font-60 md-grey-lighten-1-text mb-55-md mb-35-sm mb-15"></i>
                <h5 class="text-center font-weight-600 md-grey-darken-2-text font-22-md font-18">Gallery is empty !</h5>
                <p class="text-center font-weight-400 md-grey-darken-1-text font-16-md font-15-sm font-14">Show prove of your experience in participate activity or event by uploading photo in here.</p>
                <a data-toggle="modal" href="#modal_add" class="btn btn-md-indigo btn-sm mt-30-md mt-25">
                    <i class="icon-camera fa-fw"></i>
                    Upload Photo
                </a>
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
            <form action="<?php echo base_url(); ?>student/gallery/delete" method="POST">
                <div class="modal-body text-center m-40">
                    <img src="<?php echo IMG.'gallery/'.$value['photo']; ?>" class="avatar avatar-big">
                    <h4 class=" font-18 mt-20">Are you sure you want to delete this photo ?</h4>
                    <input type="hidden" name="id" value="<?=$value['id']?>"></input>
                    <input type="hidden" name="photo" value="<?=$value['photo']?>"></input>
                    <div class="mt-40 ">
                    <a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline btn-md-red  letter-space-xs"> No</a>
                    <button type="submit" class="btn btn-md-red width-200 letter-space-xs">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal : Edit -->
<div class="modal fade in" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-in-up ">
            <div class="modal-header">
                <h4 class="modal-title">Edit Photo
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </h4>
            </div>

            <form action="<?php echo base_url();?>student/gallery/post" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                <div class="modal-body pb-0">
                    <div class="row mx-0">
                        <div class="col-md-6 col-sm-12">
                            <!-- Title -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Title</label>
                                <input type="text" name="title" id="title_gallery" class="form-control" placeholder="Title Photo" value="">
                            </div>
                            <!-- Description -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Description</label>
                                <textarea class="form-control autosizeme no-resize" rows="5" placeholder="Describe your photo." name="description" wrap="hard" id="description_gallery"></textarea>
                            </div>
                            <!-- Photo Upload -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Current Photo</label>
                                <br>
                                <img src="" class="img-fluid" id="curr_photo" style="width:150px;" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <style type="text/css">
                                #yourIdEdit {
                                    width: 400px;
                                    height: 382px;
                                    position: relative;
                                    /* or fixed or absolute */
                                    border: 1px solid #ccc;
                                    /* padding-bottom: 50px; */
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
        <div class="modal-content fade-in-up">
            <div class="modal-header">
                <h4 class="modal-title">Upload Photo
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </h4>
            </div>
            <form action="<?php echo base_url();?>student/gallery/post" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                <div class="modal-body pb-0 ">
                    <div class="row mx-0">
                        <div class="col-md-6 col-sm-12">
                            <!-- Title -->
                            <div class="form-group mx-0">
                                <label class="control-label">Title</label>
                                <input type="text" class="form-control " placeholder="Title Photo" name="title" required>
                            </div>
                            <!-- Description -->
                            <div class="form-group mx-0">
                                <label class="control-label">Description</label>
                                <textarea class="form-control no-resize autosizeme" rows="4" placeholder="Describe your photo." name="description"></textarea>
                            </div>
                            <div class="well mb-0 ">
                                <h4 class="mt-0 md-red-text font-weight-600">Note </h4>
                                <ul class="list-style-circle px-35">
                                    <li class "font-15 ">File type : JPG, PNG</li>
                                    <li class "font-15 ">Max size : 1 MB</li>
                                    <li class "font-15 ">After choosing image, you can drag the image before cropping to get the best part to be shown</li>
                                    <li class "font-15 ">At the end don't forget to click the Crop Button
                                        <img src="<?=base_url()?>assets/img/gallery_nav.jpg" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <style type="text/css">
                                #yourId {
                                    width: 400px;
                                    height: 382px;
                                    position: relative;
                                    /* or fixed or absolute */
                                    border: 1px solid #ccc;
                                }

                            </style>
                            <!-- Photo Upload -->
                            <div class="form-group mx-0">
                                <label class="control-label "> Upload Photo</label>
                                <div id="yourId" class="form-control ">
                                </div>
                                <input type="hidden" name="photo" id="myOutputId">
                                <input type="hidden" name="id" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer form-actions ">
                    <button type="submit" id="button_save_gallery" class="btn btn-md-indigo  width-200">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
