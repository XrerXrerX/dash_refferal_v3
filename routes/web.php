<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\WebMediaNewsController;
use App\Http\Controllers\Adminl21Controller;
use App\Http\Controllers\DataKasbonController;
use App\Http\Controllers\GajiRefferalController;
use App\Http\Controllers\LinksShortenController;
use App\Http\Controllers\PencariRefferalController;
use App\Http\Controllers\SyaratKetentuanController;
use App\Http\Controllers\TabelDownlineController;
use App\Http\Controllers\TabelNewmemberController;
use App\Http\Controllers\UserRefferalController;
use App\Http\Controllers\DataPopupController;
use App\Http\Controllers\LaporanController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/', function () {


    if (Auth::check()) {
        return redirect()->intended('/superadmin');
    }

    return redirect()->intended('/login');
});


Route::get('/superadmin', function () {
    return view('index', [
        'title' => 'superadmin',
    ]);
});

Route::get('/dashboard', function () {
    return view('/komponen/dashboard', [
        'title' => 'superadmin',
    ]);
});
// ->Middleware(['auth', 'superadmin']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->Middleware('auth');

Route::get('/topnav', function () {
    return view('komponen.top_nav');
})->name('topnav');


Route::get('/sidenav', function () {
    return view('komponen.side_nav');
})->name('sidenav');

Route::get('/codebox', function () {
    return view('komponen.code_box');
})->name('codebox');

Route::get('/codetable', function () {
    return view('komponen.code_table');
})->name('codetable');

Route::get('/codeform', function () {
    return view('komponen.code_form');
})->name('codeform');

Route::get('/codemodal', function () {
    return view('komponen.code_modal');
})->name('codemodal');

Route::get('/codebutton', function () {
    return view('komponen.code_button');
})->name('codebutton');

Route::get('/codecard', function () {
    return view('komponen.code_card');
})->name('codecard');

Route::get('/codeother', function () {
    return view('komponen.code_other');
})->name('codeother');


/*-- Adminl21 --*/
Route::get('/adminl21', [Adminl21Controller::class, 'index']);
Route::get('/adminl21/add', [Adminl21Controller::class, 'create']);
Route::get('/adminl21/edit/{id}', [Adminl21Controller::class, 'edit']);
Route::post('/adminl21/store', [Adminl21Controller::class, 'store']);
Route::post('/adminl21/update', [Adminl21Controller::class, 'update']);
Route::delete('/adminl21/delete', [Adminl21Controller::class, 'destroy']);
Route::get('/adminl21/view/{id}', [Adminl21Controller::class, 'views']);

/*-- Data Kasbon --*/
Route::get('/datakasbon', [DataKasbonController::class, 'index']);
Route::get('/datakasbon/add', [DataKasbonController::class, 'create']);
Route::get('/datakasbon/edit/{id}', [DataKasbonController::class, 'edit']);
Route::post('/datakasbon/store', [DataKasbonController::class, 'store']);
Route::post('/datakasbon/update', [DataKasbonController::class, 'update']);
Route::delete('/datakasbon/delete', [DataKasbonController::class, 'destroy']);
Route::get('/datakasbon/view/{id}', [DataKasbonController::class, 'views']);

/*--  Gaji Refferal --*/
Route::get('/gajirefferal', [GajiRefferalController::class, 'index']);
Route::get('/gajirefferal/add', [GajiRefferalController::class, 'create']);
Route::get('/gajirefferal/edit/{id}', [GajiRefferalController::class, 'edit']);
Route::post('/gajirefferal/store', [GajiRefferalController::class, 'store']);
Route::post('/gajirefferal/update', [GajiRefferalController::class, 'update']);
Route::delete('/gajirefferal/delete', [GajiRefferalController::class, 'destroy']);
Route::get('/gajirefferal/view/{id}', [GajiRefferalController::class, 'views']);

/*--  Links Shorten --*/
Route::get('/linksshorten', [LinksShortenController::class, 'index']);
Route::get('/linksshorten/add', [LinksShortenController::class, 'create']);
Route::get('/linksshorten/edit/{id}', [LinksShortenController::class, 'edit']);
Route::post('/linksshorten/store', [LinksShortenController::class, 'store']);
Route::post('/linksshorten/update', [LinksShortenController::class, 'update']);
Route::delete('/linksshorten/delete', [LinksShortenController::class, 'destroy']);
Route::get('/linksshorten/view/{id}', [LinksShortenController::class, 'views']);

