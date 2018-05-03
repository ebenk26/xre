</div>
<!-- END CONTAINER -->
<?php $this->load->view('main/footer_app');
$company_address = json_decode($user_profile['address']);?>


<!-- ========== Javascript ========== -->
<!-- CORE  -->
<!-- Jquery in Plugin Folder v1.12.4  -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.min.js"></script> 
<!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script> -->
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.migrate.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/js.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/moment.min.js"></script>

<!-- Plugins @ Vendor  -->
<!-- # Datatable -->
<script type="text/javascript" src="<?php echo JS; ?>global/datatable.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
<!-- # Date / Time -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/clockface/js/clockface.js"></script>
<!-- # Widget -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/counterup/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/counterup/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-tabdrop/bootstrap-tabdrop.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- # Calendar -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- # Image Cropping -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/jcrop/js/jquery.color.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jcrop/js/jquery.Jcrop.min.js"></script>
<!-- # Forms -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/typeahead/handlebars.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/typeahead/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/autosize/autosize.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-repeater/jquery.repeater.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/select2/js/select2.full.min.js"></script>
<!-- # Text Editor -->
<!-- Note : Took from page component_editors.html -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-markdown/lib/markdown.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-summernote/summernote.min.js"></script>
<!-- # Charts -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/morris/raphael-min.js"></script>
<!-- # Notifications -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
<!-- # Portfolio @ Light Gallery -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<!-- # Validation -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- # Google Map -->
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
<!-- <script type="text/javascript" src="<?php echo JS; ?>plugins/gmaps/gmaps.min.js"></script> -->

<!-- GLOBAL -->
<script type="text/javascript" src="<?php echo JS; ?>global/app.min.js"></script>

<!-- APPS -->
<script type="text/javascript" src="<?php echo JS; ?>apps/calendar.js"></script>

<!-- PAGE -->
<script type="text/javascript" src="<?php echo JS; ?>pages/form-wizard-employer.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>pages/dashboard.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>pages/table-datatables-managed.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>pages/form-repeater.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>pages/components-date-time-pickers.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>pages/form-image-crop.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>pages/components-bootstrap-select.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo JS; ?>pages/ui-modals.min.js"></script> -->
<script type="text/javascript" src="<?php echo JS; ?>pages/components-editors.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo JS; ?>pages/ui-sweetalert.min.js"></script> -->
<script type="text/javascript" src="<?php echo JS; ?>pages/portfolio-3.js"></script>

<!-- PAGE LAYOUT   -->
<script type="text/javascript" src="<?php echo JS; ?>layout2/layout.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout2/quick-sidebar.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout2/quick-nav.min.js"></script>


<!-- # Custom -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pass-strength.js"></script>

