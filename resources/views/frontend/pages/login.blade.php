@extends('frontend.layouts.master')
@section('title','Login')
@section('content')
    <div class="container">
        <div class="col-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-{{session('type')}}">
                    {{ session('message') }}
                </div>

            @endif
                <br>
            <form action="{{ route('signin') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="col-4"></div>

    </div>

@endsection
