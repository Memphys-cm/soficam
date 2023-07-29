<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\AuditLog;

class Dashboard extends Component
{
    public function render()
    {
        $logs = AuditLog::orderBy('created_at', 'desc')->get()->take(10);
          
        return view('livewire.portal.dashboard',['logs'=>$logs])->layout('components.layouts.dashboard');
    }
}
