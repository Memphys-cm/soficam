<?php

namespace App\Http\Controllers;

use App\Models\TitreFoncier;
use Illuminate\Http\Request;

class APIMapController extends Controller
{
    //

    public function transform($recup)
    {
        return $transformedCoordinates = collect($recup)->map(function ($coordinate) {
            [$lng, $lat] = explode(', ', $coordinate);
            return [floatval($lng), floatval($lat)];
        })->toArray();
    }

    public function getCoordonnees()
    {

        $coordinatesString = '["9.718759675044595, 4.039558639732135","9.718759675044595, 4.035245670812884","9.724442532323536, 4.035245670812884","9.724442532323536, 4.039558639732135","9.718759675044595, 4.039558639732135"]';

        $coordinatesArray = json_decode($coordinatesString);

        $transformedCoordinates = [];
        foreach ($coordinatesArray as $coordinatePair) {
            list($latitude, $longitude) = explode(', ', $coordinatePair);
            $transformedCoordinates[] = [$latitude, $longitude];
        }

        dd($transformedCoordinates);

        $titles = TitreFoncier::all(); // Remplacez par la logique pour récupérer les titlees depuis la base de données

        // Construisez le tableau GeoJSON à partir des données
        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($titles as $title) {
            // dd(this->($coordinatesArray));
            $feature = [
                'type' => 'Feature',
                'geometry' => $this->transform($title->coordonnees), // Assurez-vous que la géométrie est stockée au format JSON dans la base de données
                'properties' => [
                    'name' => $title->numero_titre_foncier,
                    'area' => $title->superficie_du_TF_mere,
                    // Ajoutez d'autres propriétés si nécessaire
                ]
            ];
            $geojson['features'][] = $feature;
        }


        return response()->json($geojson);
    }
}
