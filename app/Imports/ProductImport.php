<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel,WithStartRow
{
    protected $id;

    /**
     * @return Int id
     */
    public function __construct($id)
    {
        $this->shop_id = $id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'     => $row[0],
            'shop_id'  => $this->shop_id,
            'price' => $row[2],
            'stock' => $row[3] ? '1' : '0',
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}