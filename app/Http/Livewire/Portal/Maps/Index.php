<?php

namespace App\Http\Livewire\Portal\Maps;

use Livewire\Component;
use App\Models\TitreFoncier;

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

    return view('livewire.portal.maps.index', compact('titles'));
}


}
