</div>
    <!-- END CONTAINER -->

    <?php $this->load->view('main/footer_app');?>

    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo JS_STUDENTS; ?>jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
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
    <script>
        $(document).ready(function () {
            
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
                                $.ajax({
                                    url:"<?php echo base_url();?>student/applications_history/withdraw",
                                    method:"POST",
                                    data: {
                                      job_id: parseInt(apply),
                                    },
                                    success:function(response) {
                                        console.log(response);
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

            $("#searchable_detail").bootstrapSwitch(
            {
                size:'mini',
                onSwitchChange:function(event, state)
                {
                    var parentClass         = $(this).parent().parent();
                    var searchable_detail   = 0;

                    if(parentClass.hasClass('bootstrap-switch-on'))
                    {
                        searchable_detail = 1;
                    }

                    $.ajax({
                        url:"<?php echo base_url();?>student/settings/changeSearchableDetail",
                        method:"POST",
                        data: {
                          status    : searchable_detail
                        },
                        success:function(response)
                        {
                            if(searchable_detail == 1)
                            {
                                swal("Success", "Your contact detail are now searchable to employers.", "success");
                            }
                            else
                            {
                                swal("Success", "Your contact detail are now unavailable to employers.", "success");
                            }
                        }
                    });
                }
            });

            $("#searchable").bootstrapSwitch(
            {
                size:'mini',
                onSwitchChange:function(event, state)
                {
                    var parentClass         = $(this).parent().parent();
                    var searchable   = 0;

                    if(parentClass.hasClass('bootstrap-switch-on'))
                    {
                        searchable = 1;
                    }

                    $.ajax({
                        url:"<?php echo base_url();?>student/settings/changeSearchable",
                        method:"POST",
                        data: {
                          status    : searchable
                        },
                        success:function(response)
                        {
                            if(searchable == 1)
                            {
                                swal("Success", "Your contact are now unavailable to employers.", "success");
                                $("#searchable_detail_content").addClass('hidden');
                                $('#searchable_detail').bootstrapSwitch('state', false);
                            }
                            else
                            {
                                swal("Success", "Your contact are now searchable to employers.", "success");
                                $("#searchable_detail_content").removeClass('hidden');
                            }
                        }
                    });
                }
            });
        })
    </script>



</body></html>