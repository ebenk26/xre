    </div>
    <!-- END CONTAINER -->

	<?php $this->load->view('main/footer_app');?>

    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo JS_EMPLOYER; ?>jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo JS_EMPLOYER; ?>datatable.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>moment.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>daterangepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>clockface.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.color.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.Jcrop.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>handlebars.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>typeahead.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>autosize.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery.repeater.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>summernote.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-tabdrop.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>morris.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>raphael-min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    <script src="<?php echo JS_EMPLOYER; ?>sweetalert.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS_EMPLOYER; ?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>portfolio-3.js" type="text/javascript"></script>
    <link href="<?php echo CSS_EMPLOYER; ?>sweetalert.css" rel="stylesheet" type="text/css">
    <script src="<?php echo JS_EMPLOYER; ?>markdown.js" type="text/javascript"></script>
	<script src="<?php echo JS_EMPLOYER; ?>wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-markdown.js" type="text/javascript"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo JS_EMPLOYER; ?>app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- <script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script> -->
    <script src="<?php echo JS_EMPLOYER; ?>table-datatables-managed.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>calendar.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>fullcalendar.min.js" type="text/javascript"></script>
    <!-- <script src="../assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script> -->

    <script src="<?php echo JS_EMPLOYER; ?>dashboard.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>form-repeater.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>form-image-crop.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>components-bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>ui-modals.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>components-editors.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>ui-sweetalert.min.js" type="text/javascript"></script>


    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo JS_EMPLOYER; ?>layout.min.js" type="text/javascript"></script>
    <!-- <script src="../assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script> -->
    <script src="<?php echo JS_EMPLOYER; ?>quick-sidebar.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function () {
            var e = $("#xremo_table");
			e.dataTable({
				language: {
					aria: {
						sortAscending: ": activate to sort column ascending",
						sortDescending: ": activate to sort column descending"
					},
					emptyTable: "No data available in table",
					info: "Showing _START_ to _END_ of _TOTAL_ records",
					infoEmpty: "No records found",
					infoFiltered: "(filtered1 from _MAX_ total records)",
					lengthMenu: "Show _MENU_",
					search: "Search:",
					zeroRecords: "No matching records found",
					paginate: {
						previous: "Prev",
						next: "Next",
						last: "Last",
						first: "First"
					}
				},
				bStateSave: !0,
				lengthMenu: [
					[5, 15, 20, -1],
					[5, 15, 20, "All"]
				],
				pageLength: 5,
				pagingType: "bootstrap_full_number",
				columnDefs: [{
					orderable: !1,
					targets: [0]
				}, {
					searchable: !1,
					targets: [0]
				}, {
					className: "dt-right"
				}],
				order: [
					//[1, "asc"]
				]
			});
			
			$('#clickmewow').click(function () {
                $('#radio1003').attr('checked', 'checked');
            });
            $('#preview_button_add').click(function(){
                $('#job_status_add').val('draft');
            });
            $('#submit_button_add').click(function(){
                $('#job_status_add').val('post');
            });

            $('.user-btn').click(function(){
                var id = $(this).attr('uid');
                var image_directory = window.location.origin+'/xremo/assets/img/student/';
                $.ajax({
                    url:"<?php echo base_url();?>employer/profile/detail_profile",
                    method:"POST",
                    data: {
                      user_id: id,
                    },
                    success:function(response) {
                        var student = JSON.parse(response);
                        var academics = '';
                        var project = '';
                        var non_academics = '';
                        var experience = '';

                        $.each(student.user_profile.academics,function(i,v){
                            var academic_date = new Date(v.start_date); 
                            academics +=    '<ul class="list-unstyled">\
                                                <li>\
                                                    <h5 class="font-weight-700">\
                                                        <small>'+v.start_date+' - '+v.end_date+'</small>\
                                                    </h5>\
                                                    <h6 class="font-weight-600 text-uppercase ">'+v.university_name+'</h6>\
                                                </li>\
                                            </ul>';
                        });

                        $.each(student.user_profile.projects,function(i,v){
                            project += '<ul class="list-unstyled">\
                                        <li>\
                                            <h5 class="font-weight-700"> '+v.name+' </h5>\
                                            <h6>'+v.skills_acquired+'</h6>\
                                        </li>\
                                    </ul>';
                        });

                        $.each(student.user_profile.achievement,function(i,v){
                            non_academics +=    '<li>\
                                                    <h5 class="font-weight-700">'+v.achievement_title+'\
                                                        <small>'+v.achievement_end_date+'</small>\
                                                    </h5>\
                                                </li>';
                        });

                        $.each(student.user_profile.experiences,function(i,v){
                            experience +=   '<li>\
                                                <h5 class="font-weight-700">'+v.experiences_title+'\
                                                    <small>'+v.experiences_start_date+' - '+v.experiences_end_date+'</small>\
                                                </h5>\
                                                <h6 class="font-weight-600 text-uppercase ">'+v.experiences_company_name+'</h6>\
                                            </li>';
                        });
                         
                        $('#modal_view_summary').html('<div class="modal-dialog modal-lg">\
                                        <div class="modal-content ">\
                                            <div class="modal-header md-indigo">\
                                                <div class="media">\
                                                    <div class="pull-left">\
                                                        <img src="'+image_directory+student.user_profile.profile_photo+'" alt="" class="avatar avatar-circle avatar-tiny avatar-border-sm  ">\
                                                    </div>\
                                                    <div class="pull-right">\
                                                        <a data-dismiss="modal" aria-hidden="true" class="md-white-text font-28-xs">\
                                                            <i class="fa fa-close"></i>\
                                                        </a>\
                                                    </div>\
                                                    <div class="media-body">\
                                                        <h3 class="md-white-text font-weight-500 letter-space-xs mt-3">'+student.user_profile.overview.name+'</h3>\
                                                        <ul class="list-inline list-unstyled md-white-text ">\
                                                            <li>\
                                                                <i class="icon-pointer"></i>'+student.user_profile.address.city+' ,'+student.user_profile.address.states+'</li>\
                                                            <li>\
                                                                <i class="icon-envelope"></i>'+student.user_profile.overview.email+'</li>\
                                                        </ul>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class="modal-body">\
                                                <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">\
                                                    <div class="row">\
                                                        <div class="col-md-12 pr-0">\
                                                            <h5 class="font-weight-700 text-uppercase">Tell Me About Yourselves</h5>\
                                                            <p class="mt-0">'+student.user_profile.overview.summary+'</p>\
                                                        </div>\
                                                    </div>\
                                                    <hr class="hidden-sm">\
                                                    <div class="row">\
                                                        <div class="col-md-6">\
                                                            \
                                                            <div class="portlet ">\
                                                                <div class="portlet-title ">\
                                                                    <div class="caption">\
                                                                        <i class="icon-graduation"></i>\
                                                                        <span class="caption-subject font-26-xs"> Education</span>\
                                                                        <span class="caption-helper">Summary</span>\
                                                                    </div>\
                                                                    <div class="tools">\
                                                                        <a href="" class="collapse" data-original-title="" title=""> </a>\
                                                                    </div>\
                                                                </div>\
                                                                <div class="portlet-body ">\
                                                                '+academics+'\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="col-md-6">\
                                                            <div class="portlet  ">\
                                                                <div class="portlet-title ">\
                                                                    <div class="caption">\
                                                                        <i class="icon-trophy"></i>\
                                                                        <span class="caption-subject font-26-xs">Achievement</span>\
                                                                        <span class="caption-helper">Summary</span>\
                                                                    </div>\
                                                                    <div class="tools">\
                                                                        <a href="" class="collapse" data-original-title="" title=""> </a>\
                                                                    </div>\
                                                                </div>\
                                                                <div class="portlet-body">\
                                                                    <ul class="list-unstyled">\
                                                                        '+non_academics+'\
                                                                    </ul>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                    <div class="row">\
                                                        <div class="col-md-6">\
                                                            \
                                                            <div class="portlet">\
                                                                <div class="portlet-title">\
                                                                    <div class="caption">\
                                                                        <i class="icon-badge"></i>\
                                                                        <span class="caption-subject font-26-xs">Project</span>\
                                                                        <span class="caption-helper">Summary</span>\
                                                                    </div>\
                                                                    <div class="tools">\
                                                                        <a href="" class="collapse" data-original-title="" title=""> </a>\
                                                                    </div>\
                                                                </div>\
                                                                <div class="portlet-body  ">\
                                                                    '+project+'\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="col-md-6">\
                                                            \
                                                            <div class="portlet">\
                                                                <div class="portlet-title">\
                                                                    <div class="caption">\
                                                                        <i class="icon-briefcase"></i>\
                                                                        <span class="caption-subject font-26-xs"> Experience</span>\
                                                                        <span class="caption-helper">Summary</span>\
                                                                    </div>\
                                                                    <div class="tools">\
                                                                        <a href="" class="collapse" data-original-title="" title=""> </a>\
                                                                    </div>\
                                                                </div>\
                                                                <div class="portlet-body ">\
                                                                    <ul class="list-unstyled">\
                                                                        '+experience+'\
                                                                    </ul>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class="modal-footer ">\
                                                <a href="" class="btn btn-md-amber">\
                                                    <i class="icon-star"></i> Add Shortlist\
                                                </a>\
                                                <a href="" class="btn btn-md-cyan">\
                                                    <i class="icon-users"></i> View Resume\
                                                </a>\
                                                <a href="" class="btn btn-md-red">\
                                                    <i class="icon-trash"></i> Reject\
                                                </a>\
                                            </div>\
                                            \
                                        </div>\
                                        \
                                    </div>');
                        $('#modal_view_summary').modal('show', {backdrop: 'static'});
                    }
                })
            });

            $('.dlt-btn').click(function () {
                var del = $(this).attr('id');
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this post",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url:"<?php echo base_url();?>employer/job_board/delete",
                                    method:"POST",
                                    data: {
                                      post_id: parseInt(del),
                                    },
                                    success:function(response) {
                                       swal("Deleted", "Your Post has been deleted.", "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "Your Post is safe", "error");
                            }
                        }
                    );

                    <?php if($this->session->flashdata('msg_success')){ ?>
                        alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 5);
                    <?php } ?>
                    <?php if($this->session->flashdata('msg_failed')){ ?>
                        alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
                    <?php } ?>
            });

            $('.shortlist-btn').click(function () {
                var id = $(this).attr('app-id');
                    $.ajax({
                        url:"<?php echo base_url();?>employer/job_board/shortlist",
                        method:"POST",
                        data: {
                          post_id: id,
                        }
                    });
                    

                    <?php if($this->session->flashdata('msg_success')){ ?>
                        alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 5);
                    <?php } ?>
                    <?php if($this->session->flashdata('msg_failed')){ ?>
                        alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
                    <?php } ?>
                    
                location.reload();
            });

            $('.reject-btn').click(function () {
                var id = $(this).attr('app-id');
                    $.ajax({
                        url:"<?php echo base_url();?>employer/job_board/reject",
                        method:"POST",
                        data: {
                          post_id: id,
                        }
                    });
                    
                    <?php if($this->session->flashdata('msg_success')){ ?>
                        alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 5);
                    <?php } ?>
                    <?php if($this->session->flashdata('msg_failed')){ ?>
                        alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
                    <?php } ?>
                    
                location.reload();
            });

            $('.reject-candidate').click(function(){
                var del = $(this).attr('data-id');
                    swal({
                        title: "Do you reject this candidate?",
                        type: "info",
                        confirmButtonText: "Yes, I agree",
                        closeOnConfirm: false
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url:"<?php echo base_url();?>employer/job_board/reject",
                                    method:"POST",
                                    data: {
                                      post_id: parseInt(del),
                                    },
                                    success:function(response) {
                                       swal("Success", "Candidate has been rejected.", "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "Reject candidate has been cancelled", "error");
                            }
                        }
                    );
            });

            $('.invite-candidate').click(function(){
                var candidate = $(this).attr('candidate-id');
                var job = $(this).attr('job-id');
                var interview = $(this).attr('interview-id');

                if (interview == null) {
                    
                    swal('Error', 'Please create an interview session before you can invite');

                }else{

                    swal({
                            title: "Do you want to invite this candidate?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes",
                            cancelButtonText: "Cancel",
                            closeOnConfirm: false,
                            closeOnCancel: false,
                        },
                            function(isConfirm) {
                                if (isConfirm) {
                                    $.ajax({
                                        url:"<?php echo base_url();?>employer/job_board/single_invitation",
                                        method:"POST",
                                        data: {
                                          candidate_id: candidate,
                                          job_id: job,
                                          interview_id: interview,
                                        },
                                        success:function(response) {
                                           swal("Success", "Candidate has been invited.", "success");
                                           location.reload();
                                        }
                                      })
                                } else {
                                    swal("Cancelled", "Invitation has been cancelled", "error");
                                }
                            }
                        );
                }

            });

            <?php if($this->session->flashdata('msg_success')){ ?>
                alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 5);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
                alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
            <?php } ?>
        })
    </script>


</body></html>