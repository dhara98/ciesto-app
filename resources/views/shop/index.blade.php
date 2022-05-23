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
                <h3 class="box-title">Shops</h3>
                <div class="box-tool text-end">
                    <a class="btn btn-success btn-sm" href="{{ route('shops.create') }}"><i class="fa fa-plus"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($shops as $shop)
                            <tr>
                                <td>{{ $shop->name }}</td>
                                <td>@if($shop->image) 
                                    <img src="{{ 'images/'.$shop->image }}" height="40px" width="40px" alt="image">
                                    @endif
                                </td>
                                <td>{{ $shop->email }}</td>
                                <td>{{ $shop->address }}</td>
                                <td>
                                    <a href="{{ route('shops.edit', $shop->id ) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('shops.show', $shop->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <form action="{{ route('shops.destroy', $shop->id) }}" method="POST" class="d-inline-block">
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
                        {{ $shops->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    