/*--  Pencari Refferal --*/
Route::get('/pencarirefferal', [PencariRefferalController::class, 'index']);
Route::get('/pencarirefferal/add', [PencariRefferalController::class, 'create']);
Route::get('/pencarirefferal/edit/{id}', [PencariRefferalController::class, 'edit']);
Route::post('/pencarirefferal/store', [PencariRefferalController::class, 'store']);
Route::post('/pencarirefferal/update', [PencariRefferalController::class, 'update']);
Route::delete('/pencarirefferal/delete', [PencariRefferalController::class, 'destroy']);
Route::get('/pencarirefferal/view/{id}', [PencariRefferalController::class, 'views']);

/*--  Syarat Ketentuan --*/
Route::get('/syaratketentuan', [SyaratKetentuanController::class, 'index']);
Route::get('/syaratketentuan/add', [SyaratKetentuanController::class, 'create']);
Route::get('/syaratketentuan/edit/{id}', [SyaratKetentuanController::class, 'edit']);
Route::post('/syaratketentuan/store', [SyaratKetentuanController::class, 'store']);
Route::post('/syaratketentuan/update', [SyaratKetentuanController::class, 'update']);
Route::delete('/syaratketentuan/delete', [SyaratKetentuanController::class, 'destroy']);
Route::get('/syaratketentuan/view/{id}', [SyaratKetentuanController::class, 'views']);

/*--  Syarat Ketentuan --*/
Route::get('/tabeldownline', [TabelDownlineController::class, 'index']);
Route::get('/tabeldownline/add', [TabelDownlineController::class, 'create']);
Route::get('/tabeldownline/edit/{id}', [TabelDownlineController::class, 'edit']);
Route::post('/tabeldownline/store', [TabelDownlineController::class, 'store']);
Route::post('/tabeldownline/update', [TabelDownlineController::class, 'update']);
Route::delete('/tabeldownline/delete', [TabelDownlineController::class, 'destroy']);
Route::get('/tabeldownline/view/{id}', [TabelDownlineController::class, 'views']);

/*--  Tabel Newmember --*/
Route::get('/tabelnewmember', [TabelNewmemberController::class, 'index']);
Route::get('/tabelnewmember/add', [TabelNewmemberController::class, 'create']);
Route::get('/tabelnewmember/edit/{id}', [TabelNewmemberController::class, 'edit']);
Route::post('/tabelnewmember/store', [TabelNewmemberController::class, 'store']);
Route::post('/tabelnewmember/update', [TabelNewmemberController::class, 'update']);
Route::delete('/tabelnewmember/delete', [TabelNewmemberController::class, 'destroy']);
Route::get('/tabelnewmember/view/{id}', [TabelNewmemberController::class, 'views']);

/*--  User Refferal --*/
Route::get('/userrefferal', [UserRefferalController::class, 'index']);
Route::get('/userrefferal/add', [UserRefferalController::class, 'create']);
Route::get('/userrefferal/edit/{id}', [UserRefferalController::class, 'edit']);
Route::post('/userrefferal/store', [UserRefferalController::class, 'store']);
Route::post('/userrefferal/update', [UserRefferalController::class, 'update']);
Route::delete('/userrefferal/delete', [UserRefferalController::class, 'destroy']);
Route::get('/userrefferal/view/{id}', [UserRefferalController::class, 'views']);

/*--  Data Popup --*/
Route::get('/datapopup', [DataPopupController::class, 'index']);
Route::get('/datapopup/add', [DataPopupController::class, 'create']);
Route::get('/datapopup/edit/{id}', [DataPopupController::class, 'edit']);
Route::post('/datapopup/store', [DataPopupController::class, 'store']);
Route::post('/datapopup/update', [DataPopupController::class, 'update']);
Route::delete('/datapopup/delete', [DataPopupController::class, 'destroy']);
Route::get('/datapopup/view/{id}', [DataPopupController::class, 'views']);

//LAPORAN
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/exportlaporan', function () {
    $pdf = PDF::loadView('invoice');
    return $pdf->download('invoice.pdf');
});


Route::get('/test', function (Request $request) {
    $token = $request->session()->token();

    return view('rtp.test');
});
