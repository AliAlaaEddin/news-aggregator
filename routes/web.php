<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test',function(){
//    $r = resolve(\App\Vendors\NewsAPI\Repositories\NewsAPISourceRepository::class);
//    dd($r->getAllSources());

//    $s = resolve(\App\Vendors\NewsAPI\Services\NewsAPISourceService::class);
//    dd($s->getNewsAPISources());
//    dd('test');

    dd(\App\Services\Base\ServiceHelper::newAPISearchService()->search());
});
