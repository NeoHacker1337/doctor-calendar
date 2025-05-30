<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MarketingRepresentativeController;
use App\Models\Doctor;

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

Route::get('/', [AuthController::class, 'index'])->name('admin.login');
Route::post('admin/checklogin', [AuthController::class, 'checklogin'])->name('admin.checklogin');
Route::get('forgot-password', [AuthController::class, 'forgotpassword'])->name('admin.forgotpassword');
Route::post('forgot-password', [AuthController::class, 'forgotpasswordupdate'])->name('admin.forgotpassword.update');
Route::get('forgot-password/{token}', [AuthController::class, 'putOtp'])->name('admin.otp');
Route::POST('otp', [AuthController::class, 'OtpSubmit'])->name('admin.otp.submit');


Route::prefix('admin')->group(function () {

    Route::get('/', [AuthController::class, 'adminlogin'])->name('admin.login');
    Route::post('admin/checklogin', [AuthController::class, 'adminLoginCheck'])->name('adminlogin.checklogin');


    Route::middleware('admin')->group(function () {
        // Admin-only routes go here
        Route::resource('dashboard', DashboardController::class);
        Route::POST('import-excel',[DashboardController::class,'import'])->name('admin.excelimport');
        Route::get('admin-logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::resource('doctor-list', DoctorController::class);
        Route::get('doctor-list-calendar-preview', [DoctorController::class, 'calendarpreview'])->name('doctor.list.calendar.preview');
        Route::resource('marketing-representative', MarketingRepresentativeController::class);
        Route::get('get-marketing-representative-list', [MarketingRepresentativeController::class, 'mrListtable'])->name('get-marketing-representative-list');
        Route::get('doctor-calendar', [DoctorController::class, 'calendarpreview'])->name('admin.calendar.preview');
        Route::get('doctor-calendar-download', [DoctorController::class, 'calendarDownload'])->name('admin.calendar.download');

        Route::get('mr-doctor-photos-download',[DoctorController::class,'ZipDownload'])->name('admin.zipdownload');

        Route::get('/export-mr-list', [MarketingRepresentativeController::class, 'exportMRList'])->name('exportMRList');

    });
});




Route::group(['middleware' => ['mr']], function () {
    Route::resource('mr-dashboard', DashboardController::class);
    Route::resource('doctors', DoctorController::class);
    Route::post('/update/doctor/{id}', [DoctorController::class, 'updateDoctor'])->name('update.doctor');
    Route::get('doctor-calendar-preview', [DoctorController::class, 'calendarpreview'])->name('calendar.preview');
    Route::get('mr-logout', [AuthController::class, 'mrlogout'])->name('mrlogout');

   
    
    Route::get('view-download-pdf', [DoctorController::class, 'generatePdf'])->name('download.calendar.pdf');
 

});
