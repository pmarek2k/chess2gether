<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href ="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <title>Home</title>
</head>
<body>
<div class = navbar>
    <a class = hvr-underline-from-center href = home>chess2gether</a>
    <a class = hvr-underline-from-center href = "login">USERNAME</a>
</div>
<div class = main-content>
    <div id='map'></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidGl4aWFubyIsImEiOiJja3dseWFldG4waDNmMzBsbnJqcXFobnVyIn0.i1K3Zp02kzh9YSrF1jl1aQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [19.944981, 50.064651], // starting position [lng, lat]
            zoom: 12 // starting zoom
        });
    </script>
</div>
</body>
</html>