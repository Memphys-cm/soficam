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

            esriConfig.apiKey =
                "AAPK446b8141b13c40dab9f67038a712d37bBRypjChZVBGs585WQsWhvIokmAMlXjAsbAQ3YJ7pDt3dsRW3cHEinKR_7zyBVx-m";

            const map = new Map({
                basemap: "arcgis-topographic"
            });

            const view = new MapView({
                map: map,
                center: [{{ $longitude }}, {{ $latitude }}],
                zoom: 13,
                container: "viewDiv"
            });

            const graphicsLayer = new GraphicsLayer();
            map.add(graphicsLayer);

            // Fetching both Titres Fonciers and Immatriculations
            var titlesFromController = @json($titles);
            var immatriculationsFromController = @json($immatriculations);

            var titlePolygons = [];
            var immatriculationPolygons = [];

            // Processing Titres Fonciers
            titlesFromController.forEach(function(item) {
                var jsonString = item.coordonnees;
                var numero = item.numero_titre_foncier;
                var marketValue = item.land.market_value;
                var mercurial = item.sub_division.prix_minima_m2;
                var superficie = item.superficie_du_TF_mere;
                var coordinatesArray = JSON.parse(jsonString);
                var transformedCoordinates = [];

                for (var i = 0; i < coordinatesArray.length; i++) {
                    var coords = coordinatesArray[i].split(',');
                    transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[1])]);
                }

                var proprietaires = [];
                item.users.forEach(function(proprietaire) {
                    proprietaires.push(proprietaire.last_name + ' ' + proprietaire.first_name);
                });

                var proprietairesText = proprietaires.join('<br>');
                titlePolygons.push({
                    "name": numero,
                    "market_value": marketValue, // Stocker la valeur vénale
                    "mercurial": mercurial,
                    "area": superficie,
                    "proprietaires": proprietairesText,
                    "rings": transformedCoordinates
                });
            });

            // Processing Immatriculations (similar to Titles)
            immatriculationsFromController.forEach(function(item) {
                var jsonString = item.coordonnees;
                var numero = item.reference;
                var surface = item.superficie;
                var coordinatesArray = JSON.parse(jsonString);
                var transformedCoordinates = [];

                for (var i = 0; i < coordinatesArray.length; i++) {
                    var coords = coordinatesArray[i].split(',');
                    transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[1])]);
                }

                var proprietaires = [];
                item.users.forEach(function(proprietaire) {
                    proprietaires.push(proprietaire.last_name + ' ' + proprietaire.first_name);
                });

                var proprietairesText = proprietaires.join('<br>');
                immatriculationPolygons.push({
                    "name": numero,
                    "area": surface,
                    "proprietaires": proprietairesText,
                    "rings": transformedCoordinates
                });
            });

            // Symbol for Titres Fonciers (orange)
            const titleFillSymbol = {
                type: "simple-fill",
                color: [227, 139, 79, 0.8],
                outline: {
                    color: [255, 255, 255 ],
                    width: 1
                }
            };

            // Symbol for Immatriculations (blue)
            const immatriculationFillSymbol = {
                type: "simple-fill",
                color: [79, 139, 227, 0.8],
                outline: {
                    color: [255, 255, 255],
                    width: 1
                }
            };

            // Add Titres Fonciers to the map
            titlePolygons.forEach(polygonData => {
                const polygonGraphic = new Graphic({
                    geometry: {
                        type: "polygon",
                        rings: polygonData.rings
                    },
                    symbol: titleFillSymbol,
                    attributes: {
                        name: polygonData.name,
                        area: polygonData.area,
                        market_value: polygonData.market_value, // Ajouter la valeur vénale ici
                        mercurial: polygonData.mercurial,
                        proprietaires: polygonData.proprietaires
                    },
                    popupTemplate: {
                        title: "Numero TF: {name}",
                        content: "<b>Superficie</b>: {area} m²<br>" +
                            "<b>Valeur vénale</b>: {market_value} FCFA /m2 <br>" +
                            "<b>Prix Mercurial</b>: {mercurial} FCFA /m2 <br>" +
                            // Afficher la valeur vénale
                            "<b>Proprietaires</b>: {proprietaires}"
                    }
                });
                graphicsLayer.add(polygonGraphic);
            });

            // Add Immatriculations to the map
            immatriculationPolygons.forEach(polygonData => {
                const polygonGraphic = new Graphic({
                    geometry: {
                        type: "polygon",
                        rings: polygonData.rings
                    },
                    symbol: immatriculationFillSymbol,
                    attributes: {
                        name: polygonData.reference,
                        area: polygonData.area,
                        proprietaires: polygonData.proprietaires
                    },
                    popupTemplate: {
                        title: "Numero Immatriculation: {name}",
                        content: "<b>Surface</b>: {area} m²<br><b>Proprietaires</b>: {proprietaires}"
                    }
                });
                graphicsLayer.add(polygonGraphic);
            });

            // Search Widget
            const search = new Search({
                view: view,
                sources: [{
                    layer: graphicsLayer,
                    searchFields: ["name"],
                    displayField: "name",
                    exactMatch: false,
                    outFields: ["*"],
                    name: "Titres Fonciers & Immatriculations",
                    placeholder: "Chercher par numéro"
                }]
            });

            view.ui.add(search, "top-right");
        });
    </script>
</head>

<body>
    <div id="viewDiv"></div>
</body>

</html>
