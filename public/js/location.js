function initMap() {

    var myLatlng = { lat:  50.85045, lng:  4.34878 };
    var lat = parseFloat(document.getElementById("lat").value);
    var long = parseFloat(document.getElementById("long").value);
    if(isNaN(lat) || isNaN(long)){
         myLatlng = { lat:  50.85045, lng:  4.34878 };
    }
    else{
         myLatlng = { lat:  lat, lng:  long };
    }

    const map = new google.maps.Map(document.getElementById("google-map"), {
        zoom: 14,
        center: myLatlng,
        streetViewControl: false,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
        content: "Locatie",
        position: myLatlng,

    });

    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
            "Locatie Evenement"
        );
        var coordinates = mapsMouseEvent.latLng.toJSON();
        document.getElementById("long").value = coordinates.lng;
        document.getElementById("lat").value = coordinates.lat;
        infoWindow.open(map);
    });
    }

    window.initMap = initMap;