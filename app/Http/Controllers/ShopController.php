<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Http\Requests\StoreShop;
use App\Http\Requests\UpdateShop;
use App\Models\Shop;
use DataTables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::latest()->simplePaginate(5);
        return view('shop.index', compact('shops', $shops));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShop $request)
    {
        $shop = new Shop;
        $imageName = time() . '.' . $request->image->extension();
        $input = $request->all();
        $request->image->move(public_path('images'), $imageName);

        $input['image'] = $imageName;
        $shop = $shop->create($input);
        return redirect('shops')->with('success', 'Shop successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        return view('shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::where('id', $id)->first();
        return view('shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShop $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $input = $request->all();
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $input['image'] = $imageName;
        }
        if ($shop->update($input)) {
            return redirect('shops')->with('success', 'Shop successfully stored.');
        }
        return redirect('shops')->with('error', 'Something went wrong!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        if ($shop->delete()) {
            return redirect('shops')->with('success', 'Shop successfully deleted.');
        }
        return redirect('shops')->with('error', 'Something went wrong!.');
    }

    /**
     * Get all products with datatable.
     *
     * @param Request $request   [Request for get products]
     * 
     * @param Int     $shop_id   [Shop id]
     *
     * @return Response
     */
    public function getProductLists(Request $request, $shop_id)
    {
        $products = Shop::findOrFail($shop_id)->products();
        if ($request->has('min_price') && !empty($request->input('min_price'))) {
            $products->where('price', '>=', $request->input('min_price'));
        }
        if ($request->has('max_price') && !empty($request->input('max_price'))) {
            $products->where('price', '<=', $request->input('max_price'));
        }
        if ($request->has('stock') && $request->input('stock') != '') {
            $products->where('stock', '=', $request->input('stock'));
        }
        $data = $products->get();
        return Datatables::of($data)
            ->editColumn(
                'shop_id',
                function ($row) {
                    return $row->shop->name;
                }
            )
            ->make(true);
    }

    /**
     * 
     * @param Int $shop_id
     * 
     * @return \Illuminate\Support\Collection
     * 
     */
    public function fileExport($shop_id)
    {
        return Excel::download(new ProductExport($shop_id), 'products.xlsx');
    }

    /**
     * 
     * @param Request $request [Request for get products]
     * @param Int     $shop_id     
     * 
     * @return Response
     * 
     */
    public function fileImport(Request $request,$shop_id)
    {
        if($request->has('file')){
            Excel::import(new ProductImport($shop_id), $request->file('file')->store('temp'));
            return back();
        }else{
            return redirect()->back()->with('error', 'Upload File');
        }
    }
}
