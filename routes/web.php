<?php

use Illuminate\Support\Facades\Route;

Route::get('site-bakimda',function(){
    return view('front.widgets.offline');
});

//back end routes
Route::prefix('admin')->middleware('isLogin')->group(function(){
    Route::get('giris','Back\Authlogin@login')->name('login');
    Route::post('giris','Back\Authlogin@loginPost')->name('loginpost');

});

//pmiddleware kontrolü yapılıyor auth var mı yok mu
Route::prefix('admin')->middleware('isAdmin')->group(function(){
    Route::get('panel','Back\Dashboard@index')->name('dashboard');
    // MAKALE ROUTE'S
    Route::get('makaleler/silinenler','Back\ArticleController@trashed')->name('trashed');
    Route::resource('makaleler','Back\ArticleController');
    Route::get('/switch/','Back\ArticleController@switch')->name('switch');
    Route::get('/deletearticle/{id}','Back\ArticleController@delete')->name('delete');
    Route::get('/harddeletearticle/{id}','Back\ArticleController@hardDelete')->name('harddelete');
    Route::get('/recoverarticle/{id}','Back\ArticleController@recover')->name('recover');
    // KATEGORİ ROUTE'S
    Route::get('/kategoriler','Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','Back\CategoryController@create')->name('category.create');
    Route::post('/kategoriler/update','Back\CategoryController@update')->name('category.update');
    Route::post('/kategoriler/delete','Back\CategoryController@delete')->name('category.delete');
    Route::get('/kategori/status','Back\CategoryController@switch')->name('category.switch');
    Route::get('/kategori/getData','Back\CategoryController@getData')->name('category.getData');

    //Config's Route's
    Route::get('/ayarlar','Back\ConfigController@index')->name('config.index');
    Route::post('/ayarlar','Back\ConfigController@update')->name('config.update');
    //
    Route::get('cikis','Back\Authlogin@logout')->name('logout');
    //PAGE ROUTE'S
    Route::get('/sayfalar','Back\PageController@index')->name('page.index');
    Route::get('/sayfa/switch/','Back\PageController@switch')->name('page.switch');
    Route::get('/sayfalar/olustur','Back\PageController@create')->name('page.create');
    Route::get('/sayfalar/guncelle/{id}','Back\PageController@update')->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}','Back\PageController@updatePost')->name('page.edit.post');
    Route::post('/sayfalar/olustur','Back\PageController@post')->name('page.post');
    Route::get('/sayfa/sil/{id}','Back\PageController@delete')->name('page.delete');
    Route::get('/sayfa/siralama','Back\PageController@orders')->name('page.orders');
});


//back end routes


//front end routes
Route::get('/', 'Front\Homepage@index')->name('homepage');
Route::get('/iletisim','Front\Homepage@contact')->name('contact');
Route::post('/iletisim','Front\Homepage@contactpost')->name('contactpost');
Route::get('/{slug}','Front\Homepage@single')->name('single');
Route::get('/kategori/{category}','Front\Homepage@category')->name('category');
Route::get('/sayfa/{url}','Front\Homepage@page')->name('page');
//front end routes



