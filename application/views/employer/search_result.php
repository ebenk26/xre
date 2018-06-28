<?php if(!empty($searchResult['result'])) {?>
        <div class="row" style="display: flex;flex-wrap: wrap;">
            <?php
                foreach ($searchResult['result'] as $value)
                {
            ?>
                    <div class="col-md-4">
                        <div class="panel view overlay border-none">
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-body media-middle">
                                        <h4 class="font-weight-600 text-uppercase">
                                            <a><?= isset($value->fullname) ? $value->fullname : 'None'; ?></a>
                                        </h4>
                                    </div>
                                    <div class="media-right">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                    </div>
                                </div>
                                <h5>
                                    <?php if(isset($value->title) && !empty($value->title)) {?>
                                            <!-- if experience exist in resume show -->
                                            <i class="icon-briefcase mr-10"></i> 
                                            <?= $value->title; ?>
                                            <br/>
                                    <?php }else{ ?>
                                            <!-- else show latest academic with qualifications in what fields study -->
                                            <i class="icon-graduation mr-10"></i>
                                            <?= isset($value->university_name) ? $value->university_name : 'None'; ?>
                                            <br/>
                                </h5>
                                    <?php } ?>
                                <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                    <!-- Job Type -->
                                    <!-- <li>
                                        <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                    </li> -->

                                    <?php if(!empty($value->expected_salary)) {?>
                                        <!-- Salary -->
                                        <li>
                                            <p class="label label-md-green label-sm font-weight-400">
                                                <?= isset($value->expected_salary) ? number_format($value->expected_salary,0,',','.') : 'None'; ?>
                                            </p>
                                        </li>
                                    <?php } ?>

                                    <?php if(!empty($value->location)) {?>
                                        <!-- Location -->
                                        <li>
                                            <p class="label label-md-purple label-sm font-weight-400">
                                                <?= isset($value->location) ? $value->location : 'None'; ?>
                                            </p>
                                        </li>
                                    <?php } ?>

                                    <?php if(!empty($value->start_date) && !empty($value->end_date)) {?>
                                        <!-- Year Of Experience -->
                                        <li class="">
                                            <p class="label label-md-yellow md-black-text label-sm font-weight-400">
                                                <?php
                                                    $endDate = in_array($value->end_date,['0000-00-00','',NULL]) ? date('Y-m-d') : $value->end_date;
                                                    $start_date = new DateTime($value->start_date);
                                                    $end_date   = new DateTime($endDate);

                                                    $diff = $end_date->diff($start_date);

                                                    if($diff->y > 0)
                                                    {
                                                        $yOe = $diff->y > 1 ? $diff->format('1 Year to %y Year') : $diff->format('%y years');
                                                    }
                                                    else
                                                    {
                                                        if($diff->m > 0)
                                                        {
                                                            $yOe = $diff->format('%m Month');
                                                        }
                                                        else
                                                        {
                                                            $yOe = '1 Month';
                                                        }
                                                    }

                                                    echo $yOe;
                                                ?>
                                            </p>
                                        </li>
                                    <?php } ?>
                                    <!-- Postion Level -->
                                    <!-- <li class="">
                                        <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="mask mdo-white-v8 flex-center">
                                <?php
                                    if($value->is_shortlisted == 0)
                                    {
                                ?>
                                        <!-- If already add delete button -->
                                        <a href="<?= base_url();?>employer/candidates_bookmark/bookmark/<?= $value->id; ?>" class="btn btn-md-green  letter-space-xs mx-5 tooltips bookmark_candidate" data-container="body" data-placement="top" data-html="true" data-original-title="Shortlist Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                        <!-- else by default -->
                                        <a href="#" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                <?php
                                    }
                                ?>
                                <!--  -->
                                <a href="#" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                    <i class="fa fa-eye "></i>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    
        <?php if(!empty($searchResult["pagination"])) {?>
                <br/>

                <!-- Pagination-->
                <li class="list-group-item px-0 text-center ">
                    <ul class="pagination pagination-sm pagination-advance-search">
                        <?= $searchResult["pagination"]; ?>
                    </ul>
                </li>

                <script type="text/javascript">
                    $(function(){
                        $(".pagination-advance-search a").on('click', function(event) {
                            event.preventDefault()
                            
                            if($(this).parent().attr('class') != 'active')
                            {
                                let params = $("#advance-search").serialize()+'&keywords='+$("#search_panelv1 #keywords").val()
                                
                                $.ajax({
                                    url: $(this).attr('href'),
                                    type: 'POST',
                                    data: params,
                                    beforeSend: function(){
                                        $(".loader").removeClass('hidden')
                                        $(".searchResult").html("")
                                    },
                                    dataType : 'json',
                                    success: function (data) {
                                        setTimeout(function()
                                        {
                                            if(data.searchResult.length > 0)
                                            {
                                                $(".searchResult").html(data.searchResult)
                                                $(".loader").addClass('hidden')
                                                location.reload()
                                            }
                                            else
                                            {
                                                $(".searchResult").html("Empty Result")
                                                $(".loader").addClass('hidden')
                                            }
                                        },3000)
                                    },
                                    error: function( data )
                                    {
                                        console.log(data)
                                    }
                                })
                            }
                        })



                        $(".bookmark_candidate").on('click', function(event) {
                            event.preventDefault()

                            let url = $(this).attr('href')

                            $.ajax({
                                url: url,
                                type: 'POST',
                                /*data: params,*/
                                beforeSend: function(){
                                    $(".loader").removeClass('hidden')
                                },
                                dataType : 'json',
                                success: function (data) {
                                    setTimeout(function()
                                    {
                                        if(data.status == 1)
                                        {
                                            $(".loader").addClass('hidden')
                                            swal("Success", "Candidate has been bookmarked", "success");
                                        }
                                        else
                                        {
                                            $(".loader").addClass('hidden')
                                            swal("Cancelled", "Can't bookmark candidate", "error");
                                        }
                                    },3000)
                                },
                                error: function( data )
                                {
                                    console.log(data)
                                }
                            })
                        })
                    })
                </script>
        <?php } ?>
<?php } ?>