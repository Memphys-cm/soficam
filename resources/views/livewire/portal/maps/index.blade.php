<x-map-master>
    <div id="map"></div>
    <script>
        mapboxgl.accessToken = "pk.eyJ1IjoiZGlsYW5lMDUiLCJhIjoiY2xreWJydjNxMGd5aDNtc2lsMG5uYnU5ayJ9.WBERCXWXNAEzQWfwc1RwlA";
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/light-v11', // style URL
            center: [11.5, 6.5], // Centre géographique du Cameroun
            zoom: 6 // Zoom initial
        });

        // Coordonnées des limites géographiques du Cameroun
        var coordinates = [
            [8.48833621698, 2.11704563528], // Coin sud-ouest
            [16.0128524106, 13.0782712405] // Coin nord-est
        ];

        map.fitBounds(coordinates);

        map.on('load', () => {
            // Add a data source containing GeoJSON data.
            map.addSource('maine', {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Polygon',
                        // These coordinates outline Maine.
                        'coordinates': [
                            [
                                [564321.00, 452564.00],
                                [564335.746, 452548.271],
                                [564315.224, 452531.059],
                                [564303.601, 452544.471],
                                [564321.00, 452564.00],
                            ]
                        ]
                    }
                }
            });

            // Add a new layer to visualize the polygon.
            map.addLayer({
                'id': 'maine',
                'type': 'fill',
                'source': 'maine', // reference the data source
                'layout': {},
                'paint': {
                    'fill-color': '#0080ff', // blue color fill
                    'fill-opacity': 0.5
                }
            });
            // Add a black outline around the polygon.
            map.addLayer({
                'id': 'outline',
                'type': 'line',
                'source': 'maine',
                'layout': {},
                'paint': {
                    'line-color': '#000',
                    'line-width': 3
                }
            });
        });
    </script>
</x-map-master>
