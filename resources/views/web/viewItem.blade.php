@extends('layouts.layoutweb')
@section('content1')



<div class="site-section">
  <div class="container">
  

    <div class="row">
      <div class="col-lg-6">
        <p class="mb-5"><img style="max-width: 500px" src="{{asset('storage/'.$product->img.'')}}" alt="Image" class="img-fluid"></p>
      </div>


      <div class="col-lg-5 ml-auto">
      @if (session()->has('status'))
          <div class="row">
          <div class="col-lg-12">
          <span class="alert alert-success">
              {{ session()->get('status') }}
          </span>
         </div>
         </div><br/><br/>
         @endif
        <h1 class="site-section-heading mb-3">{{ $product->name }} </h1>
        <p>Price = {{ $product->price }}</p>
        <h5>Description </h5>
        <p class="mb-4">{{ $product->description }}</p>

         <h5>Specification </h5>
         <p class="mb-4">{{ $product->specification }}</p>
         <label style="font-weight: bold;" for="quantity">Quantity</label> 
         <form method="post" action="{{ url('add-to-cart') }}">
         {{csrf_field()}}
          <input type="hidden" name="product_id" value="{{ $id }}">
         <input style="width:50px; height: 50px; border-radius: 5px; text-align:center;" placeholder="1" name="quantity" type="number">
         <input type="submit" class="btn btn-info btn-lg" value="Add to Cart">
        </form>
       <hr>

          </div>

      </div>
    </div>
  </div>
</div>


    @endsection
