@extends('frontend.layouts/master')

@section('title')
Contact Us
@endsection

 @section('content')
  <div class="container">

<h2>Contact page</h2>
<form action="">
    Name:<input type="text" name="name"> <br> <br>
    Email<input type="email" name="email"> <br> <br>
    <input type="submit" value="Submit">
</form></div>
@endsection
