@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="white-box">
                <h3 class="box-title">Products</h3>
                <div class="box-tool text-end">
                    <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"><i class="fa fa-plus"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Shop</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->shop->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                <a href="{{ route('products.edit', $product->id ) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        {{ $products->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    