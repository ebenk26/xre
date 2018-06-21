<!-- ===== Content ===== -->
<div class="page-content-wrapper">
    <div class="page-content">

        <h1 class="page-title"> Search Candidate</h1>
        <!-- Search -->
        <div class="portlet mt-60" id="search_panelv1">
            <!-- <h4>Search Keywords</h4> -->
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
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="col-md-4">
                            <div class="form-group mx-0">
                                <label class="control-label">Location</label>
                                <select name="location" class="bs-select form-control mb-10" aria-placeholder="Location" title="Location">
                                    <option value="">None</option>
                                    <?php
                                        foreach ($location as $locationVal)
                                        {
                                    ?>
                                            <option value="<?= $locationVal["name"]; ?>"><?= $locationVal["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Qualifications -->
                        <div class="col-md-4">
                            <!--Education  -->
                            <div class="form-group mx-0">
                                <label class="control-label">Education</label>
                                <select name="education" class="bs-select form-control mb-10" aria-placeholder="Education" title="Education">
                                    <option value="">None</option>
                                    <?php
                                        foreach ($education as $educationVal)
                                        {
                                    ?>
                                            <option value="<?= $educationVal["name"]; ?>"><?= $educationVal["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
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
                                            <option value="<?= $val["name"]; ?>"><?= $val["name"]; ?></option>
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