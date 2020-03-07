@extends('backend.layouts.master')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Product Insert</li>
            </ol>
            <!-- Icon Cards-->
            <div class="container" style="width: 60%">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')  }}
                    </div>

                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action='{{url("admin/category/$category->id/edit")}}' method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name ?? '' }}" id="title">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <img src='{{asset("images/$category->image")}}' height="100px" alt="">

                    </div>

                    <div class="form-group">
                        <label for="desc">Description:</label>
                        <textarea name="description" id="desc"  class="form-control" cols="4" rows="2">{{ $category->description ?? '' }}</textarea>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>


        </div>
        <!-- /.container-fluid -->


@endsection


