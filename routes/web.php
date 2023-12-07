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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DataPopupController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AllowedipController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




// Route::get('/', function () {


//     if (Auth::check()) {
//         return redirect()->intended('/superadmin');
//     }

//     return redirect()->intended('/login');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('/kontak', [FrontendController::class, 'kontak']);
Route::get('/pemenang', [FrontendController::class, 'pemenang']);
Route::get('/footer', [FrontendController::class, 'footer']);
Route::get('/gaji', [FrontendController::class, 'gaji']);
Route::get('/syarat_ketentuan', [FrontendController::class, 'syarat_ketentuan']);
Route::get('/popup', [FrontendController::class, 'popup']);
Route::post('/loginfront', [FrontendController::class, 'loginfront']);
Route::get('/halaman_mitra', [FrontendController::class, 'halaman_mitra']);
Route::get('/mitra', [FrontendController::class, 'mitra']);
Route::get('/getData', [FrontendController::class, 'getData']);
Route::get('/halaman_laporan', [FrontendController::class, 'halaman_laporan']);
Route::get('/halaman_shortener', [FrontendController::class, 'halaman_shortener']);
Route::get('/logoutfront', [FrontendController::class, 'logout']);
Route::get('/hapus_shorten/{id}', [FrontendController::class, 'hapus_shorten']);
Route::get('/shorten', [FrontendController::class, 'shorten']);
Route::get('/s/{shorten}', [FrontendController::class, 'shortenGet']);


Route::get('/superadmin', function () {
    return view('index', [
        'title' => 'superadmin',
    ]);
})->middleware('auth');

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

