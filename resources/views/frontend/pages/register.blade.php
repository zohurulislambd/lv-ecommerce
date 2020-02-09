@extends('frontend.layouts.master')
@section('title','Registration')
@section('content')
<div class="container">
   <div class="col-8">
       <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
           @csrf
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
            <div class="alert alert-success">
                {{session('message')}}
            </div>
           @endif

           <div class="form-group">
               <label for="email">Email address:</label>
               <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter email" id="email">
           </div>
           <div class="form-group">
               <label for="pwd">Password:</label>
               <input type="password" name="password" value="{{old('passwordss')}}" class="form-control" placeholder="Enter password" id="pwd">
           </div>
           <div class="form-group">
               <label for="file">file upload:</label>
               <input type="file" name="photo" class="form-control" placeholder="Upload photo" id="photo">
           </div>
           <div class="form-group form-check">
               <label class="form-check-label">
                   <input class="form-check-input" type="checkbox"> Remember me
               </label>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
   </div>
   <div class="col-4"></div>

</div>

@endsection