<!--SCRIPTS -->
<?php if ($this->uri->segment(2) == 'job_board') :?>
<!--Job Post-->
<script>
    $(document).ready(function () {
        // Salary Range
        $('.addBudgetMax').focusout(function () {
            $this = $('#addBudgetMin').val();
            $that = $('#addBudgetMax').val();
            if ($this.length > 0) {
                if (parseInt($this) > parseInt($that)) {
                    $('#salaryBlock').addClass('has-error');
                    $('#salaryBlockError').removeClass('hidden');
                    $('#preview_button_add').prop('disabled', true);
                }else{
                    $('#salaryBlock').removeClass('has-error');
                    $('#salaryBlockError').addClass('hidden');
                    $('#preview_button_add').prop('disabled', false);
                }
            }
        });

        // Edit Job Post
        $('.edit_jobpost').click(function () {
            var idJobPost = $(this).attr('data-id');
            // console.log(idJobPost);

            $('#editBudgetMax'+idJobPost).focusout(function () {
                $this = $('#editBudgetMin'+idJobPost).val();
                $that = $('#editBudgetMax'+idJobPost).val();
                
                if ($this.length > 0) {
                    if (parseInt($this) > parseInt($that)) {
                        $('#salaryBlock'+idJobPost).addClass('has-error');
                        $('#salaryBlockError'+idJobPost).removeClass('hidden');
                        $('#preview_button_edit_'+idJobPost).prop('disabled', true);
                    }else{
                        $('#salaryBlock'+idJobPost).removeClass('has-error');
                        $('#salaryBlockError'+idJobPost).addClass('hidden');
                        $('#preview_button_edit_'+idJobPost).prop('disabled', false);
                    }
                }
            });
            
            showMaps(idJobPost);
        });

        // Add Job Post
        $('#modal_add_jobpost').on('shown.bs.modal', function () {
            initMap();
        });

        setTimeout(
            function()
            {
                var segments = window.location.href.split( '/' );

                if(window.location.hash != '' && segments[4] == 'employer' && segments[5] == 'job_board')
                {
                    var idJobPost = $('a[href="'+window.location.hash+'"]').attr('data-id');

                    showMaps(idJobPost);
                }
            }
        ,2000);
    });
    // GMap
    function initMap()
    {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 35.717, lng: 139.731}
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map
        });
        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infowindow.setPosition(pos);
                infowindow.setContent('Location found.');
                infowindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infowindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infowindow, map.getCenter());
        }

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });
          marker.setVisible(true);
          var element   = document.getElementById('map-window');
          var InfoWindow= document.createElement('div');
          var title     = document.createElement('span');
          var addr      = document.createElement('span');

          element.appendChild(InfoWindow);
          InfoWindow.setAttribute('id', 'infowindow-content');
          InfoWindow.appendChild(title);
          title.setAttribute('id', 'place-name');
          document.createElement('br');
          InfoWindow.appendChild(addr);
          addr.setAttribute('id', 'place-address');
          document.getElementById('place-name').textContent = place.name;
          document.getElementById('place-address').textContent =
              place.formatted_address;
          infowindow.setContent(document.getElementById('infowindow-content'));
          infowindow.open(map, marker);
          document.getElementById('addLatitude').value=place.geometry.location.lat();
          document.getElementById('addLongitude').value=place.geometry.location.lng();
          document.getElementById('addMapTitle').value= place.name;
          document.getElementById('addMapDescription').value= place.formatted_address;
          document.getElementById('addAddress').value= place.formatted_address;
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];;
              var val = place.address_components[i];

              if (addressType == 'administrative_area_level_2' || addressType == 'locality') {
                document.getElementById('addState').value= val.long_name;
              }
              if (addressType == 'administrative_area_level_1') {
                document.getElementById('addCity').value= val.long_name; 
              }
              if (addressType == 'country') {
                document.getElementById('addCountry').value= val.long_name;
              }
              if (addressType == 'postal_code') {
                document.getElementById('addPostcode').value= val.long_name;
              }
          }
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    //Show Maps
    function showMaps(idJobPost)
    {
        var lat = document.getElementById('latitude' + idJobPost).value;
        var lng = document.getElementById('longitude' + idJobPost).value;

        var input = document.getElementById('pac-input' + idJobPost);

        if (lat.length > 0 && lng.length > 0) {
            var mapLatitude = document.getElementById('latitude' + idJobPost).value;
            var mapLongitude = document.getElementById('longitude' + idJobPost).value;
            var title = document.getElementById('addMapTitle' + idJobPost).value;
            var description = document.getElementById('addMapDescription' + idJobPost).value;

            var map = new google.maps.Map(document.getElementById('map' + idJobPost), {
                center: {
                    lat: parseFloat(mapLatitude),
                    lng: parseFloat(mapLongitude)
                },
                // center: {lat: -33.8688, lng: 151.2195},
                zoom: 13
            });

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var contentString = '<div id="infowindow-content" style="display:inline"><span><b>' + title +
                '</b></span><br/>' + description + '</span></div>';
            console.log(contentString);

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(mapLatitude),
                    lng: parseFloat(mapLongitude)
                },
                map: map,
                title: title,
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        } else {
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        }

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            var place = autocomplete.getPlace();
            
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            // Set the position of the marker using the place ID and location.
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location
            });

            marker.setVisible(true);

            var element     = document.getElementById('map-window' + idJobPost);
            var InfoWindow  = document.createElement('div');
            var title       = document.createElement('span');
            var addr        = document.createElement('span');
            var br          = document.createElement('br');

            element.appendChild(InfoWindow);

            InfoWindow.setAttribute('id', 'infowindow-content' + idJobPost);
            InfoWindow.setAttribute('style', 'display: inline');
            InfoWindow.appendChild(title);
            
            title.setAttribute('id', 'place-name' + idJobPost);
            title.setAttribute('style', 'font-weight: bold');
            
            InfoWindow.appendChild(br);
            InfoWindow.appendChild(addr);
            
            addr.setAttribute('id', 'place-address' + idJobPost);
            
            document.getElementById('place-name' + idJobPost).textContent = place.name;
            document.getElementById('place-address' + idJobPost).textContent =
                place.formatted_address;
            
            infowindow.setContent(document.getElementById('infowindow-content' + idJobPost));
            infowindow.open(map, marker);
            
            document.getElementById('latitude' + idJobPost).value = place.geometry.location.lat();
            document.getElementById('longitude' + idJobPost).value = place.geometry.location.lng();
            document.getElementById('addAddress' + idJobPost).value = place.formatted_address;
            
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                var val = place.address_components[i];
                
                if (addressType == 'administrative_area_level_2' || addressType == 'locality') {
                    document.getElementById('addState' + idJobPost).value = val.long_name;
                }

                if (addressType == 'administrative_area_level_1') {
                    document.getElementById('addCity' + idJobPost).value = val.long_name;
                }

                if (addressType == 'country') {
                    document.getElementById('addCountry' + idJobPost).value = val.long_name;
                }

                if (addressType == 'postal_code') {
                    document.getElementById('addPostcode' + idJobPost).value = val.long_name;
                }
            }
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5IHxM-F43CGvNccBU_RK8b8IFanhbh8M&libraries=places"
        async defer></script>
    <?php endif; ?>

    <?php if ($this->uri->segment(2) == 'profile') :?>
    <script>

    $(document).ready(function(){

        $('#btnEditProfile').click(function(){
            <?php 
            if (!empty($company_address))
            {
                foreach ($company_address as $key => $value)
                {
            ?>
                    showMaps(<?= $key; ?>,'gmap<?= $key; ?>');
            <?php
                }
            }
            ?>
        });

        $("#addOffice").on('click', function() {
            var num = $(this).attr('data-val');

            $.ajax({
                url: '<?= base_url(); ?>employer/profile/newContactInfo',
                type: 'POST',
                dataType: 'json',
                data: {num: num},
                success: function(response){
                    $("#contactInfoForm").append(response.form);

                    setTimeout(
                        function()
                        {
                            showMaps(num,'gmap'+num);

                            var newNum = parseInt(num) + 1;

                            $(this).attr('data-val',newNum);
                        }
                    ,2000);
                }
            });
            
        });

        $(".delContact").on('click', function(){
            $(this).parent().parent().parent().remove();
        });
    });

    //Show Maps
    function showMaps(idJobPost,mapId)
    {
        var lat = $('#building_latitude' + idJobPost).val();
        var lng = $('#building_longitude' + idJobPost).val();

        var input = document.getElementById('pac-input' + idJobPost);

        if (typeof lat != 'undefined' && typeof lng != 'undefined' && lat != '' && lng != '') 
        {
            if(lat.length > 0 && lng.length > 0)
            {
                var mapLatitude = document.getElementById('building_latitude' + idJobPost).value;
                var mapLongitude = document.getElementById('building_longitude' + idJobPost).value;
                var title = document.getElementById('addMapTitle' + idJobPost).value;
                var description = document.getElementById('addMapDescription' + idJobPost).value;

                var map = new google.maps.Map(document.getElementById(mapId), {
                    center: {
                        lat: parseFloat(mapLatitude),
                        lng: parseFloat(mapLongitude)
                    },
                    // center: {lat: -33.8688, lng: 151.2195},
                    zoom: 13
                });

                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);

                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                var contentString = '<div id="infowindow-content" style="display:inline"><span><b>' + title +
                    '</b></span><br/>' + description + '</span></div>';
                // console.log(contentString);

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(mapLatitude),
                        lng: parseFloat(mapLongitude)
                    },
                    map: map,
                    title: title,
                });

                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
            }
        } else {
            var map = new google.maps.Map(document.getElementById(mapId), {
                    center: {
                        lat: -33.8688,
                        lng: 151.2195
                    },
                    zoom: 13
            });

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        }

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            var place = autocomplete.getPlace();
            
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            // Set the position of the marker using the place ID and location.
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location
            });

            marker.setVisible(true);

            var element     = document.getElementById('map-window' + idJobPost);
            var InfoWindow  = document.createElement('div');
            var title       = document.createElement('span');
            var addr        = document.createElement('span');
            var br          = document.createElement('br');

            element.appendChild(InfoWindow);
            
            InfoWindow.setAttribute('id', 'infowindow-content' + idJobPost);
            InfoWindow.setAttribute('style', 'display: inline');
            InfoWindow.appendChild(title);
            
            title.setAttribute('id', 'place-name' + idJobPost);
            title.setAttribute('style', 'font-weight: bold');
            
            InfoWindow.appendChild(br);
            InfoWindow.appendChild(addr);
            
            addr.setAttribute('id', 'place-address' + idJobPost);
            
            document.getElementById('place-name' + idJobPost).textContent = place.name;
            document.getElementById('place-address' + idJobPost).textContent =
                place.formatted_address;
            
            infowindow.setContent(document.getElementById('infowindow-content' + idJobPost));
            infowindow.open(map, marker);
            
            document.getElementById('building_latitude' + idJobPost).value = place.geometry.location.lat();
            document.getElementById('building_longitude' + idJobPost).value = place.geometry.location.lng();
            document.getElementById('building_address' + idJobPost).value = place.formatted_address;
            
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                var val = place.address_components[i];
                
                if (addressType == 'administrative_area_level_2' || addressType == 'locality') {
                    document.getElementById('building_state' + idJobPost).value = val.long_name;
                }

                if (addressType == 'administrative_area_level_1') {
                    document.getElementById('building_city' + idJobPost).value = val.long_name;
                }

                if (addressType == 'country') {
                    document.getElementById('building_country' + idJobPost).value = val.long_name;
                }

                if (addressType == 'postal_code') {
                    document.getElementById('building_postcode' + idJobPost).value = val.long_name;
                }
            }
        });
    }

    function initMap() {

        var map = new google.maps.Map(document.getElementById('gmap'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });
          marker.setVisible(true);
          var element   = document.getElementById('map-window');
          var InfoWindow= document.createElement('div');
          var title     = document.createElement('span');
          var addr      = document.createElement('span');

          element.appendChild(InfoWindow);
          InfoWindow.setAttribute('id', 'infowindow-content');
          InfoWindow.appendChild(title);
          title.setAttribute('id', 'place-name');
          document.createElement('br');
          InfoWindow.appendChild(addr);
          addr.setAttribute('id', 'place-address');
          document.getElementById('place-name').textContent = place.name;
          document.getElementById('place-address').textContent =
              place.formatted_address;
          infowindow.setContent(document.getElementById('infowindow-content'));
          infowindow.open(map, marker);
          document.getElementById('addLatitude').value=place.geometry.location.lat();
          document.getElementById('addLongitude').value=place.geometry.location.lng();
          document.getElementById('addMapTitle').value= place.name;
          document.getElementById('addMapDescription').value= place.formatted_address;
          document.getElementById('addAddress').value= place.formatted_address;
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];;
              var val = place.address_components[i];

              if (addressType == 'administrative_area_level_2' || addressType == 'locality') {
                document.getElementById('addState').value= val.long_name;
              }
              if (addressType == 'administrative_area_level_1') {
                document.getElementById('addCity').value= val.long_name; 
              }
              if (addressType == 'country') {
                document.getElementById('addCountry').value= val.long_name;
              }
              if (addressType == 'postal_code') {
                document.getElementById('addPostcode').value= val.long_name;
              }
          }
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5IHxM-F43CGvNccBU_RK8b8IFanhbh8M&libraries=places"
        async defer></script>
    <?php endif; ?>

 
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

        // JOB STATUS BUTTON
        $('#preview_button_add').click(function () {
            $('#job_status_add').val('preview');
        });
        $('#draft_button_add').click(function () {
            $('#job_status_add').val('draft');
        });
        $('#submit_button_add').click(function () {
            $('#job_status_add').val('post');
        });

        <?php if($this->session->flashdata('msg_success')){ ?>
        alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 5);
        <?php } ?>
        <?php if($this->session->flashdata('msg_failed')){ ?>
        alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
        <?php } ?>

        // CANDIDATE LIST & INTERVIEW SESSION 
        $('.user-btn').click(function () {
            var id = $(this).attr('uid');
            var app_id = $(this).attr('app-id');
            var image_directory = window.location.origin + '/assets/img/student/';
            $.ajax({
                url: "<?php echo base_url();?>employer/profile/detail_profile",
                method: "POST",
                data: {
                    user_id: id,
                    applieds_id: app_id,
                },
                success: function (response) {
                    var student = JSON.parse(response);
                    var academics = '';
                    var project = '';
                    var non_academics = '';
                    var experience = '';

                    var profile_pic = 'profile-pic.png';
                    if (student.user_profile.overview.profile_photo != "") {
                        profile_pic = student.user_profile.overview.profile_photo;
                    }

                    var city_states = "-";
                    if (student.user_profile.address.city != null) {
                        city_states = student.user_profile.address.city + ' ,' + student.user_profile.address.states;
                    }

                    var summary = "-";
                    if (student.applieds.coverletter != null) {
                        summary = student.applieds.coverletter;
                    }



                    $.each(student.user_profile.academics, function (i, v) {
                        var academic_date = new Date(v.start_date);
                        academics +=
                            '<ul class="list-unstyled">\
                                                <li>\
                                                    <h5 class="font-weight-700">\
                                                        <small>' +
                            v.start_date + ' - ' + v.end_date +
                            '</small>\
                                                    </h5>\
                                                    <h6 class="font-weight-600 text-uppercase ">' +
                            v.university_name + '</h6>\
                                                </li>\
                                            </ul>';
                    });

                    $.each(student.user_profile.projects, function (i, v) {
                        project +=
                            '<ul class="list-unstyled">\
                                        <li>\
                                            <h5 class="font-weight-700"> ' +
                            v.name + ' </h5>\
                                            <h6>' + v.skills_acquired +
                            '</h6>\
                                        </li>\
                                    </ul>';
                    });

                    $.each(student.user_profile.achievement, function (i, v) {
                        non_academics += '<li>\
                                                    <h5 class="font-weight-700">' + v.achievement_title +
                            '\
                                                        <small>' + v.achievement_start_date + ' - ' + v.achievement_end_date +
                            '</small>\
                                                    </h5>\
                                                </li>';
                    });

                    $.each(student.user_profile.experiences, function (i, v) {
                        experience += '<li>\
                                                <h5 class="font-weight-700">' + v.experiences_title +
                            '\
                                                    <small>' + v.experiences_start_date + ' - ' + v.experiences_end_date +
                            '</small>\
                                                </h5>\
                                                <h6 class="font-weight-600 text-uppercase ">' +
                            v.experiences_company_name + '</h6>\
                                            </li>';
                    });

                    $('#modal_view_summary').html(
                        '<div class="modal-dialog modal-lg">\
                            <div class="modal-content ">\
                                <div class="modal-header md-indigo">\
                                    <div class="media">\
                                        <div class="pull-left">\
                                            <img src="' +
                        image_directory + profile_pic +
                        '" alt="" class="avatar avatar-circle avatar-tiny avatar-border-sm  ">\
                                        </div>\
                                        <div class="pull-right">\
                                            <a data-dismiss="modal" aria-hidden="true" class="md-white-text font-28-xs">\
                                                <i class="fa fa-close"></i>\
                                            </a>\
                                        </div>\
                                        <div class="media-body">\
                                            <h3 class="md-white-text font-weight-500 letter-space-xs mt-3">' +
                        student.user_profile.overview.name +
                        '</h3>\
                                            <ul class="list-inline list-unstyled md-white-text ">\
                                                <li>\
                                                    <i class="icon-pointer"></i> ' +
                        city_states +
                        '</li>\
                                                <li>\
                                                    <i class="icon-envelope"></i> ' +
                        student.user_profile.overview.email +
                        '</li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="row">\
                                            <div class="col-md-12 pr-0">\
                                                <h5 class="font-weight-700 text-uppercase">Tell Me About Yourselves</h5>\
                                                <p class="mt-0">' +
                        summary +
                        '</p>\
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
                                                    ' +
                        academics +
                        '\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class="col-md-6">\
                                                <div class="portlet  ">\
                                                    <div class="portlet-title ">\
                                                        <div class="caption">\
                                                            <i class="icon-notebook"></i>\
                                                            <span class="caption-subject font-26-xs">Non Education</span>\
                                                            <span class="caption-helper">Summary</span>\
                                                        </div>\
                                                        <div class="tools">\
                                                            <a href="" class="collapse" data-original-title="" title=""> </a>\
                                                        </div>\
                                                    </div>\
                                                    <div class="portlet-body">\
                                                        <ul class="list-unstyled">\
                                                            ' +
                        non_academics +
                        '\
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
                                                            <span class="caption-subject font-26-xs">Skill</span>\
                                                            <span class="caption-helper">Summary</span>\
                                                        </div>\
                                                        <div class="tools">\
                                                            <a href="" class="collapse" data-original-title="" title=""> </a>\
                                                        </div>\
                                                    </div>\
                                                    <div class="portlet-body  ">\
                                                        ' +
                        project +
                        '\
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
                                                            ' +
                        experience +
                        '\
                                                        </ul>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer ">\
                                    <a href="<?php echo base_url();?>profile/user/' +
                        id +
                        '" target="_blank" class="btn btn-md-cyan">\
                                        <i class="icon-users"></i> View Resume\
                                    </a>\
                                </div>\
                                \
                            </div>\
                            \
                        </div>'
                    );
                    $('#modal_view_summary').modal('show', {
                        backdrop: 'static'
                    });
                    $('#modal_edit_jobpost_163').modal('show', {
                        backdrop: 'static'
                    });

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
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url();?>employer/job_board/delete",
                            method: "POST",
                            data: {
                                post_id: parseInt(del),
                            },
                            success: function (response) {
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
            alertify.success('<?php echo $this->session->flashdata('
                msg_success '); ?>', 'success', 5);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
            alertify.error('<?php echo $this->session->flashdata('
                msg_failed '); ?>', 'error', 5);
            <?php } ?>
        });

        $('.shortlist-btn').click(function () {
            var id = $(this).attr('app-id');
            $.ajax({
                url: "<?php echo base_url();?>employer/job_board/shortlist",
                method: "POST",
                beforeSend: function () {
                    $(".loading").show('slow');
                },
                data: {
                    post_id: id,
                },
                success: function (response) {
                    $(".loading").hide('slow');

                    var data = JSON.parse(response);

                    if (data.message = 'success') {
                        alertify.success('Added to shortlisted candidate', 'success', 5);
                    } else {
                        alertify.error('Failed to add to shortlist', 'error', 5);
                    }
                }
            });
        });

        $('.reject-btn').click(function () {
            var id = $(this).attr('app-id');
            $.ajax({
                url: "<?php echo base_url();?>employer/job_board/reject",
                method: "POST",
                data: {
                    post_id: id,
                }
            });

            <?php if($this->session->flashdata('msg_success')){ ?>
            alertify.success('<?php echo $this->session->flashdata('
                msg_success '); ?>', 'success', 5);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
            alertify.error('<?php echo $this->session->flashdata('
                msg_failed '); ?>', 'error', 5);
            <?php } ?>

            location.reload();
        });

        $('.reject-candidate').click(function () {
            var del = $(this).attr('data-id');
            var candidate = $(this).attr('candidate-id');
            swal({
                    title: "Do you want to reject this candidate?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Reject",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url();?>employer/job_board/reject",
                            method: "POST",
                            data: {
                                post_id: del,
                                candidate_id: candidate,
                            },
                            success: function (response) {
                                swal("Success", "Candidate has been rejected.", "success");
                                location.reload();
                            }
                        })
                    } else {
                        swal("Cancelled", "You still think this candidate deserve the job", "error");
                    }
                }
            );
        });

        $('.hire-candidate').click(function () {
            var del = $(this).attr('data-id');
            var candidate = $(this).attr('candidate-id');
            swal({
                    title: "Do you want to hire this candidate?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Hire",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url();?>employer/job_board/hire",
                            method: "POST",
                            data: {
                                post_id: del,
                                candidate_id: candidate,
                            },
                            success: function (response) {
                                swal("Success", "Candidate has been hired.", "success");
                                location.reload();
                            }
                        })
                    } else {
                        swal("Cancelled", "You still think this candidate not deserve the job", "error");
                    }
                }
            );
        });

        $("#searchable_detail").bootstrapSwitch({
            size: 'mini',
            onSwitchChange: function (event, state) {
                var parentClass = $(this).parent().parent();
                var searchable_detail = 0;

                if (parentClass.hasClass('bootstrap-switch-on')) {
                    searchable_detail = 1;
                }

                $.ajax({
                    url: "<?php echo base_url();?>employer/settings/changeSearchableDetail",
                    method: "POST",
                    data: {
                        status: searchable_detail
                    },
                    success: function (response) {
                        if (searchable_detail == 1) {
                            swal("Success", "Your contact detail are now searchable to registered users.", "success");
                        } else {
                            swal("Success", "Your contact detail are now unavailable to registered users.", "success");
                        }
                    }
                });
            }
        });

        $("#searchable").bootstrapSwitch({
            size: 'mini',
            onSwitchChange: function (event, state) {
                var parentClass = $(this).parent().parent();
                var searchable = 0;

                if (parentClass.hasClass('bootstrap-switch-on')) {
                    searchable = 1;
                }

                $.ajax({
                    url: "<?php echo base_url();?>employer/settings/changeSearchable",
                    method: "POST",
                    data: {
                        status: searchable
                    },
                    success: function (response) {
                        if (searchable == 1) {
                            swal("Success", "Your contact are now unavailable to guest.", "success");
                        } else {
                            swal("Success", "Your contact are now searchable to guest.", "success");
                        }
                    }
                });
            }
        });

        $('.invite-candidate').click(function () {
            var candidate = $(this).attr('candidate-id');
            var job = $(this).attr('job-id');
            var candidate_name = $(this).attr('candidate-name');
            var candidate_email = $(this).attr('candidate-email');


            swal({
                    title: "Do you want to invite this candidate?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url();?>employer/job_board/single_invitation",
                            method: "POST",
                            data: {
                                candidate_id: candidate,
                                job_id: job,
                                candidate_name: candidate_name,
                                candidate_email: candidate_email,
                            },
                            success: function (response) {
                                swal("Success", "Candidate has been invited.", "success");
                                location.reload();
                            }
                        })
                    } else {
                        swal("Cancelled", "Invitation has been cancelled", "error");
                    }
                }
            );
        });

        $('.choose_session').click(function () {
            var id = $(this).attr('candidate-id');
            var candidate_name = $(this).attr('candidate-name');
            var candidate_email = $(this).attr('candidate-email');
            $('#choose_interview_session .send-invitation').attr('candidate-id', id);
            $('#choose_interview_session .send-invitation').attr('candidate-name', candidate_name);
            $('#choose_interview_session .send-invitation').attr('candidate-email', candidate_email);
        });

        $('#checkboxShipping').change(function () {
            if ($(this).is(':checked')) {
                $('.billing-address').addClass('hidden');
                $('.billing-input').val('');
            } else {
                $('.billing-address').removeClass('hidden');
            }
        });

        $('.remove-interview-session').click(function () {
            var id = $(this).attr('session-id');
            var applicationId = $(this).attr('application-id');

            if (id == null) {

                swal('Info', 'Interview session not found');

            } else {
                $('#modal_interview_session_list').modal('hide');

                swal({
                        title: "Do you want to remove this interview session?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "<?php echo base_url();?>employer/candidate/remove_interview_session",
                                method: "POST",
                                data: {
                                    session_id: id,
                                    application_id: applicationId,
                                },
                                success: function (response) {
                                    swal("Success", "Interview Schedule has been remove", "success");
                                    location.reload();
                                }
                            });
                        } else {
                            swal("Cancelled", "Interview session still exist", "error");
                        }
                        location.reload();
                    }
                );
            }
        })

        $('.disagree-reschedule').change(function () {
            $('.recreate-session').addClass('hidden');
        });

        $('.agree-reschedule').change(function () {
            $('.recreate-session').removeClass('hidden');
        });

        <?php if ($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == 'calendar') {?>

        // Calendar
        var AppCalendar = function () {

            return {
                //main function to initiate the module
                init: function () {
                    this.initCalendar();
                },

                initCalendar: function () {

                    if (!jQuery().fullCalendar) {
                        return;
                    }

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    var h = {};

                    if (App.isRTL()) {
                        if ($('#fullcalendar').parents(".portlet").width() <= 720) {
                            $('#fullcalendar').addClass("mobile");
                            h = {
                                right: 'title, prev, next',
                                center: '',
                                // left: 'agendaDay, agendaWeek, month, today'
                                left: ' month, today'
                            };
                        } else {
                            $('#fullcalendar').removeClass("mobile");
                            h = {
                                right: 'title',
                                center: '',
                                // left: 'agendaDay, agendaWeek, month, today, prev,next'
                                left: ' month, today, prev,next'
                            };
                        }
                    } else {
                        if ($('#fullcalendar').parents(".portlet ").width() <= 720) {
                            $('#fullcalendar').addClass("mobile");
                            h = {
                                left: 'title, prev, next',
                                center: '',
                                // right: 'today,month,agendaWeek,agendaDay'
                                right: 'month'
                            };
                        } else {
                            $('#fullcalendar').removeClass("mobile");
                            h = {
                                left: 'title',
                                center: '',
                                // right: 'prev,next,today,month,agendaWeek,agendaDay'
                                right: 'prev,next,month'
                            };
                        }
                    }

                    $('#fullcalendar').fullCalendar('destroy');
                    var invitation = <?php echo $invitation; ?>;
                    var invitation_calendar = [];
                    $.each(invitation, function (i, v) {
                        var color = '';

                        if (v.status == 'accept') {
                            color = 'green';
                        } else if (v.status == 'reject') {
                            color = 'red';
                        } else if (v.status == 'pending') {
                            color = 'yellow';
                        } else if (v.status == 'reschedule') {
                            color = 'blue';
                        } else {
                            color = 'grey';
                        }

                        invitation_calendar.push({
                            id: v.id,
                            title: v.title,
                            start: v.start_date,
                            end: v.end_date,
                            backgroundColor: App.getBrandColor(color)
                        })

                    });
                    $('#fullcalendar').fullCalendar({
                        header: h,
                        defaultView: 'month',
                        slotMinutes: 15,
                        editable: false,
                        droppable: false,
                        events: invitation_calendar,
                        eventClick: function (invitation_calendar, jsEvent, view) {
                            $('#modal_more_info_' + invitation_calendar.id).modal();
                        },
                    });
                }
            };
        }();
        AppCalendar.init();
        <?php } ?>

        // Notifications
        $('#notif_msg').slimScroll({
            height: '250px'
        });
        showNotif();
        setInterval(function () {
            showNotif()
        }, <?= GetInterval(); ?>);
        $("#count_notif").on("click", function () {
            $.ajax({
                url: "<?php echo base_url();?>setLastSeenNotif",
                method: "POST",
                success: function (response) {
                    var data = JSON.parse(response);
                    last_seen_notif = data.last_seen_notif;
                }
            });
        });
    });
    // Notif Show
    function showNotif() {
        $.ajax({
            url: "<?php echo base_url();?>notif",
            method: "POST",
            success: function (response) {
                var data = JSON.parse(response);

                if (data.message == "success") {
                    $("#notif_msg").html(data.notif);
                    $("#count_notif").html(data.total);
                    $("#count_notif_in").html(data.total_in);
                }
            }
        });
    }
    // Notif List
    function notif_list(param) {
        var source = param.getAttribute('data-source');
        $.ajax({
            url: "<?php echo base_url();?>clear-notif",
            method: "POST",
            data: {
                id: source
            },
            success: function (response) {
                var data = JSON.parse(response);

                if (data.message == "success") {
                    location.href = data.url;
                }
            }
        });
    }

</script>


</body>

</html>
