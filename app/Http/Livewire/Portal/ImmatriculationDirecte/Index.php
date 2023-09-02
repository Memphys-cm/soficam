<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\Service;
use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\Division;
use App\Models\Sales\Sale;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;
use App\Models\EtatCession;

class Index extends Component
{

    use WithDataTables;

    // public ImmatriculationDirecte $imma_directe;
    public $imma_directe , $imma_file;

    public $state = 0, $price_m2, $users, $user_id, $user_ids, $comissions = [], $localisation;
    public $attachements, $services, $service_id, $observation, $montant_ordre_versement;
    public $region_id;
    public $division_id;
    public $sub_division_id;
    public $regions;
    public $divisions = [];
    public $sub_divisions = [];
  
    public $date_debut , $date_fin;
    public $date_convocation , $superficie , $status , $date_status;
    public $geometre_id , $geometres;
    public $attachments , $quitance, $montant_dossier_vise;
    public $coordinates = ['', ''] , $transform;
    public $coordonnees = [];
    public $coordonne = [];

    public function addCoordinate()
    {
        $this->coordinates[] = [];
    }

    public function removeCoordinate($coordinateIndex)
    {
        unset($this->coordinates[$coordinateIndex]);
        $this->coordinates = array_values($this->coordinates);
    }

    public $etat_cession_id, $cout_etat_cession, $zone, $etat_cession, $superficie_en_m2;
    public $frais_suplementaires, $cout, $commentaires, $code, $numero_bordereau_transmission;

    public function mount()
    {
        // $this->imma_directe = new ImmatriculationDirecte();
        // $imma = ImmatriculationDirecte::findOrFail();
        // $mediaItems = $imma->getMedia("*");
        // dd($mediaItems);
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();
        // $this->etat_cession = EtatCession::all();
        $this->services = Service::select('id', 'service_name_fr')->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
    }

    public function updatedRegionID($region_id)
    {
        if (!empty($region_id)) {
            $this->divisions = Division::whereRegionId($region_id)->get();
        }
    }
    public function updatedDivisionID($division_id)
    {
        if (!empty($division_id)) {
            $this->sub_divisions = SubDivision::whereDivisionId($division_id)->get();
        }
    }

    public function addRow()
    {
        $this->comissions[] = ['name' => '', 'position' => ''];
    }

    public function removeRow($index)
    {
        unset($this->comissions[$index]);
        $this->comissions = array_values($this->comissions);
    }

    public function initData($id)
    {
        $this->imma_directe = ImmatriculationDirecte::findOrFail($id);
        $this->status = $this->imma_directe->next_step;
        $this->superficie_en_m2 = $this->imma_directe->superficie;
        $imma_directe = $this->imma_directe;
      
        $this->state = 1;
    }

    public function store()
    {
        if (!Gate::allows('lotissement.create')) {
            return abort(401);
        }

        $this->validate([
            'localisation' => 'required',
            'division_id' => 'required',
            // 'subdivision_id' => 'required',
            'region_id' => 'required'
        ]);

        $imma_directe = ImmatriculationDirecte::create([
            'reference' => Str::upper(Str::random(7)) . "" . now()->format('msu'),
            'superficie' => $this->superficie,
            'localisation' => $this->localisation,
            'region_id' => $this->region_id,
            'division_id' => $this->division_id,
            'sub_division_id' => $this->sub_division_id,
            'statut' => 'Dossier Ouvert',
            'next_step' => 'Cotation du Dossier au CSDAF',
            'StatutStyle' => 'info',
            // 'comissions' => json_encode($this->comissions),
        ]);

        $imma_directe->users()->sync($this->user_ids);

        if (!empty($this->attachements)) {
            foreach ($this->attachements as $attachment) {
                $imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Pieces_Jointe_Ouverture_imma_directe')
                    ->toMediaCollection('immadirectes');
            }
        }

        $this->clearFields();

        $this->refresh(__('Dossier D\'Immatriculation Directe Creer Avec SUCCES'), 'CreateImmaDirecteModal');
    }

