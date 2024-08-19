<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Soficam Land - Maps</title>
    <style>
        html,
        body,
        #viewDiv {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://js.arcgis.com/4.27/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.27/"></script>
    <script>
        require([
            "esri/config",
            "esri/Map",
            "esri/views/MapView",
            "esri/Graphic",
            "esri/layers/GraphicsLayer",
            "esri/widgets/Search"
        ], function(esriConfig, Map, MapView, Graphic, GraphicsLayer, Search) {

            // Configure the API key
            esriConfig.apiKey = "AAPK446b8141b13c40dab9f67038a712d37bBRypjChZVBGs585WQsWhvIokmAMlXjAsbAQ3YJ7pDt3dsRW3cHEinKR_7zyBVx-m";

            // Create the map
            const map = new Map({
                basemap: "arcgis-topographic"
            });

            // Create the map view
            const view = new MapView({
                map: map,
                center: [{{ $longitude }}, {{ $latitude }}], // Longitude, latitude
                zoom: 13,
                container: "viewDiv"
            });

            // Create a graphics layer
            const graphicsLayer = new GraphicsLayer();
            map.add(graphicsLayer);

            // Get data from the controller
            var itemsFromController = @json($titles);
            var polygons = [];

            // Process the data to create polygons
            itemsFromController.forEach(function(item) {
                var jsonString = item.coordonnees;
                var numero = item.numero_titre_foncier;
                var superficie = item.superficie_du_TF_mere;
                var coordinatesArray = JSON.parse(jsonString);
                var transformedCoordinates = [];

                // Convert coordinates to the appropriate format
                for (var i = 0; i < coordinatesArray.length; i++) {
                    var coords = coordinatesArray[i].split(',');
                    transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[1])]);
                }

                // Collect owners' names
                var proprietaires = [];
                item.users.forEach(function(proprietaire) {
                    proprietaires.push(proprietaire.last_name + ' ' + proprietaire.first_name);
                });

                // Prepare the data for the polygon
                var proprietairesText = proprietaires.join('<br>');
                polygons.push({
                    "name": numero,
                    "area": superficie,
                    "proprietaires": proprietairesText,
                    "rings": transformedCoordinates
                });
            });

            // Define a simple fill symbol
            const simpleFillSymbol = {
                type: "simple-fill",
                color: [227, 139, 79, 0.8],
                outline: {
                    color: [255, 255, 255],
                    width: 1
                }
            };

            // Add each polygon to the graphics layer
            polygons.forEach(polygonData => {
                const polygonGraphic = new Graphic({
                    geometry: {
                        type: "polygon",
                        rings: polygonData.rings
                    },
                    symbol: simpleFillSymbol,
                    attributes: {
                        name: polygonData.name,
                        area: polygonData.area,
                        proprietaires: polygonData.proprietaires
                    },
                    popupTemplate: {
                        title: "Numero TF: {name}",
                        content: "<b>Superficie</b> Tf: {area} m2 <br> <b>Proprietaires </b>: {proprietaires}"
                    }
                });
                graphicsLayer.add(polygonGraphic);
            });

            // Create the search widget
            const search = new Search({
                view: view,
                sources: [
                    {
                        layer: graphicsLayer,  // The layer to search within
                        searchFields: ["name"],  // The field to search
                        displayField: "name",  // The field to display in the search results
                        exactMatch: false,  // Allow partial matches
                        outFields: ["*"],  // Return all fields in the results
                        name: "Titres Fonciers",  // Name of the source
                        placeholder: "Chercher par numéro TF"  // Placeholder text in the search box
                    }
                ]
            });

            // Add the search widget to the view
            view.ui.add(search, "top-right");
        });
    </script>
</head>

<body>
    <div id="viewDiv"></div>
</body>

</html>
