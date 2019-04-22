@extends('layouts.layoutweb')
@section('content1')



<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="mb-5"><img src="web/images/ss1.jpg" alt="Image" class="img-fluid"></p>
      </div>



      <div class="col-lg-5 ml-auto">
        <h1 class="site-section-heading mb-3">Bag </h1>
        <p>Price = $50 </p>
        <h5>Description </h5>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam.</p>

         <h5>Specification </h5>
         <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam.</p>
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
