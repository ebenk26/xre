</div>
    <!-- END CONTAINER -->

	<?php $this->load->view('main/footer_app');?>

    <link href="<?php echo JS; ?>plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo JS_STUDENTS; ?>jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-ui/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="<?php echo JS; ?>plugins/autocomplete.js"></script> 
    <script src="<?php echo JS_EMPLOYER; ?>datatable.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>moment.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>daterangepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>morris.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>raphael-min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>amcharts.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>serial.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>pie.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>radar.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>light.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>patterns.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>chalk.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>ammap.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>worldLow.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>amstock.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>horizontal-timeline.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.flot.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo JS_STUDENTS; ?>app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
	
	<script src="<?php echo JS_EMPLOYER; ?>table-datatables-managed.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>calendar.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>fullcalendar.min.js" type="text/javascript"></script>
	<!-- <script src="<?php echo JS_EMPLOYER; ?>wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="<?php echo JS_EMPLOYER; ?>bootstrap-wysihtml5.js" type="text/javascript"></script> -->
	<script src="<?php echo JS_EMPLOYER; ?>components-editors.js" type="text/javascript"></script>

	
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo JS_STUDENTS; ?>dashboard.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.repeater.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>form-repeater.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>form-image-crop.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-tagsinput.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo JS_STUDENTS; ?>layout.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>demo.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>quick-sidebar.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>quick-nav.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    <script src="<?php echo JS_EMPLOYER; ?>sweetalert.min.js" type="text/javascript"></script>
    <link href="<?php echo CSS_EMPLOYER; ?>sweetalert.css" rel="stylesheet" type="text/css">
    <!-- END THEME LAYOUT SCRIPTS -->

    <!-- BEGIN TINY MCE EDITOR SCRIPTS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
    <!-- END TINY MCE EDITOR SCRIPTS --> 

    <script>
        function searchSolr(id,form){
            if(typeof(form)=='undefined'){var formid=""; }else{ var formid = "#"+form;}
            $(formid+" #"+id).autocomplete($(formid+" #"+id).attr('url'), {maxdata:50, selectFirst: false, width: "200px", tops: "27px", lefts: "123px", scrollHeight: "260px", delay:false, divResult:"#search_company"});
            $(formid+" #"+id).result(function(event, data, formatted){
                console.log(data);
                if(data){
                    $('#company').val(data[0]);
                }
            });    
        }

        $(document).ready(function () {
            //EDIT ARTICLE
			$( ".edit_button_article" ).on( "click", function() {
				$('#featured_image_article').hide();
				var row_id = this.id;
				var res = row_id.split("_");
				
				row_id = res[1];
				$.ajax({
					url:"<?=base_url();?>administrator/article/get_data_array/"+row_id,
					method:"POST",
					success:function(response) {
						var data = JSON.parse(response);
						$('#title_article').val(data.title);
						$('#author_article').val(data.author);
						$('#excerpt_article').val(data.excerpt);
						$('#tags_article').val(data.tags);
						//$('#body_article').text(data.body);
						$(tinymce.get('body_article').getBody()).html(data.body);
						//tinymce.get('#body_article').setContent(data.body);
						$('#id_article').val(data.id);
					   
						if(data.featured_image != ""){
							$('#featured_image_article').attr('src', "<?=base_url()?>assets/img/article/"+data.featured_image);
							$('#featured_image_article').show();   
						}
					}
				});
			});
			
            // $('#company').autocomplete({
            //     source: "<?php echo base_url();?>administrator/job_board/get_company",
      
            //     select: function (event, ui) {
            //         $('#company').text(ui.item.label); 
            //         $('#company').val(ui.item.id); 
            //     }
            // });



			//EDIT JOB POST
			$( ".edit_button_job" ).on( "click", function() {
				//$('#featured_image_article').hide();
				var row_id = this.id;
				var res = row_id.split("_");
				
				row_id = res[1];
				$.ajax({
					url:"<?=base_url();?>administrator/job_board/get_data_array/"+row_id,
					method:"POST",
					success:function(response) {
						var data = JSON.parse(response);
						
						$('#name_job').val(data.name);
						$('#budget_min_job').val(data.budget_min);
						$('#budget_max_job').val(data.budget_max);
						$('#employment_type_id_job').val(data.employment_type_id);
						$('#position_level_id_job').val(data.position_level_id);
						$('#years_of_experience_job').val(data.years_of_experience);						
						$(tinymce.get('job_description_job').getBody()).html(data.job_description);
						$(tinymce.get('qualifications_job').getBody()).html(data.qualifications);
						$(tinymce.get('other_requirements_job').getBody()).html(data.other_requirements);
						$(tinymce.get('additional_info_job').getBody()).html(data.additional_info);						
						$('#job_id_job').val(data.id);
					}
				});
			});
			
			tinymce.init({
				selector: '.textarea_editor',
				height: 400,
				theme: 'modern',
				plugins: 'code advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools codesample toc',
				toolbar1: 'code undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
				toolbar2: 'print preview media | fontsizeselect forecolor backcolor emoticons | codesample',
				fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
				image_advtab: true,
				templates: [
					{ title: 'Test template 1', content: 'Test 1' },
					{ title: 'Test template 2', content: 'Test 2' }
				],
				content_css: [
					'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
					'//www.tinymce.com/css/codepen.min.css'
				]
			});

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

            var f = $(".xremo_table");
            f.dataTable({
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
			
            $('#DOB').datepicker({
                format:'dd-mm-yyyy',
                autoclose: true,
            });


            $(".date-picker-start").datepicker({
                format:'dd-mm-yyyy',
                todayBtn:  1,
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('.date-picker-end').datepicker('setStartDate', minDate);
            });
            
            $(".date-picker-end").datepicker({
                format:'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function (selected) {
                    var minDate = new Date(selected.date.valueOf());
                    $('.date-picker-start').datepicker('setEndDate', minDate);
                });

            $(".date-picker-start").keyup(function() {
                if (!this.value) {
                    $(this).datepicker("clearDates");
                }
            });

            $(".date-picker-end").keyup(function() {
                if (!this.value) {
                    $(this).datepicker("clearDates");
                }
            });
        
            
            $('.md-check').change(function(){
                if(this.checked) {
                    $('.input-date-picker-end').prop( "disabled", true );
                }else{
                    $('.input-date-picker-end').removeAttr( "disabled" );
                }
            });
            
            <?php if($this->session->flashdata('msg_success')){ ?>
                alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 5);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
                alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
            <?php } ?>
            
            $(".btn-delete").click( function () {
                var data = $(this).attr('data-value');
                var table = $(this).attr('tb-val');
                alertify.confirm('Delete From List', 'Are you sure you want to delete?', function(){ 
                    $.post("<?php echo base_url(); ?>student/profile/delete/", {id : data, table: table}, function(data) {
                        if(data == "false") {
                            alertify.error('Failed to delete record');
                        } else {
                            alertify.success('Record is deleted.');
                            location.reload();
                        }
                    });
                }, function(data){
                     alertify.error('Cancel');
                });
            });
            $('.apply').click(function () {
                var apply = $(this).attr('id');
                    swal({
                        title: "Are you sure?",
                        text: "You will apply this as your dream job",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Apply",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url:"<?php echo base_url();?>student/dashboard/applied",
                                    method:"POST",
                                    data: {
                                      job_id: parseInt(apply),
                                    },
                                    success:function(response) {
                                       swal("Sucess", "Success apply your dream job.", "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "This job is not fit for you", "error");
                            }
                        }
                    );
            });
            $('.sendMail').click(function () {
                var email = $(this).attr('data-email');
                var user = $(this).attr('data-name');
                    swal({
                        title: "Are you sure?",
                        text: "You will send email to "+email,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Send",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url:"<?php echo base_url();?>administrator/sendMail/send",
                                    method:"POST",
                                    data: {
                                      email: email,
                                      user : user,
                                    },
                                    success:function(response) {
                                       swal("Sucess", "Success send email to "+email, "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "You cancel sending mail to "+email, "error");
                            }
                        }
                    );
            });
            $('.dlt-history').click(function () {
                var apply = $(this).attr('data-id');
                    swal({
                        title: "Are you sure you want to withdraw?",
                        text: "You withdraw from this job",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "withdraw",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                console.log(apply);
                                console.log('<?php echo base_url();?>student/applications_history/withdraw');
                                $.ajax({
                                    url:"<?php echo base_url();?>student/applications_history/withdraw",
                                    method:"POST",
                                    data: {
                                      job_id: parseInt(apply),
                                    },
                                    success:function(response) {
                                       swal("Sucess", "Success withdraw this job.", "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "This job still fit for you", "error");
                            }
                        }
                    );
            });
        });
        
        //Allow live edit for code in Tiny.mce Editor
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });

        $('.remove').click(function () {
                var obj_key = $(this).attr('key');
                    swal({
                        title: "Are you sure?",
                        text: "You will remove this translation",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Remove",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url:"<?php echo base_url();?>administrator/translation/delete",
                                    method:"POST",
                                    data: {
                                      key: obj_key,
                                    },
                                    success:function(response) {
                                       swal("Sucess", "Success remove translation.", "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "You Cancelled remove the translation", "error");
                            }
                        }
                    );
            });

        $('.removeVoucher').click(function () {
            var obj_key = $(this).attr('key');
                swal({
                    title: "Are you sure?",
                    text: "You will remove this Voucher",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Remove",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false 
                },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url:"<?php echo base_url();?>administrator/tracking/delete",
                                method:"POST",
                                data: {
                                  key: obj_key,
                                },
                                success:function(response) {
                                   swal("Sucess", "Success remove translation.", "success");
                                   location.reload();
                                }
                              })
                        } else {
                            swal("Cancelled", "You Cancelled remove the translation", "error");
                        }
                    }
                );
        });

    </script>



</body></html>