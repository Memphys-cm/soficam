<?php

namespace App\Http\Livewire\Portal\Roles\Partial;


trait WithOperationPermissions
{
    public $selectedGenOpsPermissions = [];
    public $selectAllGenOpsPermissions = false;
    public $GenOpsPermissions = [
        'Add Coordinates' => 'operation.add_coordinates',
        'Add Sale' => 'operation.add_sale',
        'Add Payment' => 'operation.add_payment',
        'Generate Bordereau Ana.' => 'operation.generate_ba',
    ];

    public $selectedMutationTotalePermissions = [];
    public $selectAllMutationTotalePermissions = false;
    public $MutationTotalePermissions = [
        'View' => 'operation.mutation_totale.view',
        'Update' => 'operation.mutation_totale.update',
        'Delete' => 'operation.mutation_totale.delete',
        'Create' => 'operation.mutation_totale.create',
        'Par Deces' => 'operation.mutation_totale.par_deces',
        'Export & Print' => 'operation.mutation_totale.export_n_print',
    ];

    public $selectedMorcellementPermissions = [];
    public $selectAllMorcellementPermissions = false;
    public $MorcellementPermissions = [
        'View' => 'operation.morcellement.view',
        'Update' => 'operation.morcellement.update',
        'Delete' => 'operation.morcellement.delete',
        'Create' => 'operation.morcellement.create',
        'Forcee' => 'operation.morcellement.forcee',
        'Export & Print' => 'operation.morcellement.export_n_print',
    ];

    public $selectedRetraitPermissions = [];
    public $selectAllRetraitPermissions = false;
    public $RetraitPermissions = [
        'View' => 'operation.retrait_indivision.view',
        'Update' => 'operation.retrait_indivision.update',
        'Delete' => 'operation.retrait_indivision.delete',
        'Create' => 'operation.retrait_indivision.create',
        'Forcee' => 'operation.retrait_indivision.forcee',
        'Export & Print' => 'operation.retrait_indivision.export_n_print',
    ];

    public $selectedEtatCessionPermissions = [];
    public $selectAllEtatCessionPermissions = false;
    public $EtatCessionPermissions = [
        'View' => 'etat_cession.view',
        'Update' => 'etat_cession.update',
        'Delete' => 'etat_cession.delete',
        'Create' => 'etat_cession.create',
        'Export & Print' => 'etat_cession.export_n_print',
    ];

    public $selectedCertificateProprietePermissions = [];
    public $selectAllCertificateProprietePermissions = false;
    public $CertificateProprietePermissions = [
        'View' => 'certificate_propriete.view',
        'Update' => 'certificate_propriete.update',
        'Delete' => 'certificate_propriete.delete',
        'Create' => 'certificate_propriete.create',
        'Export & Print' => 'certificate_propriete.export_n_print',
    ];

    public function operationsPermissionClearFields()
    {
        $this->reset([
            'selectedGenOpsPermissions',
            'selectAllGenOpsPermissions',
            'selectedMutationTotalePermissions',
            'selectAllMutationTotalePermissions',
            'selectedMorcellementPermissions',
            'selectAllMorcellementPermissions',
            'selectedRetraitPermissions',
            'selectAllRetraitPermissions',
            'selectedEtatCessionPermissions',
            'selectAllEtatCessionPermissions',
            'selectedCertificateProprietePermissions',
            'selectAllCertificateProprietePermissions',
        ]);
    }
    public function updatedSelectAllGenOpsPermissions($value)
    {
        if ($value) {
            $this->selectedGenOpsPermissions = [
                'operation.add_coordinates',
                'operation.add_sale',
                'operation.add_payment',
                'operation.generate_ba',
            ];
        } else {
            $this->selectedGenOpsPermissions = [];
        }
    }
    public function updatedSelectAllMutationTotalePermissions($value)
    {
        if ($value) {
            $this->selectedMutationTotalePermissions = [
                'operation.mutation_totale.view',
                'operation.mutation_totale.create',
                'operation.mutation_totale.update',
                'operation.mutation_totale.delete',
                'operation.mutation_totale.export_n_print',
                'operation.mutation_totale.par_deces',
            ];
        } else {
            $this->selectedMutationTotalePermissions = [];
        }
    }
    public function updatedSelectAllMorcellementPermissions($value)
    {
        if ($value) {
            $this->selectedMorcellementPermissions = [
                'operation.morcellement.view',
                'operation.morcellement.create',
                'operation.morcellement.update',
                'operation.morcellement.delete',
                'operation.morcellement.export_n_print',
                'operation.morcellement.forcee',
            ];
        } else {
            $this->selectedMorcellementPermissions = [];
        }
    }

    public function updatedSelectAllRetraitPermissions($value)
    {
        if ($value) {
            $this->selectedRetraitPermissions = [
                'operation.retrait_indivision.view',
                'operation.retrait_indivision.create',
                'operation.retrait_indivision.update',
                'operation.retrait_indivision.delete',
                'operation.retrait_indivision.export_n_print',
                'operation.retrait_indivision.forcee',
            ];
        } else {
            $this->selectedRetraitPermissions = [];
        }
    }

    public function updatedSelectAllEtatCessionPermissions($value)
    {
        if ($value) {
            $this->selectedEtatCessionPermissions = [
                'etat_cession.view',
                'etat_cession.create',
                'etat_cession.update',
                'etat_cession.delete',
                'etat_cession.export_n_print',
            ];
        } else {
            $this->selectedEtatCessionPermissions = [];
        }
    }
    public function updatedSelectAllCertificateProprietePermissions($value)
    {
        if ($value) {
            $this->selectedCertificateProprietePermissions = [
                'certificate_propriete.view',
                'certificate_propriete.create',
                'certificate_propriete.update',
                'certificate_propriete.delete',
                'certificate_propriete.export_n_print',
            ];
        } else {
            $this->selectedCertificateProprietePermissions = [];
        }
    }
}
