<?php


namespace App\Domains\Product\Helpers;


class ProductHelper
{
    const CURRENCY = 'EUR';
    const INSURANCE_DISCOUNT = 30;
    const SKU_3_DISCOUNT = 15;

    public static function getProductDiscount($attributes){
        $discount = false;
        if ($attributes['category'] == 'insurance') {
            $discount = self::INSURANCE_DISCOUNT;
        }
        else if ($attributes->sku === '000003') {
            $discount = self::SKU_3_DISCOUNT;
        }
        return $discount;
    }

}