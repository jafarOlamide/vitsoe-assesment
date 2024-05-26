<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_are_stored_in_db(): void
    {
        Product::factory()->count(10)->create();

        $this->assertDatabaseCount('products', 10);
    }
}
