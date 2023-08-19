<x-map-master>
    <div id="map"></div>
    <div id="style-controls" style="position: absolute; top: 10px; left: 550px; z-index: 100;">
        <button class="btn btn-white" id="normalStyleButton">Street</button>
        <button class="btn btn-white" id="satelliteStyleButton">Satellite</button> 
    </div>
    <div id="search-box-general" style="position: absolute; top: 10px; right: 40px;  padding: 10px; z-index: 100;">
        <input class="form-control" type="text" id="search-input-general"
            placeholder="Rechercher une adresse , une ville , un lieu">
        <div id="suggestions-list" class="p-2 rounded"
            style="background-color: white; border: 1px solid #ccc; position: absolute; top: 60px; right: 0; left: 0; max-height: 150px; overflow-y: auto; display: none;">
        </div>
    </div>
    
    {{-- <div id="search-box-polygons"
        style="position: absolute; top: 10px; right: 100px; background-color: white; padding: 10px; border: 1px solid #ccc; z-index: 100;">
        <h3>Rechercher un Polygone :</h3>
        <input type="text" id="search-input-polygons" placeholder="Rechercher un polygone par nom">
        <h3>Filtrer par Superficie :</h3>
        <input type="number" id="area-filter-input" placeholder="Filtrer par superficie">
    </div> --}}


    <script>
        mapboxgl.accessToken = "pk.eyJ1IjoiZGlsYW5lMDUiLCJhIjoiY2xreWJydjNxMGd5aDNtc2lsMG5uYnU5ayJ9.WBERCXWXNAEzQWfwc1RwlA";
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/satellite-streets-v11', // style URL
            center: [11.5, 6.5], // Centre géographique du Cameroun
            zoom: 6 // Zoom initial
        });

        // var itemsFromController = @json($titles);
        // itemsFromController.forEach(function(item) {
        //     var jsonString = item.coordonnees;
        //     var coordinatesArray = JSON.parse(jsonString);
        //     var transformedCoordinates = [];

        //     for (var i = 0; i < coordinatesArray.length; i++) {
        //         var coords = coordinatesArray[i].split(', ');
        //         transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[1])]);
        //     }

        //     console.log(transformedCoordinates);
        // });

        var itemsFromController = @json($titles);
        var transformedCoordinates = []; // Déplacez la définition ici

        // itemsFromController.forEach(function(item) {
        //     var jsonString = item.coordonnees;
        //     var coordinatesArray = JSON.parse(jsonString);

        //     for (var i = 0; i < coordinatesArray.length; i++) {
        //         var coords = coordinatesArray[i].split(', ');
        //         transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[1])]);
        //     }
        // });

        // var itemsFromController = @json($titles);
        var polygons = [];

        itemsFromController.forEach(function(item) {
            var jsonString = item.coordonnees;
            var numero = item.numero_titre_foncier
            var superficie = item.superficie_du_TF_mere
            var coordinatesArray = JSON.parse(jsonString);
            var transformedCoordinates = [];

            for (var i = 0; i < coordinatesArray.length; i++) {
                var coords = coordinatesArray[i].split(', ');
                transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[
                1])]); // Notez l'inversion des coordonnées
            }
            console.log([transformedCoordinates]);
            polygons.push({
                "type": "Feature",
                "geometry": {
                    "type": "Polygon",
                    "coordinates": [transformedCoordinates]
                },
                "properties": {
                    "name": numero, // Remplacez par le nom approprié
                    "area": superficie // Remplacez par la superficie appropriée
                }
            });
        });

        // var test = [[
        //     [444, 4444],
        //     [555, 555],
        //     [6666, 666]
        // ]]
        // console.log(test)

        // console.log(polygons)


        // Coordonnées des limites géographiques du Cameroun
        var coordinates = [
            [8.48833621698, 2.11704563528], // Coin sud-ouest
            [16.0128524106, 13.0782712405] // Coin nord-est
        ];

        map.fitBounds(coordinates);

        const normalStyleButton = document.getElementById('normalStyleButton');
        normalStyleButton.addEventListener('click', () => {
            map.setStyle('mapbox://styles/mapbox/light-v11');
            addPolygonsToMap(); // Réajouter les polygones après avoir changé de style
        });

        // Écouteur d'événement pour le bouton de style satellite
        const satelliteStyleButton = document.getElementById('satelliteStyleButton');
        satelliteStyleButton.addEventListener('click', () => {
            map.setStyle('mapbox://styles/mapbox/satellite-streets-v11');
            addPolygonsToMap(); // Réajouter les polygones après avoir changé de style
        });

        function addSearchMarker(lngLat) {
            new mapboxgl.Marker().setLngLat(lngLat).addTo(map);
        }

        map.on('load', () => {
            // Données GeoJSON pour plusieurs polygones

            // const polygons = [{
            //         "type": "Feature",
            //         "geometry": {
            //             "type": "Polygon",
            //             "coordinates": [
            //                 [
            //                     [9.718759675044595, 4.039558639732135],
            //                     [9.718759675044595, 4.035245670812884],
            //                     [9.724442532323536, 4.035245670812884],
            //                     [9.724442532323536, 4.039558639732135],
            //                     [9.718759675044595, 4.039558639732135]
            //                 ]
            //             ]
            //         },
            //         "properties": {
            //             "name": "1Poly",
            //             "area": 10
            //         }
            //     },
            //     {
            //         "type": "Feature",
            //         "geometry": {
            //             "type": "Polygon",
            //             "coordinates": [
            //                 [
            //                     [9.696401208736802, 4.074504199522764],
            //                     [9.696401208736802, 4.054790199549046],
            //                     [9.725934055296506, 4.054790199549046],
            //                     [9.725934055296506, 4.074504199522764],
            //                     [9.696401208736802, 4.074504199522764]
            //                 ]
            //             ]
            //         },
            //         "properties": {
            //             "name": "2Poly",
            //             "area": 15
            //         }
            //     },
            //     {
            //         "type": "Feature",
            //         "geometry": {
            //             "type": "Polygon",
            //             "coordinates": [
            //                 [
            //                     [
            //                         9.725483172143782,
            //                         4.072255478648543
            //                     ],
            //                     [
            //                         9.725483172143782,
            //                         4.0484186517613665
            //                     ],
            //                     [
            //                         9.756969845701235,
            //                         4.0484186517613665
            //                     ],
            //                     [
            //                         9.756969845701235,
            //                         4.072255478648543
            //                     ],
            //                     [
            //                         9.725483172143782,
            //                         4.072255478648543
            //                     ]
            //                 ]
            //             ]
            //         },
            //         "properties": {
            //             "name": "Polygone 3",
            //             "area": 16
            //         }
            //     }
            //     // Ajoutez d'autres polygones de la même manière
            // ];


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

                const coordinates = e.lngLat;
                const popup = new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(`
            <h3>${feature.properties.name}</h3>
            <p><strong>Superficie :</strong> ${feature.properties.area} km²</p>
            <!-- Ajoutez d'autres propriétés de votre choix ici -->
        `)
                    .addTo(map);
            });
            map.on('mousemove', 'polygons', (e) => {
                map.getCanvas().style.cursor = 'pointer';
            });

            map.on('mouseleave', 'polygons', () => {
                map.getCanvas().style.cursor = '';
            });

            const searchInputGeneral = document.getElementById('search-input-general');
            const suggestionsList = document.getElementById('suggestions-list');

            searchInputGeneral.addEventListener('input', async function(event) {
                const searchTerm = searchInputGeneral.value.trim();
                if (searchTerm.length > 0) {
                    try {
                        const response = await fetch(
                            `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(searchTerm)}.json?access_token=${mapboxgl.accessToken}`
                        );
                        const data = await response.json();
                        if (data && data.features && data.features.length > 0) {
                            const suggestions = data.features.map(feature => feature.place_name);
                            showSuggestions(suggestions);
                        } else {
                            hideSuggestions();
                        }
                    } catch (error) {
                        console.error(error);
                    }
                } else {
                    hideSuggestions();
                }
            });

            searchInputGeneral.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    searchForLocation(searchInputGeneral.value);
                }
            });

            function showSuggestions(suggestions) {
                suggestionsList.innerHTML = '';
                suggestions.forEach(suggestion => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.innerText = suggestion;
                    suggestionItem.classList.add('suggestion-item');
                    suggestionItem.addEventListener('click', () => {
                        searchInputGeneral.value = suggestion;
                        searchForLocation(
                            suggestion); // Effectuer la recherche lors du clic sur la suggestion
                        hideSuggestions();
                    });
                    suggestionItem.addEventListener('mouseover', () => {
                        suggestionItem.style.backgroundColor = '#f2f2f2';
                        suggestionItem.style.cursor = 'pointer';
                    });
                    suggestionItem.addEventListener('mouseout', () => {
                        suggestionItem.style.backgroundColor = 'white';
                    });
                    suggestionsList.appendChild(suggestionItem);
                });
                suggestionsList.style.display = 'block';
            }

            function hideSuggestions() {
                suggestionsList.innerHTML = '';
                suggestionsList.style.display = 'none';
            }

            function searchForLocation(query) {
                fetch(
                        `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(query)}.json?access_token=${mapboxgl.accessToken}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.features && data.features.length > 0) {
                            const coordinates = data.features[0].geometry.coordinates;
                            map.flyTo({
                                center: coordinates,
                                zoom: 12
                            });
                            addSearchMarker(coordinates);
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }


            const searchInputPolygons = document.getElementById('search-input-polygons');
            const areaFilterInput = document.getElementById('area-filter-input');

            function updateFilters() {
                const nameFilterValue = searchInputPolygons.value.trim().toLowerCase();
                const areaFilterValue = parseFloat(areaFilterInput.value.trim());

                const filters = [];

                if (nameFilterValue !== '') {
                    filters.push(['ilike', ['get', 'name'], `%${nameFilterValue}%`]);
                }

                if (!isNaN(areaFilterValue)) {
                    filters.push(['>=', ['get', 'area'], areaFilterValue]);
                }

                map.setFilter('polygons', filters);
            }

            searchInputPolygons.addEventListener('input', updateFilters);
            areaFilterInput.addEventListener('input', updateFilters);

            // Écouteur d'événement pour le clic sur un polygone
            map.on('click', 'polygons', (e) => {
                const features = map.queryRenderedFeatures(e.point, {
                    layers: ['polygons']
                });

                if (!features.length) {
                    return;
                }

                const feature = features[0];

                const coordinates = e.lngLat;
                map.flyTo({
                    center: coordinates,
                    zoom: 12
                });

                // Mettre en évidence le polygone sélectionné
                map.setFilter('polygons-highlighted', ['==', 'name', feature.properties.name]);
            });

            // Ajouter une couche pour mettre en évidence les polygones sélectionnés
            map.addLayer({
                'id': 'polygons-highlighted',
                'type': 'fill',
                'source': 'polygons',
                'layout': {},
                'paint': {
                    'fill-color': '#00FF00', // green color fill
                    'fill-opacity': 0.5
                },
                'filter': ['==', 'name', '']
            });


        });
    </script>
</x-map-master>
