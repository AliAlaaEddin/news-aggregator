<?php

use App\Definitions\BaseDefinition;
use App\Services\Base\ServiceHelper;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test',function(){

    $articles = ServiceHelper::newsProvidersManager()->getArticles(now()->subHour()->startOfHour(),now()->subHour()->endOfHour());

    foreach($articles as $article){

        $source = ServiceHelper::sourceService()->getSourceByRemoteID($article->provider, $article->sourceRemoteID);

        $authorIDs = [];
        foreach($article->authors as $author){
            $authorDBObject = ServiceHelper::authorService()->getOrCreateAuthor($article->provider,$author->name,$author->remoteID,$author->bio,$author->imageURL);
            $authorIDs [] = $authorDBObject[BaseDefinition::ID];
        }

        $category = ServiceHelper::categoryService()->getCategoryByRemoteID($article->provider, $article->categoryRemoteID);
        ServiceHelper::articleService()->addArticle(
            $article->provider,
            $article->title,
            $article->content,
            $article->url,
            $article->publishedAt,
            $source[BaseDefinition::ID],
            $category[BaseDefinition::ID],
            $authorIDs
        );
    }
});

