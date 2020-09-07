$(document).ready(function(){

    //var image = '../img/logo-map.png';

    function address(){

       /* $.post(
            'Places/getPlacesAjax',
            function(data){
                var length = data.length;
                for(var i =0; i < length; i++){
                    initialize(data[i].Place.address, data[i].Place.id);
                }
            }, 'json'
        )*/
        initialize("18-24 rue Coriolis - 75012 Paris", 1);
        initialize("124, avenue du Général Leclerc - 91802 Brunoy Cedex", 2);

    }

    function initialize(address, id){

        var geocoder;
        var map;
        var mapOptions =
        {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl:false,
            streetViewControl:false,
            draggable:false
        }

        map = new google.maps.Map(document.getElementById('google-map-'+id), mapOptions);

        geocoder = new google.maps.Geocoder();
        geocoder.geocode( { 'address': address}, function(results, status){
            if (status == google.maps.GeocoderStatus.OK){
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                        map: map,
                        //icon:image,
                        position: results[0].geometry.location
                    });
            }else{
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load',address);

});



