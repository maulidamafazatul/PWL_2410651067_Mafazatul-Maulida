<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {    //menangkap client memakai get
    return view('welcome');      //mengarah pada views lalu mengarah file "welcome"
    //return redirect('https://www.youtube.com/');
});

/*Route::get('/', function () {
    return view('hello');
});


//route dasar
Route::get('/surat masuk', function () {    
    return 'Halaman Surat Masuk';    
});

//route dengan parameter
Route::get('/surat masuk/{id}', function ($id) {    
    return 'Detail Surat Masuk dengan ID'.$id;    
})->name('surat-masuk.index');

//named route
Route::get('/surat masuk/{id}', function ($id) {    
    return 'Halaman Surat Masuk'.$id;    
})->name('surat-masuk.show');*/


Route::get('/surat-masuk', [SuratMasukController::class,'index'])->name('surat-masuk.index');

Route::get('/surat-masuk/{id}', [SuratMasukController::class,'show'])->name('surat-masuk.show');















//note
//php artisan:list
//php artisan make:controller NamaFile