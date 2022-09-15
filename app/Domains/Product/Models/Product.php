<?php

namespace App\Domains\Product\Models;

use App\Domains\Product\Helpers\ProductHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected array $casts = [
        'price' => 'array',
    ];

    public function getSkuAttribute(): string {
        return str_pad($this->attributes['id'], 6, "0", STR_PAD_LEFT);
    }

    public function setPriceAttribute($value){
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute(): array {
        $price = $this->attributes['price']/100;
        $discount = ProductHelper::getProductDiscount($this);

        $final_price =  $discount ? $price * ($discount / 100) : $price;
        return [
            'original_price' => $price,
            'final_price' => $final_price,
            'discount_percentage' => $discount ? "$discount%" : null,
            'currency' => ProductHelper::CURRENCY
        ];
    }


}
