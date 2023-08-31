<?php

namespace Database\Seeders;

use App\Models\Activite;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\CategoryActivite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryActivitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryActivite::flushEventListeners();

        $cat1 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => 'Par voie d’immatriculation sur le domaine national de 1ère catégorie'
        ]);

        $cat2 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => 'Par morcellement des propriétés existantes'
        ]);

        $cat3 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => 'Par transformation d’un acte en Titre Foncier'
        ]);
        $cat4 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => 'Par fusion des Titre Fonciers'
        ]);

        $cat5 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => 'Retrait d\’indivision'
        ]);
        $cat6 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => 'Délivrance du duplicatum du titre foncier'
        ]);

        $cat7 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'IMMATRICULATION',
            'nom_category' => ' Demande en rectification, en diminution ou en augmentation'
        ]);

        $cat8 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Hypothèques et privilèges'
        ]);
        $cat9 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Mutations totales'
        ]);
        $cat10 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Inscription des Baux'
        ]);
        $cat11 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Radiations d’hypothèque'
        ]);
        $cat12 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Prénotation judiciaires du titre foncier'
        ]);
        $cat13 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Rétraction d’ordonnance judiciaire'
        ]);
        $cat14 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Commandements, mise à jour des copies de titres fonciers et toutes autres inscriptions'
        ]);

        $cat15 = CategoryActivite::create([
            'uuid' => Str::uuid(),
            'annee_loi_fin' => '2023',
            'grand_section' => 'INSCRIPTIONS DIVERSES DANS LE LIVRE FONCIER',
            'nom_category' => 'Certificat de propriété, de dépôt, de visa d’acquisition ou tout autre certificat attestant la propriété immobilière ou l’inscription des droits immobiliers,Relevé immobilier'
        ]);

        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat1->id,
            'nom_activite' => '10 francs par m² dans la zone urbaine, minimum à percevoir',
            'type_de_facturation' => 'per_m2',
            'value' => '10',
            'value_minimale' => '10000',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat1->id,
            'nom_activite' => '5 francs par m² dans la zone rurale, minimum à percevoir',
            'type_de_facturation' => 'per_m2',
            'value' => '5',
            'value_minimale' => '5000',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat2->id,
            'nom_activite' => '3 % du prix d’achat en cas d’acquisition onéreuse',
            'type_de_facturation' => 'percentage',
            'value' => '3',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat2->id,
            'nom_activite' => '2 % de la valeur vénale énoncée par l’acte notarié en cas d’acquisition gratuite',
            'type_de_facturation' => 'percentage',
            'value' => '2',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat3->id,
            'nom_activite' => '2 % de la valeur vénale de l’immeuble calculé sur la base du prix des terrains domaniaux dans la localité',
            'type_de_facturation' => 'percentage',
            'value' => '2',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat4->id,
            'nom_activite' => '1 % de la valeur vénale des immeubles à fusionner',
            'type_de_facturation' => 'percentage',
            'value' => '1',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat5->id,
            'nom_activite' => '50.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '50000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat6->id,
            'nom_activite' => '50.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '50000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat7->id,
            'nom_activite' => '50.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '50000',
            'value_minimale' => '0',
        ]);

        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat8->id,
            'nom_activite' => '1,25 % de la valeur vénale des immeubles concernés',
            'type_de_facturation' => 'percentage',
            'value' => '1.25',
            'value_minimale' => '0',
        ]);

        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat9->id,
            'nom_activite' => 'par vente - 4 % du prix d’achat ',
            'type_de_facturation' => 'percentage',
            'value' => '4',
            'value_minimale' => '0',
        ]);

        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat9->id,
            'nom_activite' => 'par décès - 1 % de la valeur vénale déclarée de l’immeuble',
            'type_de_facturation' => 'percentage',
            'value' => '1',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat9->id,
            'nom_activite' => 'par échange - 2 % de la valeur énoncée par l’acte notarié',
            'type_de_facturation' => 'percentage',
            'value' => '2',
            'value_minimale' => '0',
        ]);

        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat9->id,
            'nom_activite' => 'par apport au capital des Sociétés - 2 % de la valeur des actions correspondantes',
            'type_de_facturation' => 'percentage',
            'value' => '2',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat9->id,
            'nom_activite' => 'par donation entre vifs - 2 % de la valeur vénale énoncée par l’acte notarié',
            'type_de_facturation' => 'percentage',
            'value' => '2',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat10->id,
            'nom_activite' => '2 % du montant total des loyers calculés sur la durée du bail',
            'type_de_facturation' => 'percentage',
            'value' => '2',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat11->id,
            'nom_activite' => '100.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '100000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat12->id,
            'nom_activite' => '250.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '250000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat13->id,
            'nom_activite' => '50.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '50000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat14->id,
            'nom_activite' => '15.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '15000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat15->id,
            'nom_activite' => '25.000 francs par dossier pour les personnes physiques.',
            'type_de_facturation' => 'value',
            'value' => '250000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat15->id,
            'nom_activite' => '50.000 francs par dossier pour les personnes morales',
            'type_de_facturation' => 'value',
            'value' => '50000',
            'value_minimale' => '0',
        ]);
        Activite::create([
            'uuid' => Str::uuid(),
            'category_activite_id' => $cat14->id,
            'nom_activite' => 'Relevé immobilier - 50.000 francs par titre foncier',
            'type_de_facturation' => 'value',
            'value' => '50000',
            'value_minimale' => '0',
        ]);
    }
}
