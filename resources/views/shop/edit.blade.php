@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($shop, ['route' => ['shops.update', $shop->id], 'method' => 'PUT', 'files' => true]) }}
                        <form class="form-horizontal form-material" method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                {{ Form::label('name','Shop Name', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::text('name', null, ['class' => 'form-control p-0 border-0', 'placeholder' => 'Enter Shop Name']) }}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                {{ Form::label('image','Image', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::file('image', null, ['class' => 'form-control p-0 border-0']) }}
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if($shop->image)
                                    <img class="pull-right" src="/images/{{$shop->image}}" height="40px" width="40px">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                {{ Form::label('email','Email', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::text('email', null, ['class' => 'form-control p-0 border-0', 'placeholder' => 'Email']) }}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                {{ Form::label('address','Address', ['class' => 'col-md-12 p-0']) }}
                                <div class="col-md-12 border-bottom p-0">
                                    {{ Form::textarea('address', null, ['class' => 'form-control p-0 border-0', 'placeholder' => 'Enter Address','rows' => '2']) }}
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                {{ Form::submit('Update', ['class' => 'btn btn-success mb-0']) }}
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