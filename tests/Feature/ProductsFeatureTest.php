<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_endpoint_returns_success(): void
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
    }

    public function test_products_endpoint_returns_json(): void
    {
        Product::factory()->count(10)->create();

        $response = $this->get(route('products.index'));

        $data = [
            'data' => [
                '0' => [
                    'id',
                    'name',
                    'code',
                    'internal_notes',
                ],
            ],
        ];
        $response->assertJsonStructure($data);
    }
}
