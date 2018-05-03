<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #gmap<?= $key; ?> {
        height: 100%;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .pac-container{
        z-index: 99999 !important;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content<?= $key; ?> {
        display: none;
      }
      #gmap<?= $key; ?> #infowindow-content<?= $key; ?> {
        display: inline;
      }
      #pac-input<?= $key; ?>{
        position: absolute;
        z-index: 99999;
      }
</style>

<div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <input type="hidden" id="addMapTitle" name="mapTitle"></input>
            <input type="hidden" id="addMapDescription" name="mapDescription"></input>
            <div class="row mx-0">
                <div class="col-md-12">
                    <div style="height: 300px;" id="map-window<?= $key; ?>">
                        <input id="pac-input<?= $key; ?>" class="controls" type="text" placeholder="Enter a location">
                        <div class="profileMap" id="gmap<?= $key; ?>" style="z-index: 9999 !important;"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Address -->
    <div class="row mx-0 ">
        <div class="form-group mx-0">
            <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Address</label>
            <input type="text" class="form-control" name="contact_info[<?= $key; ?>][building_address]" id="building_address<?= $key; ?>" placeholder="Unit / Lot , Road ," required>
        </div>
    </div>

    <!-- City & State-->
    <div class="row">

        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">City</label>
                <input type="text" class="form-control" name="contact_info[<?= $key; ?>][building_city]" id="building_city<?= $key; ?>" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mx-0">

                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">State</label>
                <input type="text" class="form-control" name="contact_info[<?= $key; ?>][building_state]" id="building_state<?= $key; ?>" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Postcode</label>
                <input type="text" class="form-control" placeholder="Postcode" name="contact_info[<?= $key; ?>][building_postcode]" id="building_postcode<?= $key; ?>" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mx-0">
                <!-- <label class="control-label">Country</label> -->
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Country</label>

                <select class="form-control " name="contact_info[<?= $key; ?>][building_country]" id="building_country<?= $key; ?>">
                    <option value="" selected disabled>Select one </option>
                    <?php foreach ($countries as $country_value) { ?>
                    <option>
                        <?php echo $country_value['name']; ?>
                    </option>
                    <?php } ?>
                </select>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Latitude</label>
                <input type="text" class="form-control" placeholder="1.643604 " name="contact_info[<?= $key; ?>][building_latitude]" id="building_latitude<?= $key; ?>">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Longititude</label>
                <input type="text" class="form-control" placeholder="1.955566" name="contact_info[<?= $key; ?>][building_longitude]" id="building_longitude<?= $key; ?>">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Phone Number</label>

                <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[<?= $key; ?>][building_phone]" id="building_phone<?= $key; ?>">

            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Fax Number</label>
                <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[<?= $key; ?>][building_fax]" id="building_fax<?= $key; ?>">
            </div>
        </div>
    </div>

    <!-- Office Type and Remove Button -->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Office Type</label>

                <div class="mt-radio-inline">
                    <label class="mt-radio">
                        <input type="radio" name="contact_info[<?= $key; ?>][optionsRadios]" id="optionsRadios4" value="HQ" name="HQ" checked="checked"> Headquarter
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        <input type="radio" name="contact_info[<?= $key; ?>][optionsRadios]" id="optionsRadios5" value="branch"> Branch
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mx-0">
                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">Email Address</label>

                <input type="text" class="form-control input-large" placeholder="hello@xremo.com" name="contact_info[<?= $key; ?>][building_email]" id="building_email<?= $key; ?>">
            </div>

        </div>
        <div class="col-md-3 pull-right">
            <a href="javascript:;" class="btn btn-danger btn-block delContact">
                <i class="fa fa-close"></i> Remove
            </a>
        </div>
    </div>
</div>