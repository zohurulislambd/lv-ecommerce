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
                                <td>{{ $data->quantity }} </td>
                                <td>{{ substr($data->description,0,40) }}</td>
                                <td>
                                    {{-- for multiple image --}}
                                    @foreach($data->productPhotos as $img)
                                        <img src="{{ asset("/images/").'/'.$img->image }}" width="50px"/>
                                    @endforeach
                                </td>

                                <td>
                                    <a href='{{url("admin/product/$data->id/edit")}}' type="button"
                                       class="btn-warning btn-sm"> Edit </a>||
                                    <form action='{{url("admin/product/$data->id")}}' method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('Are you sure delete!!!')">Delete
                                        </button>
                                    </form>
                                </td>
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

