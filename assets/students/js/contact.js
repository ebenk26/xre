var Contact = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#gmapbg',
				lat: 3.0702144,
				lng: 101.6076573
			  });
			   var marker = map.addMarker({
		            lat: 3.0702144,
					lng: 101.6076573,
		            title: 'Xremo .',
		            infoWindow: {
		                content: "<b>Xremo Sdn. Bhd.</b> <br> Suite 20-01 & 20-02B, <br> Level 20 , The Pinnacle, <br> Persiaran Lagoon  Bandar Sunway, <br> 47500 Subang Jaya, Selangor, Malaysia. <br>  <br>  "
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();

jQuery(document).ready(function() {    
   Contact.init(); 
});

