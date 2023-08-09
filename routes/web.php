<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', App\Http\Livewire\User\Dashboard::class)->name('user.dashboard');

    //AuditLogs
    Route::prefix('auditlogs')->group(function () {
        Route::get('/', App\Http\Livewire\User\AuditLogs\Index::class)->name('user.auditlogs');
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
        });

        
        Route::prefix('certificatepropriete')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\CertificatePropriete\Index::class)->name('portal.certificate-propriete.index');
        });
      
        // sales
        Route::prefix('tatalsale')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Sales\TotalSales\Index::class)->name('portal.totalsale.index');
        });
        Route::prefix('simplesale')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Sales\SimpleSales\Index::class)->name('portal.simplesale.index');
        });

        //notary

        Route::prefix('notary')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Notary\Index::class)->name('portal.notary.index');
        });
        Route::prefix('notaryoffice')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\Notary\NotaryOffice\Index::class)->name('portal.notaryoffice.index');
        });

        Route::prefix('registration')->group(function () {
            Route::get('/subdivisions', App\Http\Livewire\Portal\Registration\HousingEstate\Index::class)->name('portal.registrations.housingestates.index');
        });
        Route::prefix('state_assignment')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\StateAssignment\Index::class)->name('portal.registrations.state_assignment.index');
        });
        

        //Categories activites
        Route::prefix('category-activites')->group(function () {
            Route::get('/', App\Http\Livewire\Portal\CategoryActivites\Activite::class)->name('portal.category-activities.activites');
        });

    }
);
