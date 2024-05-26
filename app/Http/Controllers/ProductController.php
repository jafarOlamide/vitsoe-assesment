<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Query Filter from request object
        $filter_query = $request->query('q');
        $page_size = $request->query('size') ?? 50;

        if ($filter_query) {
            // $products = DB::table('products')
            //     ->where('name', 'like', '%' . $filter_query . '%')
            //     ->orWhere('code', 'like', '%' . $filter_query . '%')
            //     ->orderBy('code', 'DESC')
            //     ->get(10);
            $products = Product::query()->where(function ($query) use ($filter_query) {
                $query->where('name', 'like', '%' . $filter_query . '%')
                    ->orWhere('code', 'like', '%' . $filter_query . '%')
                    ->orderBy('code', 'DESC');
            })->paginate($page_size);
        } else {
            $products = Product::orderBy('code', 'DESC')->paginate($page_size);
        }

        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
