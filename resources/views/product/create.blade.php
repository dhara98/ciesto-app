@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Product Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="Enter Product Name"
                                    class="form-control p-0 border-0" name="name"> </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Select Shop</label>
    
                                    <div class="col-sm-12 border-bottom">
                                        <select name="shop_id" class="form-select shadow-none p-0 border-0 form-control-line">
                                           @foreach($shops as $shop) 
                                           <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                           @endforeach
                                        </select>
                                        @error('shop_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Price</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" class="form-control p-0 border-0" placeholder="Price" name="price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Stock</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line" name="stock">
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Video link</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="Enter Video link" class="form-control p-0 border-0" name="video">
                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection