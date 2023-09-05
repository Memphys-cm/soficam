<html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> Soficam - Maps </title>
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
                basemap: "arcgis-topographic" //Basemap layer service
            });

            const view = new MapView({
                map: map,
                center: [{{ $longitude }}, {{ $latitude }}], //Longitude, latitude
                // center: [11.5, 6.5], //Longitude, latitude
                zoom: 13,
                container: "viewDiv"
            });

            const graphicsLayer = new GraphicsLayer();
            map.add(graphicsLayer);

            const point = { //Create a point
                type: "point",
                longitude: -118.80657463861,
                latitude: 34.0005930608889
            };
            const simpleMarkerSymbol = {
                type: "simple-marker",
                color: [226, 119, 40], // Orange
                outline: {
                    color: [255, 255, 255], // White
                    width: 1
                }
            };

            const pointGraphic = new Graphic({
                geometry: point,
                symbol: simpleMarkerSymbol
            });
            graphicsLayer.add(pointGraphic);

            // Create a line geometry
            const polyline = {
                type: "polyline",
                paths: [
                    [-118.821527826096, 34.0139576938577], //Longitude, latitude
                    [-118.814893761649, 34.0080602407843], //Longitude, latitude
                    [-118.808878330345, 34.0016642996246] //Longitude, latitude
                ]
            };
            const simpleLineSymbol = {
                type: "simple-line",
                color: [226, 119, 40], // Orange
                width: 2
            };

            const polylineGraphic = new Graphic({
                geometry: polyline,
                symbol: simpleLineSymbol
            });
            graphicsLayer.add(polylineGraphic);

            // Create a polygon geometry

            var itemsFromController = @json($titles);
            var transformedCoordinates = [];

            var polygons = [];

            itemsFromController.forEach(function(item) {
                var jsonString = item.coordonnees;
                var numero = item.numero_titre_foncier
                var superficie = item.superficie_du_TF_mere
                var coordinatesArray = JSON.parse(jsonString);
                var transformedCoordinates = [];

                for (var i = 0; i < coordinatesArray.length; i++) {
                    var coords = coordinatesArray[i].split(',');
                    transformedCoordinates.push([parseFloat(coords[0]), parseFloat(coords[
                        1])]); // Notez l'inversion des coordonnées
                }
                // console.log([transformedCoordinates]);
                var proprietaires = [];

                // Parcourez les propriétaires associés à ce titre foncier
                // item.users.forEach(function(proprietaire) {
                //     proprietaires.push(proprietaire
                //     .last_name); // Vous pouvez ajuster cela en fonction de la structure réelle de votre modèle User
                // });
                item.users.forEach(function(proprietaire) {
                    proprietaires.push(proprietaire.last_name + ' ' + proprietaire.first_name);
                });

                var proprietairesText = proprietaires.join('<br>');
                polygons.push({
                    "name": numero,
                    "area": superficie,
                    "proprietaires": proprietairesText,
                    "rings": transformedCoordinates
                });
                // console.log([polygons]);
            });
            // console.log([polygons]);

            const simpleFillSymbol = {
                type: "simple-fill",
                color: [227, 139, 79, 0.8], // Orange, opacity 80%
                outline: {
                    color: [255, 255, 255],
                    width: 1
                }
            };

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

            // const polygon = {
            //     type: "polygon",
            //     rings: [
            //         // [9.718759675044595, 4.039558639732135],
            //         // [9.718759675044595, 4.035245670812884],
            //         // [9.724442532323536, 4.035245670812884],
            //         // [9.724442532323536, 4.039558639732135],
            //         // [9.718759675044595, 4.039558639732135]
            //         [11.555430587076, 3.9710172344522],
            //         [11.555444921682, 3.9710095095432],
            //         [11.555443731353, 3.9706227161],
            //         [11.555442340839, 3.9701708250328],
            //         [11.555440950485, 3.9697189339603],
            //         [11.555438114657, 3.9687970761555],
            //         [11.554989600554, 3.9692684388417],
            //         [11.554539640658, 3.9692698345558],
            //         [11.554089680603, 3.9692712300248]
            //         // [11.555430587076, 3.9710172344522]
            //     ]
            // };

            // const simpleFillSymbol = {
            //     type: "simple-fill",
            //     color: [227, 139, 79, 0.8], // Orange, opacity 80%
            //     outline: {
            //         color: [255, 255, 255],
            //         width: 1
            //     }
            // };

            // const popupTemplate = {
            //     title: "{name}",
            //     content: "{area}"
            // }
            // const attributes = {
            //     Name: "Graphic",
            //     Description: "I am a polygon"
            // }

            // const polygonGraphic = new Graphic({
            //     geometry: polygon,
            //     symbol: simpleFillSymbol,

            //     attributes: attributes,
            //     popupTemplate: popupTemplate

            // });
            // graphicsLayer.add(polygonGraphic);

            const search = new Search({ //Add Search widget
                view: view
            });

            view.ui.add(search, "top-right"); //Add to the map

            //             const search = new Search({
            //     view: view,
            //     sources: [
            //         {
            //             featureLayer: graphicsLayer, // Utilisez votre couche de graphiques (graphicsLayer) comme source de recherche
            //             searchFields: ["name", "proprietaires"], // Champs de recherche, incluez les champs "name" et "proprietaires"
            //             displayField: "name", // Champ à afficher dans les résultats de la recherche (vous pouvez choisir "proprietaires" si vous préférez)
            //             exactMatch: false, // Correspondance exacte non requise
            //             outFields: ["*"], // Renvoyer tous les attributs
            //             name: "Titres Fonciers", // Nom de la source de recherche
            //         }
            //     ], 
            //     resultGraphicEnabled: true, // Afficher le résultat en tant que graphique sur la carte
            // });

            // // Ajoutez le widget de recherche à l'interface utilisateur de la carte
            // view.ui.add(search, "top-right");

        });
    </script>
</head>

<body>
    <div id="viewDiv"></div>
</body>

</html>
