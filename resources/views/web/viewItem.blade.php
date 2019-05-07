@extends('layouts.layoutweb')
@section('content1')



<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="mb-5"><img style="max-width: 500px" src="{{asset('storage/'.$product->img.'')}}" alt="Image" class="img-fluid"></p>
      </div>



      <div class="col-lg-5 ml-auto">
        <h1 class="site-section-heading mb-3">{{ $product->name }} </h1>
        <p>Price = {{ $product->price }}</p>
        <h5>Description </h5>
        <p class="mb-4">{{ $product->description }}</p>

         <h5>Specification </h5>
         <p class="mb-4">{{ $product->specification }}</p>
         <label style="font-weight: bold;" for="quantity">Quantity</label> 
         <input style="width:50px; height: 50px; border-radius: 5px; text-align:center;" value="1" id="quantity" type="number">
         <button type="button" class="btn btn-info btn-lg">Add to Cart</button>

       <hr>

          </div>

      </div>
    </div>
  </div>
</div>


    @endsection
