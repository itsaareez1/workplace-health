@extends('layouts.layoutweb')
@section('content1')



    <div class="site-section">
        <div class="container">


            @if (session()->has('status'))
                <div class="row">
                    <div class="col-lg-12">
                        <span class="alert alert-success">{{ session()->get('status') }}</span>
                    </div>
                </div><br/><br/>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-5"><img style="max-width: 500px" src="{{asset('storage/'.$product->img.'')}}"
                                         alt="Image" class="img-fluid"></p>
                </div>
                <div class="col-lg-5 ml-auto">


                    <h1 class="site-section-heading mb-3">{{ $product->name }} </h1>

                    <p>Points = {{ $product->points }}</p>
                    <h5>Description </h5>
                    <p class="mb-4">{{ $product->description }}</p>

                    <h5>Specification </h5>
                    <p class="mb-4">{{ $product->specification }}</p>

                    {{--<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" onclick="JSalert2();">Redeem--}}
                    {{--Now--}}
                    {{--</button>--}}

                    <form method="post" action="{{ url('radeem_now') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{ $id }}">
                        <input type="hidden" name="product_points" value="{{ $product->points }}">
                        <input type="submit" class="btn btn-info btn-lg" value="Redeem Now">
                    </form>

                    <hr>

                </div>

            </div>
        </div>
    </div>
    </div>


@endsection
