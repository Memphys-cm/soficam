<?php

namespace App\Http\Livewire\Portal\Roles\Partial;


trait WithSalesPermissions
{
    public $selectedSalesPermissions = [];
    public $selectAllSalesPermissions = false;
    public $SalesPermissions = [
        'View' => 'sales.view',
        'Payments' => 'sales.pay',
        'Delete' => 'sales.delete',
        'Simple Sales' => 'lotissement.sale',
        'Mutation total sales' => 'operation.mutation_totale.sale'
    ];

    public function salesPermissionClearFields()
    {
        $this->reset([
            'selectedSalesPermissions',
            'selectAllSalesPermissions',
        ]);
    }

    public function updatedSelectAllSalesPermissions($value)
    {
        if ($value) {
            $this->selectedSalesPermissions = [
                'sales.view',
                'sales.pay',
                'sales.delete',
                'lotissement.sale',
                'operation.mutation_totale.sale'
            ];
        } else {
            $this->selectedSalesPermissions = [];
        }
    }
}
