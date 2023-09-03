<?php

namespace App\Http\Livewire\Portal\Roles\Partial;


trait WithImmaDirectPermissions
{
    public $selectedImmaDirectPermissions = [];
    public $selectAllImmaDirectPermissions = false;
    public $ImmaDirectPermissions = [
        'View' => 'imma_directe.view',
        'Create' => 'imma_directe.create',
        'Update' => 'imma_directe.update',
        'Cotation' => 'imma_directe.cotation',
        'Payment Order' => 'imma_directe.ordre_versement',
        'View Details' => 'imma_directe.view_detail',
        'Convocation' => 'imma_directe.convocation',
        'Avis' => 'imma_directe.avis',
        'Certificate Affichage' => 'imma_directe.certificat_affichage',
        'Etat Cession' => 'imma_directe.etat_cession',
        'Geometre' => 'imma_directe.geometre',
        'PV Bornage' => 'imma_directe.pv_bornage',
        'Descente Terrain' => 'imma_directe.descente_terrain',
        'Bordereau Trans' => 'imma_directe.bordereau_transmission',
        'Dossier Vise' => 'imma_directe.dossier_vise',
        'Enregistrer Geomtre' => 'imma_directe.enregistrer_geometre',
        'Enregistrer PV Bornage' => 'imma_directe.enregistrement_pv_bornage',
        'Mise en Forme Dossier Tech' => 'imma_directe.mise_en_forme_dos_tech',
        'Mise en Form Dossier Admin' => 'imma_directe.mise_en_forme_dos_admin',
        'Creation Dossier Tech' => 'imma_directe.creation_dos_tech',
        'Certificate Affichage' => 'imma_directe.certificat_affichage',
        'Export & Print' => 'imma_directe.export_n_print',
    ];

    public function immaDirectPermissionClearFields()
    {
        $this->reset([
            'selectedImmaDirectPermissions',
            'selectAllImmaDirectPermissions',
        ]);
    }

    public function updatedSelectAllImmaDirectPermissions($value)
    {
        if ($value) {
            $this->selectedImmaDirectPermissions = [
                'imma_directe.view',
                'imma_directe.create',
                'imma_directe.update',
                'imma_directe.cotation',
                'imma_directe.ordre_versement',
                'imma_directe.view_detail',
                'imma_directe.convocation',
                'imma_directe.avis',
                'imma_directe.certificat_affichage',
                'imma_directe.etat_cession',
                'imma_directe.geometre',
                'imma_directe.pv_bornage',
                'imma_directe.descente_terrain',
                'imma_directe.bordereau_transmission',
                'imma_directe.dossier_vise',
                'imma_directe.enregistrer_geometre',
                'imma_directe.enregistrement_pv_bornage',
                'imma_directe.mise_en_forme_dos_tech',
                'imma_directe.mise_en_forme_dos_admin',
                'imma_directe.creation_dos_tech',
                'imma_directe.certificat_affichage',
                'imma_directe.export_n_print',
            ];
        } else {
            $this->selectedImmaDirectPermissions = [];
        }
    }
}
