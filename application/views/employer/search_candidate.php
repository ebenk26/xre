<!-- ===== Content ===== -->
        <div class="page-content-wrapper">
            <div class="page-content">

                <h1 class="page-title"> Search Candidate</h1>
                <!-- Search -->
                <div class="portlet mt-60" id="search_panelv1">
                    <!-- <h4>Search Keywords</h4> -->
                    <div class="well" >
                        <p>Atribbute </p>
                        <ol>
                            <li>
                                <b>Keyword</b> - all</li>
                            <li>
                                <b>Location</b> - extract state and city </li>
                            <li>
                                <b>Salary Range</b> - User can create a range of it expected candidate salary </li>
                            <li>
                                <b>Job Type</b> - Get data from candidate latest job experience</li>
                            <li>
                                <b>Position Level</b> - Get data from candidate latest job exp.</li>
                            <li>
                                <b>Years of Experience</b> - Get data from candidate latest job exp</li>
                            <li>
                                <b>Field Of Study & Qualifications is merge and named as education</b> - Get data from candidat latest academic field-ofstudy and qualifications</li>

                        </ol>
                    </div>
                    <form action="" class="form form-horizontal">
                        <!-- Search Keyword -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group mx-0 ">
                                    <div class="input-icon right">
                                        <i class="icon-magnifier mr-5 mt-25"></i>
                                        <input type="text" class="form-control input-lg " placeholder="Search  ">
                                        <span class="helper-block pull-right">
                                            <!-- if advanced is click then advanced content will show and show this button -->
                                            <button type="button" class="btn btn-primary active btn-sm mx-0 mt-10" aria-pressed="true" id="toggleAdvancedSearch">
                                                Advance Search Button
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <!-- else ][default] -->
                                            <button type="button" class="btn btn-primary active btn-sm mx-0 mt-10" aria-pressed="true" id="toggleAdvancedSearch">
                                                Advance Search Button
                                                <i class="fa fa-caret-up"></i>
                                            </button </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Advanced Search -->
                        <div class="portlet light porlet-body" id="advanced-search" >
                            
                            <div class="row">
                                <!-- Salary Range -->
                                <div class="col-md-4">
                                    <!-- Salary -->
                                    <div class="form-group mx-0">
                                        <label for="" class="control-label mb-10">Salary Range</label>
                                        <!-- This using pugin bootstrap select -->
                                        <select class="bs-select form-control mb-10" aria-placeholder="Currency" title="Currency">
                                            <option>MYR</option>
                                            <option>IDR</option>
                                            <!-- <option></option> -->
                                        </select>
                                        <div class="input-group">
                                            <input type="number" placeholder="Min" class="form-control ">
                                            <span class="input-group-addon border-none md-white">-</span>
                                            <input type="number" placeholder="Max" class="form-control ">
                                            <span class="input-group-btn hidden ">
                                                <a href="" class="btn btn-icon-only btn-md-amber rounded-right-10">
                                                    <i class="fa fa-chevron-right"></i>
                                                </a>
                                            </span>
                                        </div>
                                        <span class="helper-block">Output for this from attr 'expected salary' form student</span>
                                    </div>
                                </div>
                                <!-- Location -->
                                <div class="col-md-4">
                                    <div class="form-group mx-0">
                                        <label class="control-label">Location</label>
                                        <div class="input-group select2-bootstrap-append select2-bootstrap-prepend ">
                                            <select class="form-control select2 " multiple>
                                                <option></option>
                                                <optgroup label="Alaskan">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI" disabled="disabled">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <span class="helper-block">Output for this from attr 'address' from student. Extract data , [city , state ] , country shall remove because its depend by ip </span>
                                    </div>
                                </div>
                                <!-- Qualifications -->
                                <div class="col-md-4">
                                    <!--Education  -->
                                    <div class="form-group mx-0">
                                        <label class="control-label">Education</label>
                                        <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                            <select class="form-control select2" multiple title="Language">
                                                <option></option>
                                                <optgroup label="Alaskan">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI" disabled="disabled">Hawaii</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Position Level -->
                                <div class="col-md-4">
                                    <div class="form-group mx-0">
                                        <label class="control-label">Position Level</label>
                                        <select class="bs-select form-control mb-10" aria-placeholder="Position" title="Position Level">
                                            <option>None</option>
                                            <option>Junior </option>
                                            <option>Senior</option>
                                            <option>Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mx-0">
                                        <label class="control-label">Job Type</label>
                                        <select class="bs-select form-control mb-10" aria-placeholder="Currency" title="Job Type">
                                            <option>Internship</option>
                                            <option>Temporary</option>
                                            <option>....</option>
                                            <option>....</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group mx-0">
                                        <label class="control-label">Years Of Experience</label>
                                        <select class="bs-select form-control mb-10" aria-placeholder="Years of expereince" title="Year of experience">
                                            <option>None</option>
                                            <option>1to3year</option>
                                            <option>4to6year</option>
                                            <option>7to9year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary px-100 letter-space-xxs">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- Search Result -->
                <div class="portlet md-shadow-none">
                    <div class="portlet-body">
                        <!-- With Image -->
                        <!-- <p hidden>Grid - Version 1</p>
                        <div class="row " hidden>
                            <div class="col-md-6">
                                <div class="panel view overlay ">
                                    <div class="media panel-body">
                                        <div class="media-left ">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-small" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="font-weight-600">Full Name</h4>
                                            <h5>
                                                <i class="icon-graduation mr-10"></i> Latest Academic</h5>
                                            <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                                <!~~ Job Type ~~>
                                                <li>
                                                    <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                                </li>
                                                <!~~ Salary ~~>
                                                <li>
                                                    <p class="label label-md-green label-sm font-weight-400"> Salary </p>
                                                </li>
                                                <!~~ Location ~~>
                                                <li>
                                                    <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                                </li>
                                                <!~~ Specialization ~~>
                                                <li class="">
                                                    <p class="label label-md-blue-grey label-sm font-weight-400"> specialization </p>
                                                </li>
                                                <!~~ Year Of Experience ~~>
                                                <li class="">
                                                    <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                                </li>
                                                <!~~ Postion Level ~~>
                                                <li class="">
                                                    <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <a class="mask hm-grey-v1 " href="../student/student-view-profile.html">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel view overlay">
                                    <div class="media panel-body">
                                        <div class="media-left">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-small" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="font-weight-600 text-uppercase">Nur Atikah Amira Binti Mohd Zain</h4>
                                            <h5>
                                                <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                            <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                                <!~~ Job Type ~~>
                                                <li>
                                                    <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                                </li>
                                                <!~~ Salary ~~>
                                                <li>
                                                    <p class="label label-md-green label-sm font-weight-400"> Salary </p>
                                                </li>
                                                <!~~ Location ~~>
                                                <li>
                                                    <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                                </li>
                                                <!~~ Specialization ~~>
                                                <li class="">
                                                    <p class="label label-md-blue-grey label-sm font-weight-400"> specialization </p>
                                                </li>
                                                <!~~ Year Of Experience ~~>
                                                <li class="">
                                                    <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                                </li>
                                                <!~~ Postion Level ~~>
                                                <li class="">
                                                    <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    <a class="mask hm-grey-v1 " href="../student/student-view-profile.html"></a>
                                </div>
                            </div>
                        </div> -->

                        <!-- <p>Grid - Version 2</p> -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body media-middle">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a>Full Name </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <!-- if experience exist in resume show -->
                                            <i class="icon-briefcase mr-10"></i> Latest Experience title
                                            <br>
                                            <!-- else show latest academic with qualifications in what fields study -->
                                            <i class="icon-graduation mr-10"></i> Latest Academic</h5>

                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a href=""> Nur Atikah Amira Binti Mohd Zain </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a href=""> Nur Atikah Amira Binti Mohd Zain </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body media-middle">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a>Full Name </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <!-- if experience exist in resume show -->
                                            <i class="icon-briefcase mr-10"></i> Latest Experience
                                            <br>
                                            <!-- else show latest academic with qualifications in what fields study -->
                                            <i class="icon-graduation mr-10"></i> Latest Academic</h5>

                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a href=""> Nur Atikah Amira Binti Mohd Zain </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a href=""> Nur Atikah Amira Binti Mohd Zain </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body media-middle">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a>Full Name </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <!-- if experience exist in resume show -->
                                            <i class="icon-briefcase mr-10"></i> Latest Experience
                                            <br>
                                            <!-- else show latest academic with qualifications in what fields study -->
                                            <i class="icon-graduation mr-10"></i> Latest Academic</h5>

                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a href=""> Nur Atikah Amira Binti Mohd Zain </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel view overlay border-none">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">
                                                    <a href=""> Nur Atikah Amira Binti Mohd Zain </a>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                                            </div>
                                        </div>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!-- Job Type -->
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!-- Salary -->
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Expected Salary </p>
                                            </li>
                                            <!-- Location -->
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!-- Year Of Experience -->
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!-- Postion Level -->
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mask mdo-white-v8 flex-center">
                                        <!-- If already add delete button -->
                                        <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Add Candidate">
                                            <i class="fa fa-plus "></i>
                                        </a>
                                        <!-- else by default -->
                                        <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                            <i class="fa fa-check "></i>
                                        </a>
                                        <!--  -->
                                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <p hidden>Grid - Version 3</p>
                        <div class="row" hidden>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5 class="my-0">
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/pages/img/avatars/team1.jpg" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5 class="my-0">
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="panel">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/pages/img/avatars/team2.jpg" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5 class="my-0">
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/pages/img/avatars/team3.jpg" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5 class="my-0">
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p hidden>Grid - Version 4</p>
                        <div class="row" hidden>
                            <div class="col-md-6">
                                <div class="panel view overlay">
                                    <div class="panel-body">
                                        <!~~ Img & Full name ~~>
                                        <div class="media">
                                            <div class="media-body media-middle">
                                                <h4 class="font-weight-600 text-uppercase"> Full Name</h4>

                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-tiny" alt="">
                                            </div>
                                        </div>
                                        <!~~ Divider ~~>
                                        <hr>
                                        <!~~ Content ~~>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Latest Academic</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                            <!~~ Job Type ~~>
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!~~ Salary ~~>
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Salary </p>
                                            </li>
                                            <!~~ Location ~~>
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!~~ Specialization ~~>
                                            <li class="">
                                                <p class="label label-md-blue-grey label-sm font-weight-400"> specialization </p>
                                            </li>
                                            <!~~ Year Of Experience ~~>
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!~~ Postion Level ~~>
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="mask hm-grey-v1 " href="../student/student-view-profile.html"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel view overlay">
                                    <div class="panel-body">
                                        <!~~ Fullname & Img  ~~>
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="font-weight-600 text-uppercase">Nur Atikah Amira Binti Mohd Zain</h4>
                                            </div>
                                            <div class="media-right">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-tiny" alt="">
                                            </div>
                                        </div>
                                        <!~~ Divider ~~>
                                        <hr>
                                        <!~~ User Content Based by searching  ~~>
                                        <h5>
                                            <i class="icon-graduation mr-10"></i> Bachelor Degree In Software Engineering</h5>
                                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-10">
                                            <!~~ Job Type ~~>
                                            <li>
                                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                                            </li>
                                            <!~~ Salary ~~>
                                            <li>
                                                <p class="label label-md-green label-sm font-weight-400"> Salary </p>
                                            </li>
                                            <!~~ Location ~~>
                                            <li>
                                                <p class="label label-md-purple label-sm font-weight-400"> Location </p>
                                            </li>
                                            <!~~ Specialization ~~>
                                            <li class="">
                                                <p class="label label-md-blue-grey label-sm font-weight-400"> specialization </p>
                                            </li>
                                            <!~~ Year Of Experience ~~>
                                            <li class="">
                                                <p class="label label-md-yellow md-black-text label-sm font-weight-400"> 1 year to 3 year </p>
                                            </li>
                                            <!~~ Postion Level ~~>
                                            <li class="">
                                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="mask hm-grey-v1 " href="../student/student-view-profile.html"></a>
                                </div>
                            </div>
                        </div>

                        <p hidden>Grid - Version 5</p>
                        <div class="row" hidden>
                            <div class="col-md-6 col-sm-4 col-xs-6">
                                <div class="panel">
                                    <!~~ Show Full name ~~>
                                    <div class="panel-heading md-white border-bottom border-mdo-grey-v3 py-30">
                                        <h4 class="panel-title font-weight-600 text-uppercase">Full Name</h4>
                                    </div>
                                    <!~~ Content exactly ehat in seach advanced ~~>
                                    <div class="panel-body ">
                                        <ul class="list-unstyled mt-ul-li lr-0 m-0">
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-graduation font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> 'Qualifications' In 'Field Of Study'</h5>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-pointer font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> ' Location '</h5>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-money font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> ' Salary '</h5>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-briefcase font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0"> ' Specialization '</h5>
                                                    <h5 class="mt-0"> ' Job Type '</h5>
                                                    <h5 class="mt-0"> ' Position Level '</h5>
                                                    <h5 class="mt-0"> ' Year Of Experience '</h5>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="panel-footer md-white border-none pb-20 ">
                                        <a href="" class="btn btn-md-indigo">View </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-6">
                                <div class="panel">
                                    <!~~ Show Full name ~~>
                                    <div class="panel-heading md-white border-bottom border-mdo-grey-v3 py-30">
                                        <h4 class="panel-title font-weight-600 text-uppercase"> Nur Atikah Amira Binti Mohd Zain</h4>
                                    </div>
                                    <!~~ Content exactly ehat in seach advanced ~~>
                                    <div class="panel-body ">
                                        <ul class="list-unstyled mt-ul-li lr-0 m-0">
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-graduation font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Bachelor Degree In Software Engineering</h5>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-pointer font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Subang Jaya , Selangor</h5>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-money font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0">RM 3000 </h5>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-briefcase font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0 "> IT </h5>
                                                    <h5 class="mt-0"> Full Time </h5>
                                                    <h5 class="mt-0"> Junior </h5>
                                                    <h5 class="mt-0"> 1 Year to 3 Year</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="panel-footer md-white border-none pt-10 pb-20 text-right">
                                        <a href="" class="btn btn-md-indigo">View </a>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!-- 
                        <p hidden>Grid - Version 6</p>
                        <div class="row" hidden>
                            <div class="col-md-6 col-sm-4 col-xs-6">
                                <div class="panel panel-borderless ">
                                    <!~~ Show Full name ~~>
                                    <div class="panel-heading md-white border-bottom border-mdo-grey-v3 py-30 media ">
                                        <div class="media-left">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm border-mdo-grey-v3">
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="panel-title font-weight-600 text-uppercase"> Nur Atikah Amira Binti Mohd Zain</h4>
                                        </div>
                                    </div>
                                    <!~~ Content exactly ehat in seach advanced ~~>
                                    <div class="panel-body ">
                                        <ul class="list-unstyled mt-ul-li lr-0 m-0">
                                            <!~~ Latest Academics ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-graduation font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 cla ss="my-0"> Bachelor Degree In Software Engineering</h5>
                                                </div>
                                            </li>
                                            <!~~ Location ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-pointer font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Subang Jaya , Selangor</h5>
                                                </div>
                                            </li>
                                            <!~~ User Expected Salary ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-money font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0">RM 3000 </h5>
                                                </div>
                                            </li>
                                            <!~~ Looking For Job Position in 'Specialization' , 'Job Type' , 'Position Level'  and 'Year of experience' ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-briefcase font-20"></i>
                                                </div>
                                                <div class="media-body ">
                                                    label
                                                    <ul class="list-inline list-unstyled m-0 mt-ul-li-tb-4 mt-ul-li-lr-4  p-0">
                                                        <li>
                                                            <h5 class="label label-sm label-md-blue-grey">Consulting ( IT , Software , Hardware) list-group-item </h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="label label-sm label-md-blue"> Full Time </h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="label label-sm label-md-deep-purple"> Junior </h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="label label-sm label-md-yellow md-black-text ">
                                                                <i class=" icon-bulb"></i>1 Year to 3 Year</h5>
                                                        </li>
                                                    </ul>
                                                    badge
                                                    <ul class="list-inline list-unstyled m-0 mt-ul-li-tb-4 mt-ul-li-lr-4  p-0">
                                                        <li>
                                                            <span class="badge  badge-md-blue-grey">Consulting ( IT , Software , Hardware) list-group-item </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge badge-md-blue"> Full Time </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge  badge-md-deep-purple"> Junior </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge badge-md-yellow md-black-text ">
                                                                <i class=" icon-bulb"></i>1 Year to 3 Year</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-6">
                                <div class="panel    panel-borderless ">
                                    <!~~ Show Full name ~~>
                                    <div class="panel-heading md-white border-bottom border-mdo-grey-v3 py-30 media ">
                                        <div class="media-left">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm border-mdo-grey-v3">
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="panel-title font-weight-600 text-uppercase"> Nur Atikah Amira Binti Mohd Zain</h4>
                                        </div>
                                    </div>
                                    <!~~ Content exactly ehat in seach advanced ~~>
                                    <div class="panel-body ">
                                        <ul class="list-unstyled mt-ul-li lr-0 m-0">
                                            <!~~ Latest Academics ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-graduation font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 cla ss="my-0"> Bachelor Degree In Software Engineering</h5>
                                                </div>
                                            </li>
                                            <!~~ Location ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-pointer font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Subang Jaya , Selangor</h5>
                                                </div>
                                            </li>
                                            <!~~ User Expected Salary ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-money font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0">RM 3000 </h5>
                                                </div>
                                            </li>
                                            <!~~ Looking For Job Position in 'Specialization' , 'Job Type' , 'Position Level'  and 'Year of experience' ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-briefcase font-20"></i>
                                                </div>
                                                <div class="media-body ">
                                                    label
                                                    <ul class="list-inline list-unstyled m-0 mt-ul-li-tb-4 mt-ul-li-lr-4  p-0">
                                                        <li>
                                                            <h5 class="label label-sm label-md-blue-grey">Consulting ( IT , Software , Hardware) list-group-item </h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="label label-sm label-md-blue"> Full Time </h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="label label-sm label-md-deep-purple"> Junior </h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="label label-sm label-md-yellow md-black-text ">
                                                                <i class=" icon-bulb"></i>1 Year to 3 Year</h5>
                                                        </li>
                                                    </ul>
                                                    badge
                                                    <ul class="list-inline list-unstyled m-0 mt-ul-li-tb-4 mt-ul-li-lr-4  p-0">
                                                        <li>
                                                            <span class="badge  badge-md-blue-grey">Consulting ( IT , Software , Hardware) list-group-item </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge badge-md-blue"> Full Time </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge  badge-md-deep-purple"> Junior </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge badge-md-yellow md-black-text ">
                                                                <i class=" icon-bulb"></i>1 Year to 3 Year</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <p hidden>Grid - Version 7</p>
                        <div class="row" hidden>
                            <div class="col-md-6 col-sm-4 col-xs-6">
                                <div class="panel view overlay border-none">
                                    <!~~ Show Full name ~~>
                                    <div class="panel-heading md-white  media ">
                                        <div class="media-left">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm border-mdo-grey-v3">
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="panel-title font-weight-600 text-uppercase"> Nur Atikah Amira Binti Mohd Zain</h4>
                                        </div>
                                    </div>
                                    <!~~ Content exactly ehat in seach advanced ~~>
                                    <div class="panel-body  ">
                                        <ul class="list-unstyled mt-ul-li lr-0 m-0">
                                            <!~~ Latest Academics ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-graduation font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Bachelor Degree In Software Engineering</h5>
                                                </div>
                                            </li>
                                            <!~~ Location ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-pointer font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Subang Jaya , Selangor</h5>
                                                </div>
                                            </li>
                                            <!~~ User Expected Salary ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-money font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0">RM 3000 </h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="../student/student-view-profile.html" class="mask hm-green-v1"></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-6">
                                <div class="panel view overlay border-none">
                                    <!~~ Show Full name ~~>
                                    <div class="panel-heading md-white  media ">
                                        <div class="media-left">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm border-mdo-grey-v3">
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="panel-title font-weight-600 text-uppercase"> Nur Atikah Amira Binti Mohd Zain</h4>
                                        </div>
                                    </div>
                                    <!~~ Content exactly ehat in seach advanced ~~>
                                    <div class="panel-body  ">
                                        <ul class="list-unstyled mt-ul-li lr-0 m-0">
                                            <!~~ Latest Academics ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-graduation font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Bachelor Degree In Software Engineering</h5>
                                                </div>
                                            </li>
                                            <!~~ Location ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-pointer font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0"> Subang Jaya , Selangor</h5>
                                                </div>
                                            </li>
                                            <!~~ User Expected Salary ~~>
                                            <li class="media">
                                                <div class="media-left media-middle">
                                                    <i class="fa fa-money font-20"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="my-0">RM 3000 </h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="../student/student-view-profile.html" class="mask hm-green-v1"></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- <div class="tabbable-line border-bottom border-grey-cararra mb-40">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_v1" class="nav-item" data-toggle="tab">Ver.1</a>
                                </li>
                                <li>
                                    <a href="#tab_v2" class="nav-item" data-toggle="tab">Ver.2</a>
                                </li>
                                <li>
                                    <a href="#tab_v3" class="nav-item" data-toggle="tab">Ver.3</a>
                                </li>
                            </ul>
                        </div> -->
                <!-- <div class="tab-content"> -->

                <!-- <div class="tab-pane active" id="tab_v1"> -->
                <!-- <div class="portlet hidden">
                    <div class="portlet-title">
                        <div class="actions">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default active" id="gridBtn">
                                    <input type="radio" class="toggle">
                                    <i class="icon-grid"></i>
                                </label>
                                <label class="btn btn-default" id="listBtn">
                                    <input type="radio" class="toggle">
                                    <i class="icon-list"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!~~ GRid View ~~>
                    <div class="portlet-body" id="gridView">
                        <!~~ With Image ~~>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/global/img/xremo/profile-pic.png" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5>
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/pages/img/avatars/team1.jpg" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5>
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/pages/img/avatars/team2.jpg" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5>
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel border-none">
                                    <div class="panel-title ">
                                        <div class="view overlay">
                                            <img src="../../assets/pages/img/avatars/team3.jpg" class="img-fluid" alt="">
                                            <div class="mask hm-amber-v5 flex-center">
                                                <a href="" class="btn btn-md-green"> Check </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h5>
                                            Bradford Reichert
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!~~ List View ~~>
                    <div class="portlet-body" id="listView">
                        <div class="list-group">
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">


                                    <div class="media-left">
                                        <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-medium">
                                    </div>
                                    <div class="media-body">
                                        <h5>Nick Jonas</h5>
                                        <p class="multiline-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse vero molestiae distinctio aperiam earum velit, dicta consectetur sint quibusdam explicabo doloribus pariatur aut exercitationem illo labore unde id voluptates?</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> -->
                <!-- </div> -->
                <!-- Tab V2 -->
                <!-- <div class="tab-pane " id="tab_v2"> -->
                <!-- </div> -->

                <!-- <div class="tab-pane " id="tab_v3"> -->
                <!-- <div class="portlet md-shadow-none" hidden>
                    <div class="portlet-title">
                        List View design
                    </div>
                    <!~~ List View ~~>
                    <div class="portlet-body">
                        <!~~ <p>List V1</p> ~~>
                        <a class="list-group-item ">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm border-mdo-grey-v3">
                                </div>
                                <div class="media-body">
                                    <h5 class="text-uppercase font-weight-600">Full Name </h5>
                                    <ul class="list-inline list-unstyled">
                                        <li>
                                            <i class="icon-briefcase mr-5"></i>Specialization
                                        </li>
                                        <li>
                                            <i class="icon-pointer mr-5"></i>Location
                                        </li>
                                        <li>
                                            <i class="fa fa-money mr-5"></i>salary
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item ">
                            <h5 class="font-weight-600 text-uppercase">Full name</h5>
                            <ul class="list-inline list-unstyled">
                                <li>
                                    <i class="icon-briefcase mr-5"></i>Specialization
                                </li>
                                <li>
                                    <i class="icon-pointer mr-5"></i>Location
                                </li>
                                <li>
                                    <i class="fa fa-money mr-5"></i>salary
                                </li>
                            </ul>
                        </a>

                    </div>
                </div> -->
                <!-- </div> -->
                <!-- </div> -->

            </div>
        </div>