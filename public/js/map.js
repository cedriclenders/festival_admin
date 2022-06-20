/**
     * Create google maps Map instance.
     * @param {number} lat
     * @param {number} lng
     * @return {Object}
     */
 const createMap = ({ lat, lng }) => {
    return new google.maps.Map(document.getElementById('google-map'), {
      center: { lat, lng },
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP, 
      styles: [ 
        { 
          "featureType": "poi", 
          "stylers": [ 
            { "visibility": "off" } 
          ] 
        } 
      ] 
    });
  };
  
  /**
   * Create google maps Marker instance.
   * @param {Object} map
   * @param {Object} position
   * @param {Object} icon
   * @param {Object} title
   * @return {Object}
   */
  const createMarker = ({ map, position, icon, title }) => {
    return new google.maps.Marker({ map, position, icon, title});
  };

  const createMarkerWithLabel = ({ map, position, title, label }) => {
    return new google.maps.Marker({ map, position, title, label});
  };

  
  /**
   * Initialize the application.
   * Automatically called by the google maps API once it's loaded.
  */

 function init() {

    $.ajax(
        {
            url: "/markers-data",
            type: 'GET',
            dataType: 'text',
            success: function (results) {
                initialize(results);
            }
        });

    function initialize(results) { 
     
        const initialPosition = { lat: 50.967825379243, lng: 4.6907083651123 };
        
        const map = createMap(initialPosition);

        var resultsJson = JSON.parse(results);
        var count = Object.keys(resultsJson).length;

        for (var i of Object.keys(resultsJson)) {
            var resultPosition = { lat: resultsJson[i].lat, lng: resultsJson[i].long };
            this["marker"+i] = createMarker({ 
                map, position: resultPosition, icon: resultsJson[i].emoji_path, title: resultsJson[i].name,
            });
        }
    }   
};