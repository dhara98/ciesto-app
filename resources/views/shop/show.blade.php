@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">

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
            <div class="row">
                <!-- .col -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-heading">
                            <h3 class="box-title mb-0">Shop</h3>
                        </div>
                        <div class="card-body">
                            @if($shop->image)
                                <img src="{{ '/images/'.$shop->image }}" height="200px" width="250px" alt="Shop image">
                            @endif
                        </div>
                    </div>
                </div>
                 <!-- /.col -->
                <div class="col-md-12 col-lg-8 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-body">
                            <h3 class="box-title mb-0">Shop Details</h3>
                        </div>
                        <div class="comment-widgets">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-2 mt-0">
                                <div class="comment-text ps-2 ps-md-3 w-100">
                                    <h5 class="font-medium">Name</h5>
                                    <span class="mb-3 d-block">{{ $shop->name }}</span>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-2">
                                <div class="comment-text  ps-md-3 active w-100">
                                    <h5 class="font-medium">Email</h5>
                                    <span class="mb-3 d-block">{{ $shop->email }}</span>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-2">
                                <div class="comment-text ps-2 ps-md-3 w-100">
                                    <h5 class="font-medium">Address</h5>
                                    <span class="mb-3 d-block">{{ $shop->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Product Import Export</h3>
                        </div>
                        <form action="{{ route('file-import',$shop->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4" style="max-width: 500px;">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="form-control" id="customFile">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Import data</button>
                            <a class="btn btn-success" href="{{ route('file-export',$shop->id) }}">Export data</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Products</h3>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <input type="text" class="form-control" id="min_price" placeholder="Min Price">
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <input type="text" class="form-control" id="max_price" placeholder="Max Price">
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <select class="form-select shadow-none row border-top" id="stock">
                                    <option value="">All</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap" id="products-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Shop</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Stock</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(function() {
        $('#products-table').dataTable({
            "lengthChange": false,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "stateSave": false,
            "bAutoWidth": false,
            "dom": 'lfBrtip',
            "order": [
                [0, 'desc']
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
                url: "{{ route('products.list',"$shop->id") }}",
                data: function(d) {
                    d.min_price = $('#min_price').val();
                    d.max_price = $('#max_price').val();
                    d.stock = $('#stock').val();
                }
            },
            "columns": [
                {
                    data: 'id',
                    name: 'id',
                    width: '6%'
                },
                {
                    data: 'name',
                    name: 'name',
                    width: '15%'
                },
                {
                    data: 'shop_id',
                    name: 'shop_id'
                    
                },
                {
                    data: 'price',
                    name: 'price',
                    width: '10%'
                },
                {
                    data: 'stock',
                    name: 'stock',
                    width: '10%'
                }
            ],
        });
    });

    // Filter.
    $("#min_price").change(function() {
        $('#products-table').DataTable().ajax.reload();
    });
    $("#max_price").change(function() {
        $('#products-table').DataTable().ajax.reload();
    });
    $("#stock").change(function() {
        $('#products-table').DataTable().ajax.reload();
    });
</script>
@endpush
@endsection