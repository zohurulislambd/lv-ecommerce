@extends('frontend.layouts.master')
@section('title','signup')
@section('content')
    <div class="container">
        <div class="col-8"><br>
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
            <form action="{{ route('registration') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" value="{{old('full_name')}}" class="form-control"
                           placeholder="Enter full name" id="full_name">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control"
                           placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="phone-number">Phone Number</label>
                    <input type="number" name="phone_number" value="{{old('phone_number')}}" class="form-control"
                           placeholder="phone-number" id="phone-number">
                </div>

                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control"
                           placeholder="Enter password" id="pwd">
                </div>
                <div class="form-group">
                    <label for="confirm_pwd">Confirm Password:</label>
                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"
                           class="form-control" placeholder="Re-Type password" id="confirm_pwd">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-4"></div>

    </div>

@endsection
