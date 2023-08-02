<?php

namespace App\Http\Livewire\User\AuditLogs;

use App\Http\Livewire\Traits\WithDataTables;
use Livewire\Component;
use App\Models\AuditLog;
use Livewire\WithPagination;

class Index extends Component
{
      use WithDataTables;

    public function render()
    {

        $logs = AuditLog::search($this->query)->where('user_id',auth()->user()->id)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
            
        return view('livewire.user.audit-logs.index', [
            'logs' => $logs,
            'logs_count' => AuditLog::where('user_id',auth()->user()->id)->count(),
            'creation_log_count' => AuditLog::where('user_id',auth()->user()->id)->creation()->count() ,
            'update_log_count' => AuditLog::where('user_id',auth()->user()->id)->updation()->count() ,
            'deletion_log_count' => AuditLog::where('user_id',auth()->user()->id)->deletion()->count() ,
            ])->layout('components.layouts.user.master');
    }
}