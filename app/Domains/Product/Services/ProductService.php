<?php


namespace App\Domains\Product\Services;


use App\Domains\Product\Http\Requests\FetchProductsRequest;
use App\Domains\Product\Models\Product;
use App\Domains\Product\Repositories\ProductRepository;

class ProductService implements ProductRepository
{

    public function getProducts(FetchProductsRequest $request) {
        $category = $request->input('category');
        $priceRange = false;

        if ($request->has('fromPrice') || $request->has('toPrice')) {
            $fromPrice = $request->input('fromPrice') * 100;
            $toPrice = $request->input('toPrice') * 100;
            $priceRange = array($fromPrice, $toPrice);
        }

        return Product::when($category, function ($query, $category) {
            $query->whereCategory($category);
        })
            ->when($priceRange, function ($query, $priceRange) {
                $query->whereBetween('price', $priceRange);
            })
            ->get();
    }
}