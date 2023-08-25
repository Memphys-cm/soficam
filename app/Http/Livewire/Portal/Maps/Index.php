<?php

namespace App\Http\Livewire\Portal\Maps;

use Livewire\Component;
use App\Models\TitreFoncier;
use Illuminate\Http\Client\Request;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;

class Index extends Component
{


    public function render()
    {
        $json = '{"B1":"4.041199733149849, 9.69162768162152","B2":"4.041468885432741, 9.693452200405627","B3":"4.040350621195789, 9.69353892929149","B4":"4.040456359714004, 9.691653379069184","B5":"4.041199733149849, 9.69162768162152"}';
        $data = json_decode($json, true);

        $result = [];

        foreach ($data as $coordinates) {
            list($latitude, $longitude) = explode(', ', $coordinates);
            $result[] = [$longitude, $latitude];
        }

        // dd($result);

        $titles = TitreFoncier::all();

        $tf = TitreFoncier::findOrFail(50);
        $newArray = [
            ["564321.00, 452564.00"],
            ["564335.746, 452548.271"],
            ["564315.224,452531.059"],
            ["564303.601,452544.471"]
        ];


        return view('livewire.portal.maps.index', compact('titles', 'newArray'));
    }
    public function convert(Request $request)
    {
        // Initialise Proj4
        $proj4 = new Proj4php();

        // Create two different projections.
        $projL93    = new Proj('EPSG:2154', $proj4);
        $projWGS84  = new Proj('EPSG:4326', $proj4);

        // Create a point.
        $pointSrc = new Point(652709.401, 6859290.946, $projL93);
        echo "Source: " . $pointSrc->toShortString() . " in L93 <br>";

        // Transform the point between datums.
        $pointDest = $proj4->transform($projWGS84, $pointSrc);
        echo "Conversion: " . $pointDest->toShortString() . " in WGS84<br><br>";
    }
}
