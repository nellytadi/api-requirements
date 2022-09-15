<?php

namespace Tests\Feature;

use App\Domains\Product\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetchingProductsReturnsCorrectResultAfterApplyingCategoryFilters()
    {
        //GIVEN
        Product::factory()->count(3)->create([
            'category' => 'vehicle'
        ]);
        Product::factory()->count(3)->create([
            'category' => 'insurance'
        ]);

        //WHEN
        $response = $this->get('/api/product/fetch?category=insurance');

        //THEN
        $response->assertJson(fn (AssertableJson $json) => $json->has(3));
    }
    public function test_fetchingProductsReturnsCorrectResultAfterApplyingPriceFilters()
    {
        //GIVEN
        Product::factory()->count(3)->create([
            'price' => $this->faker->numberBetween(5000,10000)
        ]);
        Product::factory()->count(3)->create([
            'price' => $this->faker->numberBetween(1000,2000)
        ]);

        //WHEN
        $response = $this->get('/api/product/fetch?fromPrice=1000&toPrice=2000');

        //THEN
        $response->assertJson(fn (AssertableJson $json) => $json->has(3));
    }
}
