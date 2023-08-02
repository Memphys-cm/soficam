<?php

namespace App\Http\Livewire\Portal\AuditLogs;

use Livewire\Component;
use App\Models\AuditLog;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithPagination, WithDataTables;

    public AuditLog $audit_log;


    public function initData($id)
    {
        $this->audit_log = AuditLog::findOrFail($id);
    }

    public function delete()
    {
        if (!Gate::allows('audit_log.delete') ) {
            return abort(401);
        }

        if (!empty($this->audit_log)) {

            $this->audit_log->delete();
        }


        $this->refresh(__('Log record successfully deleted!'), 'DeleteModal');
    }

    public function render()
    {
        if (!Gate::allows('audit_log.view_all')|| !Gate::allows('audit_log.view_own_only')) {
            return abort(401);
        }

       if(Gate::allows('audit_log.view_all')){
            $logs = AuditLog::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
            $logs_count = AuditLog::count();
            $creation_log_count =  AuditLog::creation()->count();
            $update_log_count = AuditLog::updation()->count();
            $deletion_log_count = AuditLog::deletion()->count(); 
       }else{
            $logs = AuditLog::search($this->query)->whereUserId(auth()->user()->id)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
            $logs_count = AuditLog::whereUserId(auth()->user()->id)->count();
            $creation_log_count =  AuditLog::whereUserId(auth()->user()->id)->creation()->count();
            $update_log_count = AuditLog::whereUserId(auth()->user()->id)->updation()->count();
            $deletion_log_count = AuditLog::whereUserId(auth()->user()->id)->deletion()->count(); 

       }
            
        return view('livewire.portal.audit-logs.index', [
            'logs' => $logs,
            'logs_count' => $logs_count,
            'creation_log_count' => $creation_log_count,
            'update_log_count' => $update_log_count,
            'deletion_log_count' => $deletion_log_count,
            ])->layout('components.layouts.dashboard');
    }
}
