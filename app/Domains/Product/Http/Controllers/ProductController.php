<?php

namespace App\Domains\Product\Http\Controllers;

use App\Domains\Product\Http\Resources\ProductResource;
use App\Domains\Product\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use App\Domains\Product\Http\Requests\FetchProductsRequest;

class ProductController extends Controller
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function fetch(FetchProductsRequest $request) {
        return  ProductResource::collection($this->productRepository->getProducts($request));
    }
}
