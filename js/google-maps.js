function initMap() {
    // Latitude and Longitude
    var myLatLng = {lat: -8.5031428, lng: 115.2629808};

    var map = new google.maps.Map(document.getElementById('google-maps'), {
        zoom: 17,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Jalan Raya Ubud No.30, Ubud, Kabupaten Gianyar, Bali' // Title Location
    });
}