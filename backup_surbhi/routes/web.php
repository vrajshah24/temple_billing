<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahavirpuramController;
use App\Http\Controllers\ShreeFoundationController;
use App\Http\Controllers\LoginController;

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
Route::get('/home', function () {
    $admin_id = session('admin_id');
    if($admin_id != ''){
        return view('shreeMahavirpuramTrustHome');;
    }else{
        return view('login');
    }
    
});
//Login Routes
Route::get('/', function () {
    $admin_id = session('admin_id');
    if($admin_id != ''){
        return view('shreeMahavirpuramTrustHome');;
    }else{
        return view('login');
    }
    return view('login');
});
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Add Admin Routes
Route::get('/addAdmin', [LoginController::class, 'addAdmin'])->name('addAdmin');
Route::post('/addAdmin/submit', [LoginController::class, 'storeAdmin'])->name('storeAdmin');

//Shree Trust Routes
Route::get('/shreeFoundation/createInvoice', [ShreeFoundationController::class, 'createInvoice'])->name('shreeTrustInvoice');
Route::get('/shreeFoundation/invoiceList', [ShreeFoundationController::class, 'mainInvoiceList'])->name('shreeTrustDonaterList');
Route::get('/shreeFoundation/invoiceDetailList/{invoice_id}', [ShreeFoundationController::class, 'detailInvoiceList'])->name('shreeTrustDonaterReciepts');
Route::get('/shreeFoundation/viewInvoice/{invoice_id}', [ShreeFoundationController::class, 'viewInvoice'])->name('shreeTrustDonaterInvoice');
Route::post('/shreeFoundation/addInvoice',[ShreeFoundationController::class,'addInvoice'])->name('shreeFoundationAdd');


//Mahavirpuram Routes
Route::get('/mahavirpuram/createInvoice', [MahavirpuramController::class, 'createInvoice'])->name('mahavirpuramInvoice');
Route::get('/mahavirpuram/invoiceList', [MahavirpuramController::class, 'mainInvoiceList'])->name('mahavirpuramDonaterList');
Route::get('/mahavirpuram/invoiceDetailList/{invoice_id}', [MahavirpuramController::class, 'detailInvoiceList'])->name('mahavirpuramDonaterReciepts');
Route::get('/mahavirpuram/viewInvoice/{invoice_id}', [MahavirpuramController::class, 'viewInvoice'])->name('mahavirpuramDonaterInvoice');
Route::post('/mahavirpuram/addInvoice',[MahavirpuramController::class,'addInvoice'])->name('mahavirpuramAdd');

