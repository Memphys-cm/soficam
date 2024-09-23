<?php

use App\Models\EtatCession;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ReleveImmobilier;
use App\Models\CertificatePropriete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LoginSecurityController;
use App\Http\Livewire\Portal\QrCode\QRCodeScanner;
use App\Models\ImmatriculationDirecte;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language-switcher');

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::group(['prefix' => '2fa'], function () {

    Route::get('/', [LoginSecurityController::class, 'show2faForm'])->name('2fa');

    Route::post('/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');

    Route::post('/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa');

    Route::post('/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');

});


Route::any('/logout', [LoginController::class, 'logout']);

Route::get('document/verify/cf/{numero_cf}', [DocumentController::class, 'verify'])->name('document.verify.cf');

Route::get('/validate-document/{category}/{model}', function($category, $model)
{
    $element = match ('certificate_propriete') {
        'certificate_propriete' => CertificatePropriete::whereUuid('737b2744-15d8-4d45-89f6-4d0f365f94a0')->first(),
        'etat_cession' => EtatCession::whereUuid(request('model'))->first(),
        'immobilier' => ReleveImmobilier::whereUuid(request('model'))->first(),
         default => null,
    };

    if (empty($element)) {
        return abort(404, __('Document not found'));
    }

    $data = [
        'element' => $element,
        'titrefoncier' => $element->titre_foncier,
    ];

    $pdf = match ('certificate_propriete') {
        'certificate_propriete' =>  Pdf::loadView('livewire.portal.certificate-propriete.print', $data)->setPaper('a4', 'portrait'),
        'etat_cession' =>  Pdf::loadView('livewire.portal.etat-cession.print', $data)->setPaper('a4', 'portrait'),
        'immobilier' =>  Pdf::loadView('livewire.portal.releve-immobilier.immobilier.print', $data)->setPaper('a4', 'portrait'),
        default => '',
    };

    return  $pdf->stream($element->uuid.'.pdf');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', App\Http\Livewire\User\Dashboard::class)->name('user.dashboard');

    Route::get('/profile-setting', App\Http\Livewire\User\ProfileSetting::class)->name('user.profile-setting');
    //AuditLogs
    Route::prefix('auditlogs')->group(function () {
        Route::get('/', App\Http\Livewire\User\AuditLogs\Index::class)->name('user.auditlogs');
    });

    Route::prefix('menu')->group(function () {
        Route::get('/paiement', App\Http\Livewire\User\Paiement\Index::class)->name('user.paiement');
    });

    Route::prefix('taxfonciere')->group(function () {
        Route::get('/', App\Http\Livewire\User\Taxfonciere\Index::class)->name('user.taxfonciere.index');
        // Route::get('/suivi-taxfoncier', App\Http\Livewire\Portal\Taxfonciere\SuiviTaxfonciere\Index::class)->name('portal.taxfonciere.suivi.index');
    });

    Route::prefix('demande')->group(function () {
        Route::get('/certificat', App\Http\Livewire\User\Request\CertificatPropriate\Index::class)->name('user.request.certificat.index');
    });

    Route::prefix('suivi-dossier')->group(function () {
        Route::get('/', App\Http\Livewire\User\SuiviDossier\Index::class)->name('user.suivi-dossier.index');
        Route::get('/follow/{code}', App\Http\Livewire\User\SuiviDossier\Follow::class)->name('user.suivi-dossier.follow');
    });
});

Route::get('tresorpublic.cm/fr/ministries/mindcaf' , App\Http\Livewire\Payment\TresorPay\Index::class)->name('tresor_pay.index');

Route::get('tresorpublic.cm/fr/services/mindcafcp/{uuid?}' , App\Http\Livewire\Payment\TresorPay\CertificatPropriate\Index::class)->name('tresor_pay.certificat_pay');
Route::get('impot.cm/fr/services/mindcaf' , App\Http\Livewire\Payment\Impot\TaxeFonciere::class)->name('impot.index');
Route::get('impot.cm/fr/services/mindcaftf/{uuid?}' , App\Http\Livewire\Payment\Impot\TaxeFonciere\Pay::class)->name('impot.certificat_pay');


