@extends('layouts.layoutindex')
@section('content2')


<div class="site-section">
  <div class="container">
    <div class="column">
      <strong><h2 align="center">Place Order</h2></strong>  
    </div>
    <div style="padding: 20px 20px; text-align:justify;" class="row">

        
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
      @foreach($products as $product)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{ $product->name }}</h6>
            <small class="text-muted">{{str_limit($product->description, 45, '...')}}</small>
          </div>
          <span class="text-muted">${{ $product->price }}</span>
        </li>
      @endforeach
      <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-danger">
            <h6 class="my-0">Sub Total</h6>
          </div>
          <span class="text-danger">${{ $subtotal }}</span>
        </li>
        @if (!empty($order->discount))
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>{{$coup->code}}</small>
          </div>
          <span class="text-success">-${{$order->discount}}</span>
        </li>
        @endif
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-primary">
            <h6 class="my-0">Shipping Charges</h6>
          </div>
          <span class="text-primary">+${{$shipping}}</span>
        </li>
       <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>${{$total}}</strong>
        </li>
      </ul>

      <form class="card p-2" method="post" action="{{ url('checkCoupon') }}">
      @if (session()->get('status') == "verified")
        <div class="alert alert-success">Coupon code verified.</div>
      @elseif (session()->get('status') == "unverified")
        <div class="alert alert-danger">Coupon code doesn't exist.</div>
      @endif
        <div class="input-group">
        {{csrf_field()}}

        @if (session()->get('status') == "verified" || !empty($order->discount))
          <input type="text" value="{{$coup->code}}" name="code" class="form-control" disabled>
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary" disabled>Redeem</button>
          </div>
        @else

          <input type="text" name="code" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        @endif
          
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate="">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>


        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  

    </div>



</div>



          </div>
      </div>
    </div>
  </div>
</div>


    @endsection
