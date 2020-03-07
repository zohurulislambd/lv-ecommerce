@extends('backend.layouts.master')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example
                    <a href="{{ route('addCategory') }}" class="btn btn-outline-success text-right">Add New Category</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Category Name</th>
                            <th>Parent Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $sl = 1; ?>
                        @foreach($categories as $category)
                            <tr>
                                <td class="border-left">{{ $sl++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if( $category->parent_id == NULL )
                                        Primary Category
                                        @else
                                        {{ $category->parent->name }}
                                    @endif
                                </td>
                                <td>{{ substr($category->description,0,40) }}</td>
                                <td>
                                    <img src="{{ asset("/images/").'/'.$category->image }}" width="50px"/>
                                </td>

                                <td>
                                    <a href='{{url("admin/category/$category->id/edit")}}' type="button"
                                       class="btn-warning btn-sm"> Edit </a>||
                                    <form action='{{url("admin/categories/$category->id")}}' method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure delete!!!')">Delete
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

