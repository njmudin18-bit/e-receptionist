<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\PermissionsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor.index');
Route::post('/visitor/form-data-diri', [VisitorController::class, 'list_data_diri'])->name('visitor.form-data-diri');
Route::post('/visitor/send-data-diri', [VisitorController::class, 'send_data_diri'])->name('visitor.send-data-diri');
Route::get('/visitor/sukses-daftar/{email}/{ticket}/{channel}', [VisitorController::class, 'sukses_daftar'])->name('visitor.sukses-daftar');
Route::get('/visitor/visitor-detail/{email}/{ticket}/{channel}', [VisitorController::class, 'visitor_detail'])->name('visitor.visitor-detail');
Route::post('/visitor/checkout-manual', [VisitorController::class, 'checkout_manual'])->name('visitor.checkout-manual');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/jadwal', [VisitorController::class, 'jadwal'])->name('visitor.jadwal');
Route::post('/jadwal-list', [VisitorController::class, 'jadwal_list'])->name('visitor.jadwal-list');

Route::group(['middleware' => 'preventBackHistory'],function(){
  Auth::routes();
	//Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'preventBackHistory']], function() {
  Route::get('/', [HomeController::class, 'index'])->name('home');

  Route::post('/home/data-grafik', [HomeController::class, 'data_grafik'])->name('home.data-grafik');
  Route::resource('permissions', PermissionsController::class);
  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);
  Route::resource('students', StudentController::class);
  Route::resource('articles', ArticleController::class);
  //Route::get('/table/student', [StudentController::class, 'dataTable'])->name('table.student');

  Route::get('/table/role', [RoleController::class, 'dataTable'])->name('table.role');
  Route::post('/roles/showed', [RoleController::class, 'showed'])->name('roles.showed');

  Route::get('/table/permissions', [PermissionsController::class, 'dataTable'])->name('table.permissions');
  Route::post('/permissions/deleted', [PermissionsController::class, 'deleted'])->name('permissions.deleted');
  Route::post('/permissions/edited', [PermissionsController::class, 'edited'])->name('permissions.edited');
  Route::post('/permissions/updated', [PermissionsController::class, 'updated'])->name('permissions.updated');

  Route::get('/table/user', [UserController::class, 'dataTable'])->name('table.user');
  //UPDATE PASSWORD
  Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
  Route::post('/password/update-password', [PasswordController::class, 'update_password'])->name('password.update-password');
  //Route::get('/table/article', [ArticleController::class, 'dataTable'])->name('table.article');

  //FORM
  Route::resource('form', FormController::class);
  Route::post('/form/show-all-form', [FormController::class, 'show_all_form'])->name('form.show-all-form');
  Route::post('/form/activated-form-tujuan', [FormController::class, 'activated_form_tujuan'])->name('form.activated-form-tujuan');
  Route::post('/form/activated-form-syarat-dan-ketentuan', [FormController::class, 'activated_form_syarat_dan_ketentuan'])->name('form.activated-form-syarat-dan-ketentuan');
  Route::post('/form/updated-form-data-diri', [FormController::class, 'updated_form_data_diri'])->name('form.updated-form-data-diri');
  Route::post('/form/updated-form-tujuan', [FormController::class, 'updated_form_tujuan'])->name('form.updated-form-tujuan');
  Route::post('/form/updated-form-syarat-dan-ketentuan', [FormController::class, 'updated_form_syarat_dan_ketentuan'])->name('form.updated-form-syarat-dan-ketentuan');

  //QR
  Route::get('/qr', [QrController::class, 'index'])->name('qr.index');
  Route::get('/qr/list', [QrController::class, 'dataTable'])->name('qr.list');
  Route::post('/qr/store', [QrController::class, 'store'])->name('qr.store');
  Route::post('/qr/edited', [QrController::class, 'edited'])->name('qr.edited');
  Route::post('/qr/updated', [QrController::class, 'updated'])->name('qr.updated');
  Route::post('/qr/deleted', [QrController::class, 'deleted'])->name('qr.deleted');
  Route::get('/qr/qr-preview', [QrController::class, 'qr_preview'])->name('qr.qr-preview');

  //TELEGRAM
  Route::get('/telegram', [TelegramController::class, 'index'])->name('telegram.index');
  Route::get('/telegram/list', [TelegramController::class, 'dataTable'])->name('telegram.list');
  Route::post('/telegram/store', [TelegramController::class, 'store'])->name('telegram.store');
  Route::post('/telegram/edited', [TelegramController::class, 'edited'])->name('telegram.edited');
  Route::post('/telegram/updated', [TelegramController::class, 'updated'])->name('telegram.updated');
  Route::post('/telegram/deleted', [TelegramController::class, 'deleted'])->name('telegram.deleted');

  //PENGUNJUNG
  Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
  Route::get('/pengunjung/list', [PengunjungController::class, 'dataTable'])->name('pengunjung.list');
});

