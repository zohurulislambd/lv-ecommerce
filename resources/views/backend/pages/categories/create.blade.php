@extends('backend.layouts.master')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add New Category</li>
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
                <form action="{{url('/admin/categories/store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="title">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}" id="quantity">
                    </div>

                    <div class="form-group">
                        <label for="parent">Parent Category</label>
                        <select name="parent_id" id="parent">
                            <option value="{{ 0 }}">Select Category</option>
                            @foreach($main_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description:</label>
                        <textarea name="description" id="desc" value="{{old('description')}}" class="form-control"
                                  cols="4" rows="2"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>


        </div>
        <!-- /.container-fluid -->


@endsection