Route::middleware(['auth'])->group(function () {
    /*-- Adminl21 --*/
    Route::get('/xx88/adminl21', [Adminl21Controller::class, 'index']);
    Route::get('/xx88/adminl21/add', [Adminl21Controller::class, 'create']);
    Route::get('/xx88/adminl21/edit/{id}', [Adminl21Controller::class, 'edit']);
    Route::post('/xx88/adminl21/store', [Adminl21Controller::class, 'store']);
    Route::post('/xx88/adminl21/update', [Adminl21Controller::class, 'update']);
    Route::delete('/xx88/adminl21/delete', [Adminl21Controller::class, 'destroy']);
    Route::get('/xx88/adminl21/view/{id}', [Adminl21Controller::class, 'views']);


    /*-- Data Kasbon --*/
    Route::get('/xx88/datakasbon', [DataKasbonController::class, 'index']);
    Route::get('/xx88/datakasbon/add', [DataKasbonController::class, 'create']);
    Route::get('/xx88/datakasbon/edit/{id}', [DataKasbonController::class, 'edit']);
    Route::post('/xx88/datakasbon/store', [DataKasbonController::class, 'store']);
    Route::post('/xx88/datakasbon/update', [DataKasbonController::class, 'update']);
    Route::delete('/xx88/datakasbon/delete', [DataKasbonController::class, 'destroy']);
    Route::get('/xx88/datakasbon/view/{id}', [DataKasbonController::class, 'views']);

    /*--  Gaji Refferal --*/
    Route::get('/xx88/gajirefferal', [GajiRefferalController::class, 'index']);
    Route::get('/xx88/gajirefferal/add', [GajiRefferalController::class, 'create']);
    Route::get('/xx88/gajirefferal/edit/{id}', [GajiRefferalController::class, 'edit']);
    Route::post('/xx88/gajirefferal/store', [GajiRefferalController::class, 'store']);
    Route::post('/xx88/gajirefferal/update', [GajiRefferalController::class, 'update']);
    Route::delete('/xx88/gajirefferal/delete', [GajiRefferalController::class, 'destroy']);
    Route::get('/xx88/gajirefferal/view/{id}', [GajiRefferalController::class, 'views']);

    /*--  Links Shorten --*/
    Route::get('/xx88/linksshorten', [LinksShortenController::class, 'index']);
    Route::get('/xx88/linksshorten/add', [LinksShortenController::class, 'create']);
    Route::get('/xx88/linksshorten/edit/{id}', [LinksShortenController::class, 'edit']);
    Route::post('/xx88/linksshorten/store', [LinksShortenController::class, 'store']);
    Route::post('/xx88/linksshorten/update', [LinksShortenController::class, 'update']);
    Route::delete('/xx88/linksshorten/delete', [LinksShortenController::class, 'destroy']);
    Route::get('/xx88/linksshorten/view/{id}', [LinksShortenController::class, 'views']);

    /*--  Pencari Refferal --*/
    Route::get('/xx88/pencarirefferal', [PencariRefferalController::class, 'index']);
    Route::get('/xx88/pencarirefferal/add', [PencariRefferalController::class, 'create']);
    Route::get('/xx88/pencarirefferal/edit/{id}', [PencariRefferalController::class, 'edit']);
    Route::post('/xx88/pencarirefferal/store', [PencariRefferalController::class, 'store']);
    Route::post('/xx88/pencarirefferal/update', [PencariRefferalController::class, 'update']);
    Route::delete('/xx88/pencarirefferal/delete', [PencariRefferalController::class, 'destroy']);
    Route::get('/xx88/pencarirefferal/view/{id}', [PencariRefferalController::class, 'views']);
    Route::get('/xx88/pencarirefferal/datauserrefferal/{website}', [PencariRefferalController::class, 'datauserrefferal']);

    /*--  Syarat Ketentuan --*/
    Route::get('/xx88/syaratketentuan', [SyaratKetentuanController::class, 'index']);
    Route::get('/xx88/syaratketentuan/add', [SyaratKetentuanController::class, 'create']);
    Route::get('/xx88/syaratketentuan/edit/{id}', [SyaratKetentuanController::class, 'edit']);
    Route::post('/xx88/syaratketentuan/store', [SyaratKetentuanController::class, 'store']);
    Route::post('/xx88/syaratketentuan/update', [SyaratKetentuanController::class, 'update']);
    Route::delete('/xx88/syaratketentuan/delete', [SyaratKetentuanController::class, 'destroy']);
    Route::get('/xx88/syaratketentuan/view/{id}', [SyaratKetentuanController::class, 'views']);

    /*--  Syarat Ketentuan --*/
    Route::get('/xx88/tabeldownline', [TabelDownlineController::class, 'index']);
    Route::get('/xx88/tabeldownline/add', [TabelDownlineController::class, 'create']);
    Route::get('/xx88/tabeldownline/edit/{id}', [TabelDownlineController::class, 'edit']);
    Route::post('/xx88/tabeldownline/store', [TabelDownlineController::class, 'store']);
    Route::post('/xx88/tabeldownline/update', [TabelDownlineController::class, 'update']);
    Route::delete('/xx88/tabeldownline/delete', [TabelDownlineController::class, 'destroy']);
    Route::get('/xx88/tabeldownline/view/{id}', [TabelDownlineController::class, 'views']);
    Route::delete('/xx88/tabeldownline/deleteall', [TabelDownlineController::class, 'destroyall']);

    /*--  Tabel Newmember --*/
    Route::get('/xx88/tabelnewmember', [TabelNewmemberController::class, 'index']);
    Route::get('/xx88/tabelnewmember/add', [TabelNewmemberController::class, 'create']);
    Route::get('/xx88/tabelnewmember/edit/{id}', [TabelNewmemberController::class, 'edit']);
    Route::post('/xx88/tabelnewmember/store', [TabelNewmemberController::class, 'store']);
    Route::post('/xx88/tabelnewmember/update', [TabelNewmemberController::class, 'update']);
    Route::delete('/xx88/tabelnewmember/delete', [TabelNewmemberController::class, 'destroy']);
    Route::get('/xx88/tabelnewmember/view/{id}', [TabelNewmemberController::class, 'views']);
    Route::delete('/xx88/tabelnewmember/deleteall', [TabelNewmemberController::class, 'destroyall']);

    /*--  User Refferal --*/
    Route::get('/xx88/userrefferal', [UserRefferalController::class, 'index']);
    Route::get('/xx88/userrefferal/add', [UserRefferalController::class, 'create']);
    Route::get('/xx88/userrefferal/edit/{id}', [UserRefferalController::class, 'edit']);
    Route::post('/xx88/userrefferal/store', [UserRefferalController::class, 'store']);
    Route::post('/xx88/userrefferal/update', [UserRefferalController::class, 'update']);
    Route::delete('/xx88/userrefferal/delete', [UserRefferalController::class, 'destroy']);
    Route::get('/xx88/userrefferal/view/{id}', [UserRefferalController::class, 'views']);



    /*--  Data Popup --*/
    Route::get('/xx88/datapopup', [DataPopupController::class, 'index']);
    Route::get('/xx88/datapopup/add', [DataPopupController::class, 'create']);
    Route::get('/xx88/datapopup/edit/{id}', [DataPopupController::class, 'edit']);
    Route::post('/xx88/datapopup/store', [DataPopupController::class, 'store']);
    Route::post('/xx88/datapopup/update', [DataPopupController::class, 'update']);
    Route::delete('/xx88/datapopup/delete', [DataPopupController::class, 'destroy']);
    Route::get('/xx88/datapopup/view/{id}', [DataPopupController::class, 'views']);

    /*--  Data User --*/
    Route::get('/xx88/user', [UserController::class, 'index']);
    Route::get('/xx88/user/add', [UserController::class, 'create']);
    Route::get('/xx88/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/xx88/user/store', [UserController::class, 'store']);
    Route::post('/xx88/user/update', [UserController::class, 'update']);
    Route::delete('/xx88/user/delete', [UserController::class, 'destroy']);
    Route::get('/xx88/user/view/{id}', [UserController::class, 'views']);

    /*--  Allowed IP --*/
    Route::get('/xx88/allowedip', [AllowedipController::class, 'index']);
    Route::get('/xx88/allowedip/add', [AllowedipController::class, 'create']);
    Route::get('/xx88/allowedip/edit/{id}', [AllowedipController::class, 'edit']);
    Route::post('/xx88/allowedip/store', [AllowedipController::class, 'store']);
    Route::post('/xx88/allowedip/update', [AllowedipController::class, 'update']);
    Route::delete('/xx88/allowedip/delete', [AllowedipController::class, 'destroy']);
    Route::get('/xx88/allowedip/view/{id}', [AllowedipController::class, 'views']);

    //LAPORAN
    Route::get('/xx88/laporan', [LaporanController::class, 'index']);
    Route::get('/xx88/exportlaporan', [LaporanController::class, 'generatePDF']);

    Route::get('/xx88/test', function (Request $request) {
        $token = $request->session()->token();

        return view('rtp.test');
    });
});

Route::get('/xx88/unauthorized', function () {
    // return 'Akses tidak diizinkan!'; // Anda bisa menyesuaikan pesan respon atau mengarahkan ke tampilan (view).
    return Redirect::away('https://promol21.com/');
})->name('unauthorized');


Route::get('/xx88/images/{imageFolder}/{imagePath}', [ImageController::class, 'getImageUrl']);



Route::group(['middleware' => 'checkUsernamelogin'], function () {
    Route::post('/update_password', [FrontendController::class, 'update_password']);
    Route::post('/update_page', [FrontendController::class, 'update_page']);
    Route::post('/update_wa', [FrontendController::class, 'update_wa']);
    Route::post('/update_fb', [FrontendController::class, 'update_fb']);
    Route::post('/update_background', [FrontendController::class, 'update_background']);
    Route::post('/update_textpage', [FrontendController::class, 'update_textpage']);
    Route::post('/update_colorpage', [FrontendController::class, 'update_colorpage']);
    Route::post('/update_daftar_color', [FrontendController::class, 'update_daftar_color']);
    Route::post('/update_login_color', [FrontendController::class, 'update_login_color']);
    Route::post('/update_profile_image', [FrontendController::class, 'update_profile_image']);
});
