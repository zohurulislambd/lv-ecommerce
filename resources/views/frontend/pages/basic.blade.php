@extends('frontend.layouts.master')
@section('title','Home')

@section('content')
    <div class="container mrtop30">
        <div class="row">
            <div class="col-md-12">
              <div> {{config('app.name')}}</div>
{{--                if statement--}}
                <div>
                    @if($day == 'Friday')
                        Today is holyday.
                        @elseif($day == 'Saturday')
                        Today is half holyday.
                        @else
                        Today is working day.
                    @endif
                    @unless($day == 'Monday')
                        Today is work day.
                        @endunless
                </div>
                <div>
                {{--                for--}}
                {{--@for($i=0; $i<10; $i++)
                    The current value is {{$i}}
                @endfor--}}
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>php
    {{-- end side bar and content  --}}
@endsection
