import {accessToken} from './config.js';

mapboxgl.accessToken = accessToken;

let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [19.944981, 50.064651], // starting position [lng, lat]
    zoom: 12 // starting zoom
});

let marker = new mapboxgl.Marker();
let coordinates;
const button = document.getElementsByClassName("submitMarkerButton")[0];
button.disabled = true;

function add_marker (event) {
    coordinates = event.lngLat;
    console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
    marker.setLngLat(coordinates).addTo(map);
    const button = document.getElementsByClassName("submitMarkerButton")[0];
    button.disabled = false;

    let longitudeForm = document.getElementById("longitude");
    let latitudeForm = document.getElementById("latitude");

    longitudeForm.value = coordinates.lng;
    latitudeForm.value = coordinates.lat;
}

map.on('click', add_marker);