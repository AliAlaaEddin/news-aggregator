<?php

use App\Services\Base\ServiceHelper;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test',function(){
//    $r = resolve(\App\Vendors\NewsAPI\Repositories\NewsAPISourceRepository::class);
//    dd($r->getAllSources());


    dd(\App\Services\Base\ServiceHelper::newAPISearchService()->search());
});

