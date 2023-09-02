<?php

use PDF;
use App\Models\TitreFoncier;
use App\Models\CertificatePropriete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Portal\QrCode\QRCodeScanner;

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

Route::any('/logout', [LoginController::class, 'logout']);

Route::get('/validate-document', function(){

    $certificatepropriete = CertificatePropriete::whereUuid(request('model'))->first();

    if(!empty($certificatepropriete)){
        return abort(404, __('Document not found'));
    }

    $data = [
        'certificatepropriete' => $certificatepropriete,
        'titrefoncier' => $certificatepropriete->titre_foncier,
        // Autres données que vous souhaitez afficher dans la vue
    ];

    $pdf = Pdf::loadView('livewire.portal.certificate-propriete.print', $data)->setPaper('a4', 'portrait');

    return  $pdf->stream($certificatepropriete->uuid.'.pdf');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', App\Http\Livewire\User\Dashboard::class)->name('user.dashboard');

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
    Route::prefix('suivi-dossier')->group(function () {
        Route::get('/', App\Http\Livewire\User\SuiviDossier\Index::class)->name('user.suivi-dossier.index');
        Route::get('/follow', App\Http\Livewire\User\SuiviDossier\Follow::class)->name('user.suivi-dossier.follow');
    });
});


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
            Route::get('/process', App\Http\Livewire\Portal\ImmatriculationDirecte\Process::class)->name('portal.immatriculation_directes.process');
        });

        // <!-- Route::get('maps', function () {

        //     return view('livewire.portal.maps.index');

        //     // Route::get('/', App\Http\Livewire\Portal\Maps\Index::class)->name('portal.maps.index');
        // })->name('portal.maps.index'); -->



        Route::get('/maps', [TestController::class, 'index'])->name('portal.maps.index');

        Route::prefix('releve_immobilier')->group(function () {
            Route::get('/immobilier', App\Http\Livewire\Portal\ReleveImmobilier\Immobilier\Index::class)->name('portal.immobilier.index');
            Route::get('/bien_immobilier', App\Http\Livewire\Portal\BienImmobilier\Index::class)->name('portal.bien_immobilier.index');
        });


        Route::get('/scanner', QRCodeScanner::class)->name('portal.qrcode');

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
