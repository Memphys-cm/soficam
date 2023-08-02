<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\AuditLog;

class Dashboard extends Component
{
    
    public function render()
    {
        $logs = AuditLog::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()->take(10);
        return view('livewire.user.dashboard',compact('logs'))->layout('components.layouts.user.master');
    }
}
