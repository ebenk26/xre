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
                            <input type="text" name="keywords" id="keywords" class="form-control input-lg " placeholder="Search..." autocomplete="off">
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
            <form id="advance-search" method="POST">
                <div class="portlet light porlet-body" id="advanced-search" style="display: none;">
                    <div class="row">
                        <!-- Salary Range -->
                        <div class="col-md-4">
                            <!-- Salary -->
                            <div class="form-group mx-0">
                                <label for="" class="control-label mb-10">Salary Range</label>
                                <!-- This using pugin bootstrap select -->
                                <select name="currency" class="bs-select form-control mb-10" aria-placeholder="Currency" title="Currency">
                                    <option value="">None</option>
                                    <?php
                                        foreach ($currency as $value)
                                        {
                                    ?>
                                            <option value="<?= $value["id"]; ?>" <?= $user_currency->id == $value["id"] ? 'selected="selected"' : ''; ?>><?= $value["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <div class="input-group">
                                    <input type="number" name="range_min" placeholder="Min" class="form-control">
                                    <span class="input-group-addon border-none md-white">-</span>
                                    <input type="number" name="range_max" placeholder="Max" class="form-control">
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
                                    <select name="location" class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
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
                                    <select name="education" class="form-control select2" multiple title="Language">
                                        <option value="">None</option>
                                        <?php
                                            foreach ($education as $educationVal)
                                            {
                                        ?>
                                                <option value="<?= $educationVal["id"]; ?>"><?= $educationVal["name"]; ?></option>
                                        <?php
                                            }
                                        ?>
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
                                <select name="position_level" class="bs-select form-control mb-10" aria-placeholder="Position" title="Position Level">
                                    <option value="">None</option>
                                    <?php
                                        foreach ($position as $val)
                                        {
                                    ?>
                                            <option value="<?= $val["id"]; ?>"><?= $val["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mx-0">
                                <label class="control-label">Job Type</label>
                                <select name="job_type" class="bs-select form-control mb-10" aria-placeholder="Currency" title="Job Type">
                                    <option value="">None</option>
                                    <?php
                                        foreach ($employment as $empl)
                                        {
                                    ?>
                                            <option value="<?= $empl["id"]; ?>"><?= $empl["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mx-0">
                                <label class="control-label">Years Of Experience</label>
                                <select name="yoe" class="bs-select form-control mb-10" aria-placeholder="Years of expereince" title="Year of experience">
                                    <?php
                                        foreach ($yoe as $yoeVal)
                                        {
                                    ?>
                                            <option value="<?= $yoeVal["id"]; ?>"><?= $yoeVal["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Search" class="btn btn-primary px-100 letter-space-xxs"/>
                    </div>
                </div>
            </form>
        </div>
        <!-- Search Result -->
        <div class="portlet md-shadow-none">
            <div class="portlet-body">
                <!-- <p>Grid - Version 2</p> -->
                <div class="searchResult"></div>
                <div class='loader hidden'>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--text'></div>
                </div>
            </div>
        </div>
    </div>
</div>