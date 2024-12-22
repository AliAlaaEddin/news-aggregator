<?php

namespace App\Vendors\Base;

use App\Vendors\Base\DTOs\CategoryDTO;
use App\Vendors\Base\DTOs\SourceDTO;

interface IBaseNewsProviderServiceInterface {

    /**
     * @return SourceDTO[]
     */
    public function getSources() : array;

    /**
     * @return CategoryDTO[]
     */
    public function getCategories() : array;

    /**
     * @return void
     */
    public function populateNewsArticles() : void;



}
