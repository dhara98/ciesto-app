<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    protected $id;

    /**
     *
     * @param Int $id
     *
     * @return Int
     */
    public function __construct($id)
    {
        $this->shop_id = $id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::where('shop_id', $this->shop_id)->get(['name', 'shop_id', 'price', 'stock']);
    }

    /**
     *
     * @return Headings
     *
     */
    public function headings(): array
    {
        return ["Name", "Shop", "Price", "Stock"];
    }

    /**
     *
     * @param String $product
     *
     * @return Array
     *
     */
    public function map($product): array
    {
        return [
            $product->name,
            $product->shop->name,
            $product->price,
            '' => $product->stock ? 'Available' : 'Not Available',
        ];
    }
}
