<?php

Route::get('/', 'FrontendController@home')->name('frontend.home');
Route::get('/post/{id}/{slug}', 'FrontendController@singlePost')->name('frontend.single.post');
Route::get('/page/{id}/{slug}', 'FrontendController@singlePage')->name('frontend.single.page');
Route::get('/category/{slug}', 'FrontendController@categoryPost')->name('frontend.category.post');
Route::post('/comment', 'FrontendController@comment')->name('frontend.comment.post');
Route::post('/balas/comment', 'FrontendController@balasComment')->name('frontend.reply.comment.post');
Route::get('/search', 'FrontendController@search');