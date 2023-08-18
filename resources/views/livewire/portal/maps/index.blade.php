<x-map-master>
    <div id="map"></div>
    <div id="style-controls" style="position: absolute; top: 10px; left: 450px; z-index: 100;">
        <button class="btn btn-primary" id="normalStyleButton">Style Normal</button>
        <button class="btn btn-primary" id="satelliteStyleButton">Style Satellite</button>
    </div>
    <div id="info-box" style="position: absolute; top: 10px; right: 10px; background-color: white; padding: 10px; border: 1px solid #ccc; z-index: 100;">
        <h3>Informations sur le Titre Foncier sélectionné :</h3>
        <div id="info-content"></div>
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
            // Données GeoJSON pour plusieurs polygones
            const polygons = [
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [9.718759675044595, 4.039558639732135],
                                [9.718759675044595, 4.035245670812884],
                                [9.724442532323536, 4.035245670812884],
                                [9.724442532323536, 4.039558639732135],
                                [9.718759675044595, 4.039558639732135]
                            ]
                        ]
                    },
                    "properties": {
                        "name": "Polygone 1",
                        "area": 10
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [9.696401208736802, 4.074504199522764],
                                [9.696401208736802, 4.054790199549046],
                                [9.725934055296506, 4.054790199549046],
                                [9.725934055296506, 4.074504199522764],
                                [9.696401208736802, 4.074504199522764]
                            ]
                        ]
                    },
                    "properties": {
                        "name": "Polygone 2",
                        "area": 15
                    }
                }
                // Ajoutez d'autres polygones de la même manière
            ];

            map.addSource('polygons', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': polygons
                }
            });

            // Ajoutez une couche pour visualiser les polygones
            map.addLayer({
                'id': 'polygons',
                'type': 'fill',
                'source': 'polygons',
                'layout': {},
                'paint': {
                    'fill-color': '#ff9900', // orange color fill
                    'fill-opacity': 0.5
                }
            });

            // ... Votre code existant ...

            map.on('click', 'polygons', (e) => {
                const features = map.queryRenderedFeatures(e.point, {
                    layers: ['polygons']
                });

                if (!features.length) {
                    return;
                }

                const feature = features[0];

                const infoContent = document.getElementById('info-content');
                infoContent.innerHTML = `
                    <p><strong>Nom :</strong> ${feature.properties.name}</p>
                    <p><strong>Superficie :</strong> ${feature.properties.area} km²</p>
                    <!-- Ajoutez d'autres propriétés de votre choix ici -->
                `;
            });

            map.on('mousemove', 'polygons', (e) => {
                map.getCanvas().style.cursor = 'pointer';
            });

            map.on('mouseleave', 'polygons', () => {
                map.getCanvas().style.cursor = '';
            });
        });
    </script>
</x-map-master>
