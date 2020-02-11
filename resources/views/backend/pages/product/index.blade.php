@extends('backend.layouts.master')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example
                   <a href="{{ route('addProduct') }}" class="btn btn-outline-success text-right">Add New Product</a>
{{--                    <div class="text-right"><button class="btn btn-outline-success"></button>--}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                           <tbody>

                            <?php $sl = 1; ?>
                            @foreach($allProductItms as $data)
                            <tr>
                                <td class="border-left">{{ $sl++ }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->description }}</td>
                                <td><img src="<?php echo asset('public/uploads.'.$data->image) ?>" width="50px"></img></td>
                                <td><a type="button" class="btn-warning btn-sm" href="#">Edit</a> || <a type="button" class="btn-danger btn-sm" href="#">Delete</a></td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
    </div>
@endsection

