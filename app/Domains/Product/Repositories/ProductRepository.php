<?php


namespace App\Domains\Product\Repositories;

use App\Domains\Product\Http\Requests\FetchProductsRequest;

interface ProductRepository
{
    public function getProducts(FetchProductsRequest $request);
}