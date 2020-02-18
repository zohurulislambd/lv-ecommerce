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
                <form action="" method="post" enctype="multipart/form-data">
                    {{--                       {{csrf_field()}}--}}
                    @csrf
{{--                    {{ csrf_field('PATCH') }}--}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $productItem->title }}" id="title">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control"  value="{{ old('price') }}" id="price">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control"  value="{{ old('quantity') }}" id="quantity">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" class="form-control"  value="{{ old('image') }}" id="quantity">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description:</label>
                        <textarea name="description" id="desc" value="{{old('description')}}" class="form-control" cols="4" rows="2"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>


        </div>
        <!-- /.container-fluid -->


@endsection


