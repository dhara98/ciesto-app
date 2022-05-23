@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) }}
                        <form class="form-horizontal form-material" method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                {{ Form::label('name','Product Name', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::text('name', null, ['class' => 'form-control p-0 border-0', 'placeholder' => 'Enter Product Name']) }}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                {{ Form::label('name','Select Shop', ['class' => 'col-md-12']) }}
                                <div class="col-sm-12 border-bottom">
                                {{ Form::select('shop_id', $shops, null, ['class' => 'form-select shadow-none p-0 border-0']) }}
                                    @error('shop_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                {{ Form::label('price','Price', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::number('price', null, ['class' => 'form-control p-0 border-0', 'placeholder' => 'Price']) }}
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                            {{ Form::label('stock','Stock', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::select('stock', ['1' => 'Available', '0' => 'Not available'], null, ['class' => 'form-select shadow-none p-0 border-0']) }}
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                {{ Form::label('video','Video link', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::text('video', null, ['class' => 'form-control p-0 border-0', 'placeholder' => 'Enter Video link']) }}
                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                {{ Form::submit('update', ['class' => 'btn btn-success mb-0']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection