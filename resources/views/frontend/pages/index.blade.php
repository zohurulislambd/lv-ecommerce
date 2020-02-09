@extends('frontend.layouts.master')
@section('title','Home')

@section('content')
      <div class="container mrtop30">
       <div class="row">
             <div class="col-md-4">
                @include('frontend.partials.product-siderbar')
              </div>
              {{-- strat content --}}
              <div class="col-md-8">
                 <div class="widget">
                    <h3>Featured Products</h3>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="card">
                        <img class="card-img-top feature_img" src="{{ asset('images/products/'.'samsung9.jpg')}}" alt="Card image">
                          <div class="card-body">
                            <h4 class="card-title">Samsung S9</h4>
                            <p class="card-text">Price 5000 Taka</p>
                            <a href="#" class="btn btn-primary">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card">
                        <img class="card-img-top feature_img" src="{{ asset('images/products/'.'samsung9.jpg')}}" alt="Card image">
                          <div class="card-body">
                            <h4 class="card-title">Samsung S9</h4>
                            <p class="card-text">Price 5000 Taka</p>
                            <a href="#" class="btn btn-primary">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card">
                        <img class="card-img-top feature_img" src="{{ asset('images/products/'.'samsung9.jpg')}}" alt="Card image">
                          <div class="card-body">
                            <h4 class="card-title">Samsung S9</h4>
                            <p class="card-text">Price 5000 Taka</p>
                            <a href="#" class="btn btn-primary">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card">
                        <img class="card-img-top feature_img" src="{{ asset('images/products/'.'samsung9.jpg')}}" alt="Card image">
                          <div class="card-body">
                            <h4 class="card-title">Samsung S9</h4>
                            <p class="card-text">Price 5000 Taka</p>
                            <a href="#" class="btn btn-primary">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                    </div>  <!--row end-->
                 </div>
              </div>
       </div>
      </div>
    {{-- end side bar and content  --}}
@endsection
