/* Global variables */
let map;
let userLocationMarker;
let shopMarker;
const shop = {lat: 47.429716956866194, lng: 9.38343311553618};
let shopInfo = new google.maps.InfoWindow();
let autocomplete;
let deliveryRange;


/* Variable for route or path showing */
const directionsService = new google.maps.DirectionsService();
const directionsRenderer = new google.maps.DirectionsRenderer({suppressMarkers: true});


/* Initialize map */
map = new google.maps.Map(document.getElementById('map'),{
    zoom: 10
});
directionsRenderer.setMap(map);

shopMarker = new google.maps.Marker({
    map,
    draggable:false,
    position:shop
});
userLocationMarker = new google.maps.Marker({
    map,
    draggable:true,
    animation: google.maps.Animation.DROP
});

shopInfo.setContent("<b>Super Mario<b>");
shopInfo.open(map,shopMarker);

/* Map boundary */
deliveryRange = new google.maps.Circle({
    center: shop,
    radius: 10000,
    fillOpacity: 0,
    strokeColor: "#FF0000",
    strokeWeight: 2,
    map: map
});

/* Autocomplete Input Field*/
autocomplete = new google.maps.places.Autocomplete(document.getElementById('ch-address'),
{
    bounds: deliveryRange.getBounds(),
    strictBounds: true
});
/* get new Location if position has changed and autofill input field */
autocomplete.addListener('place_changed',()=>{
    let location = autocomplete.getPlace();

    if(location.geometry == false)
    {
        alert("Location is not available");
        document.getElementById('ch-address').value = "";
    }
    else{
        showMap(location.geometry.location);
        storeCoordsInForm({lat: location.geometry.location.lat(), lng: location.geometry.location.lng()});
    }
});

/* Bounce animation */
function toggleBounce()
{
    if(userLocationMarker.getAnimation() !== null)
    {
        userLocationMarker.setAnimation(null);
    }
    else{
        userLocationMarker.setAnimation(google.maps.Animation.BOUNCE);
    }
}

/* set map coordinates and show Map */
function mapCoordinates(coordinate)
{
    let newCoordinate = coordinate;

    map.setCenter(shop);
    userLocationMarker.setPosition(newCoordinate);
    drawRoute(directionsRenderer,directionsService,newCoordinate);
    getAddressByCoords(new google.maps.Geocoder(),newCoordinate);
    storeCoordsInForm(newCoordinate);

    /* Click event listener for 'userLocationMarker' */
    userLocationMarker.addListener('click',toggleBounce);
    userLocationMarker.addListener('dragend',()=>{
        if(!deliveryRange.getBounds().contains(userLocationMarker.getPosition()))
        {
            userLocationMarker.setPosition(newCoordinate);
        }
        else{
            newCoordinate = {lat: userLocationMarker.position.lat(), lng: userLocationMarker.position.lng()};
            getAddressByCoords(new google.maps.Geocoder(),newCoordinate);
            drawRoute(directionsRenderer,directionsService,newCoordinate);
            storeCoordsInForm(newCoordinate);
        }
    });
}


function drawRoute(directionsRenderer,directionsService,newCoordinate)
{
    directionsService.route({
        origin: shop,
        destination: newCoordinate,
        travelMode: google.maps.TravelMode.DRIVING
    },(resp,status)=>{
        if(status == "OK")
        {
            directionsRenderer.setDirections(resp);
        }
        else
        {
            alert("We can't find a proper route to your destination")
        }
    });
}

/* get address from the coordinates */
function getAddressByCoords(geocoder,coordinate)
{
    geocoder.geocode({location: coordinate},(resp,status)=>{
        if(status == "OK")
        {
            if(resp[0])
            {
                
                document.getElementById("ch-address").value = resp[0].formatted_address.replace(', Switzerland','');
            }
        }
    });
}

function storeCoordsInForm(coordinate)
{
    document.getElementById('lat').value = coordinate.lat;
    document.getElementById('lng').value = coordinate.lng;
}