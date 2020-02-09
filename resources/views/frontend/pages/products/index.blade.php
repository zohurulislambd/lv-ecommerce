@extends('layouts.master')
@section('title','Products')

@section('content')
    <div class="container mrtop30">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.product-siderbar')
            </div>
            {{-- strat content --}}
            <div class="col-md-8">
                <div class="widget">
                    <h3>Products</h3>
                    <div class="row">
{{--                        @foreach ( $allProducts->productImages as $product )--}}
                        @foreach ( $products as $product)
                            <div class="col-md-3">
                                <div class="card">
                                    @php $i=1; @endphp

                                    @foreach($product->images as $image)
                                       @if($i > 0 )
                                            <img class="card-img-top feature_img" src="{{ asset('images/products/'.$image->image)}}" alt="Card image">
                                        @endif
                                        @php $i--; @endphp

                                    @endforeach

                                    <div class="card-body">
                                        <h4 class="card-title">{{ $product->title }}</h4>
                                        <p class="card-text">Price 5000 Taka</p>
                                        <a href="#" class="btn btn-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>  <!--row end-->
                </div>
            </div>
        </div>
    </div>
    {{-- end side bar and content  --}}
@endsection
