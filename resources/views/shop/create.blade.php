@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" action="{{ route('shops.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Shop Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="Enter Shop Name"
                                    class="form-control p-0 border-0" name="name"> </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Image</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="file" class="form-control p-0 border-0" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Email</label>
                                <div class="col-sm-12 border-bottom">
                                    <input type="email" class="form-control p-0 border-0" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Address</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea placeholder="Address" class="form-control p-0 border-0" name="address"></textarea>
                                    @error('address')
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