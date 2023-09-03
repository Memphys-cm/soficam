<?php

namespace App\Http\Livewire\Portal\Roles\Partial;


trait WithTitreFoncierPermissions
{
    public $selectedTitreFoncierPermissions = [];
    public $selectAllTitreFoncierPermissions = false;
    public $TitreFoncierPermissions = [
        'View' => 'titre_foncier.view',
        'View Details' => 'titre_foncier.view_detail',
        'Update' => 'titre_foncier.update',
        'Create' => 'titre_foncier.create',
        'Delete' => 'titre_foncier.delete',
        'View Map' => 'map.view',
        'Export & Print' => 'titre_foncier.export_n_print',
    ];

    public $selectedLotissementPermissions = [];
    public $selectAllLotissementPermissions = false;
    public $LotissementPermissions = [
        'View' => 'lotissement.view',
        'Update' => 'lotissement.update',
        'Delete' => 'lotissement.delete',
        'Create' => 'lotissement.create',
        'Export & Print' => 'lotissement.export_n_print',
    ];

    public $selectedChargesPermissions = [];
    public $selectAllChargesPermissions = false;
    public $ChargesPermissions = [
        'View' => 'charge_titre_foncier.view',
        'Update' => 'charge_titre_foncier.update',
        'Delete' => 'charge_titre_foncier.delete',
        'Create' => 'charge_titre_foncier.create',
        'Export & Print' => 'charge_titre_foncier.export_n_print',
    ];

    public $selectedImmobilierPermissions = [];
    public $selectAllImmobilierPermissions = false;
    public $ImmobilierPermissions = [
        'View' => 'immobilier.view',
        'Update' => 'immobilier.update',
        'Delete' => 'immobilier.delete',
        'Create' => 'immobilier.create',
        'Export & Print' => 'immobilier.export_n_print',
    ];

    public $selectedTaxFoncierPermissions = [];
    public $selectAllTaxFoncierPermissions = false;
    public $TaxFoncierPermissions = [
        'View' => 'tax_foncier.view',
        'Update' => 'tax_foncier.update',
    ];

    public function titreFonciersPermissionClearFields()
    {
        $this->reset([
            'selectedTitreFoncierPermissions',
            'selectAllTitreFoncierPermissions',
            'selectedLotissementPermissions',
            'selectAllLotissementPermissions',
            'selectedChargesPermissions',
            'selectAllChargesPermissions',
            'selectedImmobilierPermissions',
            'selectAllImmobilierPermissions',
            'selectedTaxFoncierPermissions',
            'selectAllTaxFoncierPermissions',
        ]);
    }
    public function updatedSelectAllTitreFoncierPermissions($value)
    {
        if ($value) {
            $this->selectedTitreFoncierPermissions = [
                'titre_foncier.view',
                'titre_foncier.view_detail',
                'titre_foncier.create',
                'titre_foncier.update',
                'titre_foncier.delete',
                'titre_foncier.export_n_print',
                'map.view'
            ];
        } else {
            $this->selectedTitreFoncierPermissions = [];
        }
    }
    public function updatedSelectAllLotissementPermissions($value)
    {
        if ($value) {
            $this->selectedLotissementPermissions = [
                'lotissement.view',
                'lotissement.create',
                'lotissement.update',
                'lotissement.delete',
                'lotissement.export_n_print',
            ];
        } else {
            $this->selectedLotissementPermissions = [];
        }
    }
    public function updatedSelectAllChargesPermissions($value)
    {
        if ($value) {
            $this->selectedChargesPermissions = [
                'charge_titre_foncier.view',
                'charge_titre_foncier.create',
                'charge_titre_foncier.update',
                'charge_titre_foncier.delete',
                'charge_titre_foncier.export_n_print',
            ];
        } else {
            $this->selectedChargesPermissions = [];
        }
    }

    public function updatedSelectAllImmobilierPermissions($value)
    {
        if ($value) {
            $this->selectedImmobilierPermissions = [
                'immobilier.view',
                'immobilier.create',
                'immobilier.update',
                'immobilier.delete',
                'immobilier.export_n_print',
            ];
        } else {
            $this->selectedImmobilierPermissions = [];
        }
    }

    public function updatedSelectAllTaxFoncierPermissions($value)
    {
        if ($value) {
            $this->selectedTaxFoncierPermissions = [
                'tax_foncier.view',
                'tax_foncier.update',
            ];
        } else {
            $this->selectedTaxFoncierPermissions = [];
        }
    }
}
