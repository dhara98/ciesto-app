<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->simplePaginate(5);
        return view('product.index', compact('products', $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view('product.create', compact('shops', $shops));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProduct $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product;
        $input = $request->all();
        $product = $product->create($input);
        return redirect('products')->with('success', 'Product successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $shops = Shop::pluck('name', 'id')->all();

        return view('product.edit', compact('product', 'shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        if ($product->update($input)) {
            return redirect('products')->with('success', 'Product successfully updated.');
        }
        return redirect('products')->with('error', 'Something went wrong!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return redirect('products')->with('success', 'Product successfully deleted.');
        }
        return redirect('products')->with('error', 'Something went wrong!.');
    }
}
