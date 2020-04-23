<?php

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('/artikel', 'ArtikelController');
    Route::resource('/halaman', 'HalamanController');
    Route::resource('/kategori', 'kategoriController');
    Route::resource('/tema', 'TemaController');
    Route::resource('/menu', 'MenuController');
    Route::resource('/komentar', 'KomentarController');
    Route::post('/komentar/balas/{id}', 'KomentarController@balas')->name('admin.balas.komentar');
    Route::get('/komentar/balas/{id}', 'KomentarController@balasIndex')->name('admin.balas.index');
    Route::prefix('/pengaturan')->group(function() {
        Route::resource('/umum', 'PengaturanUmumController');
        Route::resource('/icon', 'PengaturanIconController');
        Route::resource('/postingan', 'PengaturanPostinganController');
        Route::resource('/comment', 'PengaturanCommentController');
        Route::resource('/email', 'PengaturanEmailController');
        });
});

Route::get('install/delete', 'InstallController@index')->name('install.delete');
