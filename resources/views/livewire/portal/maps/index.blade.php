<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Affichage des Titres Fonciers</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; overflow:hidden }
</style>
</head>
<body>
<div id="map"></div>
<script>
    mapboxgl.accessToken = '{{ env('MAPBOX_API_KEY') }}';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/light-v11', // style URL
        center: [11.5, 6.5], // Centre géographique du Cameroun
        zoom: 6 // Zoom initial
    });

    // Coordonnées des limites géographiques du Cameroun
    var coordinates = [
        [8.48833621698, 2.11704563528], // Coin sud-ouest
        [16.0128524106, 13.0782712405]  // Coin nord-est
    ];

    map.fitBounds(coordinates);

    map.on('load', () => {
        // Données des titres fonciers au format GeoJSON
        var geojson = {
            'type': 'FeatureCollection',
            'features': [
                @foreach ($titles as $title) 
                {
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Polygon',
                        'coordinates': [
                            [
                                {!! json_encode($title->coordonnees) !!}
                            ]
                        ]
                    },
                    'properties': {
                        'title': '{{ $title->numero_titre_foncier }}'
                    }
                },
                @endforeach
            ]
        };

        // Ajouter une source de données GeoJSON.
        map.addSource('titles', {
            'type': 'geojson',
            'data': geojson
        });

        // Ajouter une couche pour afficher les formes des titres fonciers.
        map.addLayer({
            'id': 'titles-layer',
            'type': 'fill',
            'source': 'titles',
            'layout': {},
            'paint': {
                'fill-color': '#00FF00', // Couleur verte
                'fill-opacity': 0.5
            }
        });
    });
</script>
</body>
</html>