    public function convert($utmCoordinates)
    {
        // Initialisez Proj4
        $proj4 = new Proj4php();
    
        // Créez les projections
        $projUTM = new Proj('+proj=utm +zone=32 +datum=WGS84 +units=m +no_defs', $proj4);
        $projWGS84 = new Proj('EPSG:4326', $proj4);
    
        $decimalResults = [];
    
        foreach ($utmCoordinates as $utm) {
            $utmParts = explode(',', $utm); // Sépare les coordonnées UTM en X et Y
            $utmX = floatval($utmParts[0]);
            $utmY = floatval($utmParts[1]);
    
            // Créez le point source avec les coordonnées UTM
            $pointSrc = new Point($utmX, $utmY, $projUTM);
    
            // Transformez le point entre les systèmes de coordonnées
            $pointDest = $proj4->transform($projWGS84, $pointSrc);
    
            // Obtenez les coordonnées lat/lon du point de destination
            $lat = $pointDest->y;
            $lon = $pointDest->x;
    
            // Ajoutez le résultat à votre tableau de résultats en coordonnées décimales
            $decimalResults[] = "$lon, $lat";
        }
    
        return $decimalResults;
    }

    public function dossier_technique()
    {
        $coords = [];
        collect($this->coordonnees)->map(function ($value, $key) {
            return ['long' => explode(',', $value, 1), 'lat' => explode(',', $value, 2)];
        });

        $transform = $this->convert($this->coordonnees);

        DB::transaction(function () {
            $this->imma_directe->update([
                // 'coordonnees' => json_encode($this->coordonnees),
                'coordonnees' => json_encode($this->transform),
                'statut' => 'Dossier technique créer',
                'next_step' => 'Descente sur le Terrain',
                'dossier_technique_created' => Carbon::now()
            ]);
        });

        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Dossier Technique Enregistrer'), 'DossierTechniqueModal');

    }

