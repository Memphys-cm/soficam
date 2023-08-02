<?php

namespace App\Http\Livewire\Portal\Roles\Partial;


trait WithLocationPermissions
{
    public $selectedRegionPermissions = [];
    public $selectAllRegionPermissions = false;
    public $RegionPermissions = [
        'View' => 'region.view',
        'Update' => 'region.update',
        'Delete' => 'region.delete',
        'Create' => 'region.create',
        'Import' => 'region.import',
        'Export & Print' => 'region.export_n_print',
    ];

    public $selectedDivisionPermissions = [];
    public $selectAllDivisionPermissions = false;
    public $DivisionPermissions = [
        'View' => 'division.view',
        'Update' => 'division.update',
        'Delete' => 'division.delete',
        'Create' => 'division.create',
        'Import' => 'division.import',
        'Export & Print' => 'division.export_n_print',
    ];

    public $selectedSubDivisionPermissions = [];
    public $selectAllSubDivisionPermissions = false;
    public $SubDivisionPermissions = [
        'View' => 'sub_division.view',
        'Update' => 'sub_division.update',
        'Delete' => 'sub_division.delete',
        'Create' => 'sub_division.create',
        'Import' => 'sub_division.import',
        'Export & Print' => 'sub_division.export_n_print',
    ];

    public function locationPermissionClearFields()
    {
        $this->reset([
            'selectedRegionPermissions',
            'selectAllRegionPermissions',
            'selectedDivisionPermissions',
            'selectAllDivisionPermissions',
            'selectedSubDivisionPermissions',
            'selectAllSubDivisionPermissions',

        ]);
    }
    public function updatedSelectAllRegionPermissions($value)
    {
        if ($value) {
            $this->selectedRegionPermissions = [
                'region.create',
                'region.view',
                'region.update',
                'region.delete',
                'region.import',
                'region.export_n_print',
            ];
        } else {
            $this->selectedRegionPermissions = [];
        }
    }
    public function updatedSelectAllDivisionPermissions($value)
    {
        if ($value) {
            $this->selectedDivisionPermissions = [
                'division.create',
                'division.view',
                'division.update',
                'division.delete',
                'division.import',
                'division.export_n_print',
            ];
        } else {
            $this->selectedDivisionPermissions = [];
        }
    }
    public function updatedSelectAllSubDivisionPermissions($value)
    {
        if ($value) {
            $this->selectedSubDivisionPermissions = [
                'sub_division.create',
                'sub_division.view',
                'sub_division.update',
                'sub_division.delete',
                'sub_division.import',
                'sub_division.export_n_print',
            ];
        } else {
            $this->selectedSubDivisionPermissions = [];
        }
    }


}