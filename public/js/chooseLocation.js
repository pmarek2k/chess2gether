import {accessToken} from './config.js';

mapboxgl.accessToken = accessToken;

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [19.944981, 50.064651], // starting position [lng, lat]
    zoom: 12 // starting zoom
});

const spinner = document.getElementById("spinner");
const mapDiv = document.getElementById("map");
const button = document.getElementsByClassName("submitMarkerButton")[0];

let geojson = {
    "name":"MyFeatureType",
    "type":"FeatureCollection",
    "features":[]
};

spinner.removeAttribute('hidden');
fetch("/getLocations", {
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
}).then(function (response) {
    return response.json();
}).then(function (events) {
    loadEvents(events)
    spinner.setAttribute('hidden', 'true');
    button.removeAttribute('hidden');
    button.disabled = true;
});

function loadEvents(events) {
    for(let i = 0; i < events.length; i++){
        geojson.features.push({ "type": "Feature","geometry": {"type": "Point","coordinates": [events[i].location.latitude, events[i].location.longitude]},"properties": {'title':events[i].name, 'creator':events[i].creator, 'begin_time' : events[i].begin_time, 'max_players' : events[i].max_players} });
    }
    addMarkers(geojson);

}

function addMarkers(geojson){
    for (const feature of geojson.features) {
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        const marker = new mapboxgl.Marker(el)
            .setLngLat(feature.geometry.coordinates)
            .setPopup(
                new mapboxgl.Popup({offset: 25}) // add popups
                    .setHTML(
                        `<h3>${feature.properties.title}</h3><p>Creator: ${feature.properties.creator}</p><p>Date: ${feature.properties.begin_time.replace('T', ' ')}</p><p>Max players: ${feature.properties.max_players}</p>`
                    ))
            .addTo(map);
        marker.title = feature.properties.title;
        marker.getElement().addEventListener('click', () => {
            let eventNameForm = document.getElementById("event-name");

            button.disabled = false;
            eventNameForm.value = marker.title;
        })
    }
}
