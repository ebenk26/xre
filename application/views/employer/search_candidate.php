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
                    <!-- Search Keyword -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group mx-0 ">
                                <div class="input-icon right">
                                    <i class="icon-magnifier mr-5 mt-25"></i>
                                    <input type="text" name="keywords" id="keywords" class="form-control input-lg " placeholder="Search...">
                                    <span class="helper-block pull-right">
                                        <button type="button" class="btn btn-primary active btn-sm mx-0 mt-10" aria-pressed="true" id="toggleAdvancedSearch">
                                            Advance Search Button
                                            <i class="fa fa-caret-up"></i>
                                        </button> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Advanced Search -->
                    <div class="portlet light porlet-body" id="advanced-search" style="display: none;">
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
                                        <input type="number" placeholder="Min" class="form-control">
                                        <span class="input-group-addon border-none md-white">-</span>
                                        <input type="number" placeholder="Max" class="form-control">
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
                                        <select class="form-control select2" multiple>
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
                </div>
                <!-- Search Result -->
                <div class="portlet md-shadow-none">
                    <div class="portlet-body">
                        <!-- <p>Grid - Version 2</p> -->
                        <div class="searchResult"></div>
                    </div>
                </div>
            </div>
        </div>