Route::group(
    ['prefix' => 'portal', 'middleware' => ['auth']],
    function () {

        Route::get('/dashboard', App\Http\Livewire\Portal\Dashboard::class)->name('portal.dashboard');

        Route::get('/profile-setting', App\Http\Livewire\Portal\ProfileSetting::class)->name('portal.profile-setting');

        // AuditLogs
        Route::prefix('auditlogs')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\AuditLogs\Index::class)->name('portal.auditlogs.index');
        });

        Route::prefix('regions')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Regions\Index::class)->name('portal.regions.index');
        });

        Route::prefix('divisions')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Divisions\Index::class)->name('portal.divisions.index');
        });

        Route::prefix('sub-divisions')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\SubDivisions\Index::class)->name('portal.sub-divisions.index');
        });

        Route::prefix('lands')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\MarketValue\Index::class)->name('portal.market-value.index');
        });

        Route::prefix('services')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Services\Index::class)->name('portal.services.index');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Users\Index::class)->name('portal.users.index');
        });

        //roles
        Route::prefix('roles')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Roles\Index::class)->name('portal.roles.index');
        });


        //Land titles
        Route::prefix('titrefonciers')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\TitreFonciers\Index::class)->name('portal.titre-fonciers.index');
            Route::get('certificatepropriete', App\Http\Livewire\Portal\CertificatePropriete\Index::class)->name('portal.certificate-propriete.index');

            Route::get('/report', App\Http\Livewire\Portal\TitreFonciers\Report\Index::class)->name('portal.titre-fonciers-report.index');

            Route::get('/charges', App\Http\Livewire\Portal\TitreFonciers\Charges\Index::class)->name('portal.titre-fonciers-charges.index');
        });

        Route::prefix('operations')->group(function () {
            Route::get('mutation-totale', App\Http\Livewire\Portal\Operations\MutationTotale\Index::class)->name('portal.mutation-totale.index');
            Route::get('morcellements', App\Http\Livewire\Portal\Operations\Morcellements\Index::class)->name('portal.morcellements.index');
            Route::get('retrait-indivisions', App\Http\Livewire\Portal\Operations\RetraitIndivision\Index::class)->name('portal.retrait-indivisions.index');
            Route::get('/{operation_id}/details', App\Http\Livewire\Portal\Operations\Partials\OpsDetails::class)->name('portal.operations.details');
        });

        Route::prefix('land-sales')->group(function () {
            Route::get('mutation-totale', App\Http\Livewire\Portal\Sales\TotalSales\Index::class)->name('portal.total-sale.index');
            Route::get('simple', App\Http\Livewire\Portal\Sales\SimpleSales\Index::class)->name('portal.simple-sale.index');
        });

        Route::prefix('sales-report')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Sales\SalesReport\Index::class)->name('portal.sales-report.index');
        });
        Route::prefix('sales-payments')->group(function () {

            Route::get('/', App\Http\Livewire\Portal\Sales\AllSales\Index::class)->name('portal.allsales.index');
        });

        Route::prefix('cabinets')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\MembreDuCabinet\Cabinet\Index::class)->name('portal.cabinets.index');
            Route::get('membre-du-cabinets', App\Http\Livewire\Portal\MembreDuCabinet\Index::class)->name('portal.membre-du-cabinets.index');
        });

        Route::prefix('lotissements')->group(function () {
            Route::get('/view-all', App\Http\Livewire\Portal\Lotissements\Index::class)->name('portal.lotissements.index');
            Route::get('/create', App\Http\Livewire\Portal\Lotissements\Create::class)->name('portal.lotissements.create');
            Route::get('/{lotissement_id}/edit', App\Http\Livewire\Portal\Lotissements\Edit::class)->name('portal.lotissements.edit');
            Route::get('/{lotissement_id}/simple-sale', App\Http\Livewire\Portal\Lotissements\Sale::class)->name('portal.lotissements.simple-sale');
        });
        Route::prefix('etat-cessions')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\EtatCession\Index::class)->name('portal.etat-cession.index');
        });

        Route::prefix('immatriculation_directes')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\ImmatriculationDirecte\Index::class)->name('portal.immatriculation_directes.index');
            Route::get('/{code}', App\Http\Livewire\Portal\ImmatriculationDirecte\Show::class)->name('portal.immatriculation_directe.index');
            Route::get('/process', App\Http\Livewire\Portal\ImmatriculationDirecte\Process::class)->name('portal.immatriculation_directes.process');
        });

        // <!-- Route::get('maps', function () {

        //     return view('livewire.portal.maps.index');

        //     // Route::get('/', App\Http\Livewire\Portal\Maps\Index::class)->name('portal.maps.index');
        // })->name('portal.maps.index'); -->



        // Route::get('/maps', [TestController::class, 'index'])->name('portal.maps.index');

        Route::get('/maps', function () {
            // Supposons que vous avez un pointId, remplacez-le par l'ID approprié
            $pointId = 1; // Remplacez 1 par l'ID du point que vous souhaitez récupérer
            // $point = PointModel::find($pointId);11.516213163344588,3.8722015777978243
            // Extrayez les coordonnées du modèle
            $longitude = 11.516213163344588;
            $latitude = 3.8722015777978243;

            // Récupérez également vos titres fonciers avec les utilisateurs associés
            $titles = TitreFoncier::with('users','land','sub_division')->get();

            

            $immatriculations = ImmatriculationDirecte::with('users')->get();

            // Passez les coordonnées et les titres fonciers à la vue
            return view('first_test', compact('titles','immatriculations', 'longitude', 'latitude'))->layout('components.layouts.dashboard');
        })->name('portal.maps.index');

        Route::prefix('releve_immobilier')->group(function () {
            Route::get('/immobilier', App\Http\Livewire\Portal\ReleveImmobilier\Immobilier\Index::class)->name('portal.immobilier.index');
            Route::get('/bien_immobilier', App\Http\Livewire\Portal\BienImmobilier\Index::class)->name('portal.biens_immobiliers.index');
        });


        Route::get('/scanner', QRCodeScanner::class)->name('portal.qrcode');


        Route::get('/statistics/daf', App\Http\Livewire\Portal\Statistics\QuestDaf\Index::class)->name('portal.statictics');

        //Categories activites
        Route::prefix('category-activites')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\CategoryActivites\Activite::class)->name('portal.category-activities.activites');
        });

        //

        Route::prefix('taxfonciere')->group(function () {
            Route::get('/suivi-taxfoncier', App\Http\Livewire\Portal\Taxfonciere\SuiviTaxfonciere\Index::class)->name('portal.taxfonciere.suivi.index');
        });
    }
);