    public function update_dossier_technique()
    {

        DB::transaction(function () {
            $this->imma_directe->update([
                'dossier_administratif_complet' => Carbon::now(),
                'statut' => 'Dossier Technique Mise En Forme',
                'next_step' => 'Mise en Forme du Dossier Administratif',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Dossier Administratif Mise En Forme Avec Suceess'), 'DossierAdministratifModal');
    }
    
    public function descente_terrain()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'statut' => 'Descente sur le terrain effectuée',
                'next_step' => 'Mise en Forme du Dossier Technique',
                'comissions' => json_encode($this->comissions),
                'descente_terrain' => Carbon::now()
            ]);
        });

        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte_Pv_Descente_Terrain')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->clearFields();
        $this->refresh(__('Descente sur le terrain effectuée'), 'DescenteTerrainModal');

    }

    public function edit_statut()
    {
        $imma = $this->imma_directe;
        $this->validate([
            'status' => 'required',
            'date_status' => 'required',
        ]);
        if($imma->next_step == "Avis Au publique En attente de signature"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Avis au Public Signer',
                    'next_step' => 'signature decision portant calendrier de descente',
                    'date_avis_publique_signe' => $this->date_status,
                ]);
            });
        } else if($imma->next_step == "signature decision portant calendrier de descente"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Decision portant portant calendrier Signer',
                    'next_step' => 'Certificat_Affichage',
                    'date_calendrier_descente' => $this->date_status,
                ]);
            });
        } else if($imma->next_step == "valider le paiement"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier publié au bulletin des avis domaniaux et fonciers',
                    'next_step' => 'Achat des bulletins',
                    'date_publication_dossier_vise' => $this->date_status,
                ]);
            });
        } else if($imma->next_step == 'Bulletins en attente de signature par le délégué'){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Bulletins signés',
                    'next_step' => 'Transmission du dossier complet à la Délégation Départementale',
                    'date_signature_bulletin' => $this->date_status,
                ]);
            });    
        } else if($imma->next_step == "Transmission du dossier technique au CSDAF"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier technique signe Par le CSRCadastre',
                    'next_step' => 'Transmission du dossier technique au Délégué Régional MINDCAF',
                    'date_dossier_signe_csr_cadastre' => $this->date_status,
                ]);
            });
            
        } else if($imma->next_step == "Transmission du dossier technique au Délégué Régional MINDCAF"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => ' Dossier technique transmis au Délègue Regional Mindcaf',
                    'next_step' => 'Cotation du dossier complet d\’immatriculation directe au CSRDAF ',
                    'date_dossier_transmi_au_Mindcaf' => $this->date_status,
                ]);
            });
        } else if($imma->next_step == "Cotation du dossier complet d\’immatriculation directe au CSRDAF"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier complet transmis  au CSRegional Mindcaf',
                    'next_step' => ' Transmission du dossier complet au Délégué Régional MINDCAF ',
                    'date_dossier_complet_transmi_CSRegional_mindcaf' => $this->date_status,
                ]);
            });
        } else if($imma->next_step == "Transmission du dossier complet au Délégué Régional MINDCAF"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier Vise et en attente de publication',
                    'next_step' => 'Traitement du dossier visé-enregistré',
                    'date_dossier_vise_en_attente_publication' => $this->date_status,
                ]);
            });
        }


        $this->refresh(__('Statut Modifier Avec SUCCES!'), 'EditStatutModal');
        $this->clearFields();
    }

    public function bordoreauDeTransmitionStatu(){

        $this->validate([
            'numero_bordereau_transmission' => 'required',
           
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'statut' => 'Bordereau de transmission + dossier physique transmis',
                'next_step' => 'Cotation du dossier technique au CRDC pour contrôle',
                'numero_bordereau_transmission' => $this->numero_bordereau_transmission,
                'date_bordereau_transmission' => now(),


            ]);
        });

        $this->refresh(__('Bordoreau de Transmition Transmi Avec SUCCES!'), 'bordoreauDeTransmitionModal');
    }    
    
    //enregistré le prix du dossier visé dans les paiements
    public function dossier_vise() {
        DB::transaction(function () {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier-visé enregistré en attente de paiement',
                    'next_step' => 'valider le paiement',
                ]);
            });

            $sale = Sale::create([
                'sales_amount' => $this->montant_dossier_vise,
                'sales_type' => 'dossier_vise_enregistre',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->montant_dossier_vise,
                'quantity' => 1,
                'saleable_id' => $this->imma_directe->id,
                'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        });

        $this->refresh(__('La recette est appliquée Avec SUCCES!'), 'DossierViseImmaDirecteModal');
        $this->clearFields();
    }

    public function cotation_first_step()
    {
        $this->validate([
            'service_id' => 'required',
            'user_id' => 'required',
        ]);


        DB::transaction(function () {
            $this->imma_directe->update([
                'service_id' => $this->service_id,
                'observation_cotation' => $this->observation,
                'cotation_user_id' => $this->user_id,
                'status_cotation' => 'done',
                'statut' => 'coter',
                'next_step' => 'ordre_versement',
                'date_cotation' => Carbon::now(),
            ]);
        });

        $this->refresh(__('DOSSIERt Coter Avec SUCCES!'), 'CotationImmaDirecteModal');

        $this->clearFields();
    }

    function genererNumeroVersement()
    {
        $dernierEnregistrement = ImmatriculationDirecte::orderBy('id', 'desc')->first();

        if ($dernierEnregistrement) {
            $dernierNumero = intval(substr($dernierEnregistrement->code, 2)); // Extrait le numéro sans "TF" et convertit en nombre
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        // Formate le numéro avec des zéros à gauche (total 7 caractères)
        $numeroFormate = str_pad($nouveauNumero, 7, '0', STR_PAD_LEFT);

        // Concatène "TF" et le numéro formate pour obtenir le code unique
        $codeUnique =  $numeroFormate . "Y.30" . "/MINCAF/41/T400";

        return $codeUnique;
    }

    public function ordre_versement()
    {
        $this->validate([
            'montant_ordre_versement' => 'required',
        ]);


        DB::transaction(function () {
            $this->imma_directe->update([
                'numero_ordre_versement' => $this->genererNumeroVersement(),
                // 'superficie_ordre_versement' => $this->superficie_ordre_versement,
                'montant_ordre_versement' => $this->montant_ordre_versement,
                'status_ordre_versement' => 'pending',
                'statut' => 'Ordre de Versement en Attente de Paiement',
                'next_step' => 'Paiement de L\'Ordre versement',
                'date_ordre_versement' => Carbon::now(),
            ]);
        });

        $sale = Sale::create([
            // 'user_id' => $this->requestor_id,
            'sales_code' => $this->imma_directe->numero_ordre_versement,
            'sales_amount' => $this->montant_ordre_versement,
            'sales_type' => 'ordre_versement_imma_directe',
            'created_by' => auth()->user()->name,
        ]);

        // Create the Saleable item using only the specified information
        $saleableData = [
            'sale_id' => $sale->id,
            'price' => $this->montant_ordre_versement,
            'quantity' => 1,
            'saleable_id' => $this->imma_directe->id,
            'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
            'created_by' => auth()->user()->name,
        ];

        DB::table('saleables')->insert($saleableData);


        $this->refresh(__('Ordre de Versement Enregistrer Avec SUCCES!'), 'OrdreVersementImmaDirecteModal');

        $this->clearFields();
    }

    // public function updated()
    // {
    //     $area =  $this->imma_directe->superficie;
    //     $zone = $this->zone;
    //    ;
    //     $this->price_m2 = match ($zone) {
    //         "terrain_urbain" => ($area <= 5000) ? 25000 : ($area - 5000) * 20,
    //         "terrain_rurale" => match (true) {
    //             ($area <= 50000) => 25000,
    //             ($area >= 50000 && $area <= 200000) => 50000,
    //             default => ($area - 200000) * 1,
    //         },
    //         default => 0,
    //     };
        
    //     $this->frais_suplementaires = 2500;

    //     $this->cout = (int)$this->price_m2;

    //     $this->cout_etat_cession = (int)$this->cout + (int)$this->frais_suplementaires;
    //     // dd($this->cout_etat_cession);
   
    // }
    public function generateUniqueCode($year, $counter)
    {
        $counterFormatted = str_pad($counter, 5, '0', STR_PAD_LEFT);
        return $year . 'STATE' . $counterFormatted;
    }
    public function etatDeCession()
    {
          // Récupérer l'année en cours au format 'yy'
          $year = date('y');

          // Récupérer le compteur depuis la base de données (par exemple en comptant les enregistrements de lotissement existants)
          $counter = EtatCession::count() + 1;
  
          // Générer le code unique
          $this->code = $this->generateUniqueCode($year, $counter);
        // dd($code);

       
        $this->etat_cession = EtatCession::create([
            // 'user_id' => $this->requestor_id,
            'zone' => $this->zone,
            'reference_etat_cession' => $this->code,
            'lieu_dit' => $this->imma_directe->localisation,
            'superficie_en_m2' => $this->imma_directe->superficie,
            'sub_division_id' => $this->imma_directe->sub_division_id,
            'commentaires' => $this->commentaires,
            'cout' => $this->cout,
            'frais_suplementaires' => $this->frais_suplementaires,
            'cout_etat_cession' => $this->cout_etat_cession,
            'type_operation' => 'immatriculation_direct',
            'status' => 'pending_payment',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'etat_cession_id' => $this->etat_cession->id,
                'statut' => 'Etat de Cesssion en Attente de Paiement',
                'next_step' => 'Paiement de L\'Etat de Cession',
                'etat_cession' => Carbon::now(),
            ]);

            $sale = Sale::create([
                // 'user_id' => $this->requestor_id,
                'sales_code' => $this->code,
                'sales_amount' => $this->cout_etat_cession,
                'sales_type' => 'etat_cession__imma_directe',
                'created_by' => auth()->user()->name,
            ]);
    
    
            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->cout_etat_cession,
                'quantity' => 1,
                'saleable_id' => $this->imma_directe->id,
                'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];
    
    
            DB::table('saleables')->insert($saleableData);
    
        });

        $data = [
            'imma_directe' => $this->imma_directe,
        ];

        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.quitance', $data)->setPaper('a4', 'portrait');
        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('OrdreDeVersement') . Str::random('10') . ".pdf"
        );

        $this->refresh(__('Etat de Cession Enregistrer Avec SUCCES!'), 'EtatCessionModal');

        $this->clearFields();
    }

    public function  ordreDeVersementPdf($id)
    {
        $this->imma_directe = ImmatriculationDirecte::findOrFail($id);
        $data = [
            'imma_directe' => $this->imma_directe,
        ];

        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.ordre-versement', $data)->setPaper('a4', 'portrait');
        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('OrdreDeVersement') . Str::random('10') . ".pdf"
        );

    }
    public function  printAvisPdf($id)
    {
        $this->imma_directe = ImmatriculationDirecte::findOrFail($id);
        DB::transaction(function () {
            $this->imma_directe->update([
                'date_avis_publique' => now(),
                'statut' => 'Avis au public établir en attente de signature',
                'next_step' => 'Avis Au publique En attente de signature',
            ]);
        });
        
        $data = [
            'imma_directe' => $this->imma_directe,

        ];

        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.avis_publique', $data)->setPaper('a4', 'portrait');
        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Avis Au Public') . Str::random('10') . ".pdf"
        );

    }

    public function quitance_geometre()
    {
        // dd('id');
        $this->validate([
            'geometre_id' => 'required',
        ]);
        
       
       DB::transaction(function () {
            $this->imma_directe->update([
                'geometre_id' => $this->geometre_id,
                'date_geometre_enregistrer' => Carbon::now(),
                'statut' => 'Etat de cession enregistré auprès du géomètre',
                'next_step' => 'Enregistrement du PV de Bornage',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Geometre Enregistrer Avec Suceess et Enregistrement'), 'GeometreModal');

    }

    public function pv_bornage()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'pv_enregistrer' => Carbon::now(),
                'statut' => 'PV enregistrer',
                'next_step' => 'Mise en Forme du Dossier Administratif',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Pv de Bornage Enregistrer Avec Suceess'), 'PvBornageModal');
    }

    public function dossier_admin()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'dossier_administratif_complet' => Carbon::now(),
                'statut' => 'Dossier Administratif Mise En Forme',
                'next_step' => 'Transmission du dossier technique au CSDAF',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Dossier Administratif Mise En Forme Avec Suceess'), 'DossierAdministratifModal');
    }

    public function certificat_affichage()
    {
        $this->validate([
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);


        DB::transaction(function () {
            $this->imma_directe->update([
                'date_debut_certificat_affichage' => $this->date_debut,
                'date_fin_certificat_affichage' => $this->date_fin,
                'status_certificat_d\'affichage' => 'done',
                'statut' => 'Certificat D\'affichage Effectuer',
                'next_step' => 'Convocation D\'invitation sur Le Terrain',
            ]);
        });

        $this->refresh(__('Certificat Imprimr Avec SUCCES!'), 'CertfifcatAffichageImmaDirecteModal');

        $this->clearFields();


        $data = [
            'imma_directe' => $this->imma_directe,
            // Autres données que vous souhaitez afficher dans la vue
        ];
        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.certificat_affichage',
        $data)->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Certificat_Affichage-') . Str::random('10') . ".pdf"
        );


    }

  

    public function convocation()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'date_convocation' => $this->date_convocation,
                // 'comissions' => json_encode($this->comissions),
                'status_convocation' => 'done',

                'statut' => 'Convocationsur le Terrain Effectuer',
                'next_step' => 'Etablissement Etat de Cession',
            ]);
        });
        $this->refresh(__('Convocation imprimée Avec SUCCES!'), 'ConvocationImmaDirecteModal');

        $this->clearFields();

        $sid='ACa77985267946bd8e613944d40b9d0458';
        $token='b7b84303df6a21c3d6f9b32d3d678103';
        $twilio = new Client($sid, $token);

        $messageBody = "Hello, le message porté est disponible.";

        $twilio->messages->create(
            '+237672959097',
            [
                'from' => '+15856393680',
                'body' => $messageBody,
            ]
        );


        $data = [
            'imma_directe' => $this->imma_directe,
            'comissions' => $this->comissions
        ];

        // dd($this->imma_directe, $this->comissions);
        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.message-porte', 
        $data)->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Message_Porté-').Str::random('10') . ".pdf"
        );
    }

    public function clearFields()
    {
        $this->reset(
            [
                // 'requestor_id', 
                'localisation',
                'comissions',
                'numero_bordereau_transmission',
            ]
        );

        $this->user_ids = [];
    }


    public function render()
    {
        $imma_directes = ImmatriculationDirecte::
            // withCount('users')->
            orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $imma_directes_count = ImmatriculationDirecte::count();


        return view('livewire.portal.immatriculation-directe.index', ['imma_directes' => $imma_directes, 'imma_directes_count' => $imma_directes_count]);
    }
}
