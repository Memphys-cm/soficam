<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\AuditLog;
use App\Models\TitreFoncier;

class Dashboard extends Component
{
    public $element =0;
    public $element1 =0;
    public $element2 =0;


    public function count()
    {
        $this->element =  auth()->user()->titrefonciers->count();
        $this->element1 =  auth()->user()->imma_directes->count();
        $this->element2 =  auth()->user()->titrefonciers->count();
        // dd($this->element);
    }

    
    public function render()
    {
        $this->count();
        $logs = AuditLog::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()->take(10);
        return view('livewire.user.dashboard',compact('logs'))->layout('components.layouts.user.master');
    }
}
