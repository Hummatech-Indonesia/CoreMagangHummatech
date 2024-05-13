<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductInterface $product;
    private ProductService $service;
    private DivisionInterface $division;
    public function __construct(ProductInterface $product ,ProductService $service, DivisionInterface $division)
    {
        $this->product = $product;
        $this->service = $service;
        $this->division = $division;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $product = $this->product->get();
        $products = $this->product->search($request)->paginate(8);
        $divisions = $this->division->get();

        return view('admin.page.product.index', compact('products','divisions'));
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
        $data = $this->service->store($request);
        $this->product->store($data);
        return back()->with('success' , 'Berhasil Menambahkan data');
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
        $divisions = $this->division->get();
        return view('admin.page.product.edit', compact('product', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $this->service->update($product, $request);
        $this->product->update($product->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->service->delete($product);
        $this->product->delete($product->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
