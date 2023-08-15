<x-map-master>
    <div id="map"></div>
    <div id="style-controls" style="position: absolute; top: 10px; left: 10px; z-index: 100;">
        <button class="btn btn-primary" id="normalStyleButton">Style Normal</button>
        <button class="btn btn-primary" id="satelliteStyleButton">Style Satellite</button>
    </div>
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
                                [
                                    9.718759675044595,
                                    4.039558639732135
                                ],
                                [
                                    9.718759675044595,
                                    4.035245670812884
                                ],
                                [
                                    9.724442532323536,
                                    4.035245670812884
                                ],
                                [
                                    9.724442532323536,
                                    4.039558639732135
                                ],
                                [
                                    9.718759675044595,
                                    4.039558639732135
                                ]
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

            // Add navigation controls
            const nav = new mapboxgl.NavigationControl({
                showCompass: false // Masquer la boussole
            });
            map.addControl(nav, 'top-right');

            // Add style switch buttons
            const normalStyleButton = document.getElementById('normalStyleButton');
            const satelliteStyleButton = document.getElementById('satelliteStyleButton');

            normalStyleButton.addEventListener('click', () => {
                map.setStyle('mapbox://styles/mapbox/light-v11');
            });

            satelliteStyleButton.addEventListener('click', () => {
                map.setStyle('mapbox://styles/mapbox/satellite-v9');
            });
        });
    </script>
</x-map-master>
