@extends('layouts.layoutindex')
@section('content2')
    <?php
    $cart_id = 0;
    $currency = 'SGD';
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- braintree -->
    <script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

    <!-- setting up braintree -->
    <script>
        $.ajax({
            // url: "token.php",
            url: "{{url('/token')}}",
            type: "get",
            dataType: "json",
            success: function (data) {
                braintree.setup(data, 'dropin', {container: 'dropin-container'});
            }
        })
    </script>

    <div class="site-section">
        <div class="container">

            @if (session()->has('status'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert action-alert action-alert--danger alert-success has-btn" role="alert">
                            <span class="action-alert__message">
                              <span class="action-alert__action-message">{{ session()->get('status') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert action-alert action-alert--danger alert-danger has-btn" role="alert">
                            <span class="action-alert__message">
                              <span class="action-alert__action-message">{{ session()->get('error') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endif


            <div class="column">
                <strong><h2 align="center">Place Order</h2></strong>
            </div>
            <div style="padding: 20px 20px; text-align:justify;" class="row">

                <div class="col-md-4 order-md-2 mb-4">
                    @if (isset($order))
                        <ul class="list-group mb-3">
                            @foreach($products as $product)
                                <?php
                                $cart_id = $product->cart_id;
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $product->name }}</h6>
                                        <small class="text-muted"><?php echo $currency; ?> {{ $product->price }}</small>
                                    </div>
                                    <span class="text-muted">
                                    <input
                                            onchange="changeQuantity({{ $product->cart_id }})"
                                            type="number"
                                            id="qty"
                                            name="qty[]"
                                            class="form-control"
                                            style="padding-left: 5px; height: auto; width: 60px; border: 2px solid lightgrey"
                                            value="{{ $product->quantity }}">
                                    </span>
                                    <button onclick="deleteCart({{ $product->cart_id }})" type="button" style="position: absolute; right: 5px;
                                                            font-size: 15px;
                                                            font-weight: bold;
                                                            color: red;
                                                            top: 0px;">X
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill"><?php echo count($products)?></span>
                        </h4>

                        <ul class="list-group mb-3">
                            @foreach($products as $product)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $product->name }}</h6>
                                        <small class="text-muted">{{str_limit($product->description, 45, '...')}}</small>
                                    </div>
                                    <span class="text-muted"><?php echo $currency; ?> {{ $product->price }}
                                        * {{ $product->quantity }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-danger">
                                    <h6 class="my-0">Sub Total</h6>
                                </div>
                                <span class="text-danger"><?php echo $currency; ?> {{ $subtotal }}</span>
                            </li>
                            @if (isset($order) && !empty($order->discount))
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div class="text-success">
                                        <h6 class="my-0">Promo code</h6>
                                        @if (!empty($coup))
                                            <small>{{$coup->code}}</small>
                                        @else
                                            <small>XXXX</small>
                                        @endif
                                    </div>
                                    <span class="text-success">-${{$order->discount}}</span>
                                </li>
                            @endif
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-primary">
                                    <h6 class="my-0">Shipping Charges</h6>
                                </div>
                                <span class="text-primary">+<?php echo $currency; ?> {{$shipping}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (<?php echo $currency; ?>)</span>
                                <strong><?php echo $currency; ?> {{$total}}</strong>
                            </li>
                        </ul>

                    @else
                        <div class="alert alert-danger">
                            You dont have more cart product for order!
                        </div>
                    @endif

                    <form class="card p-2" method="post" action="{{ url('checkCoupon') }}">
                        <?php
                        //                        print_r($product_ids);
                        //                        print_r(explode(",", $product_ids));
                        $product_ids = explode(",", $product_ids);
                        for ($i = 0; $i < count($product_ids); $i++) {
//                            echo $product_ids[$i];
                            echo '<input type="hidden" value="' . $product_ids[$i] . '" name="product_ids[]">';

                        }
                        ?>
                        @if (session()->get('status') == "verified")
                            <div class="alert alert-success">Coupon code verified.</div>
                        @elseif (session()->get('status') == "unverified")
                            <div class="alert alert-danger">Coupon code doesn't exist.</div>
                        @endif
                        <div class="input-group">
                            {{csrf_field()}}

                            @if (session()->get('status') == "verified" || (isset($order) && !empty($order->discount)))
                                @if(!empty($coup))
                                    <input type="text" value="{{$coup->code}}" name="code" class="form-control"
                                           disabled>
                                @else
                                    <input type="text" value="XXXXXX" name="code" class="form-control" disabled>
                                @endif
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

                    {{--postOrder--}}
                    <form action="{{url('pay_now')}}" method="post">

                        @foreach($products as $product)
                            <input type="hidden" name="qty[]" value="{{ $product->quantity }}">
                        @endforeach


                        <?php
                        //                        print_r($product_ids);
                        //                        print_r(explode(",", $product_ids));
                        //                        $product_ids = explode(",", $product_ids);
                        for ($i = 0; $i < count($product_ids); $i++) {
                            echo '<input type="hidden" value="' . $product_ids[$i] . '" name="product_ids[]">';

                        }
                        ?>

                        <h4 class="mb-3">Shipping Information</h4>
                        <hr class="mb-4">
                        {{--<form class="needs-validation" novalidate="" action="{{url('postOrder')}}" method="post">--}}
                        <input type="hidden" value="<?php echo isset($order) ? $order->id : 0 ?>"
                               name="order_id">
                        <input type="hidden" value="{{$subtotal}}" name="sub_total">
                        <input type="hidden" value="{{$shipping}}" name="shipping_charges">
                        <input type="hidden"
                               value="<?php echo isset($order) && !empty($order->discount) ? $order->discount : 0 ?>"
                               name="discount">
                        <input type="hidden" value="{{$total}}" name="total">
                        <input type="hidden" value="{{$cart_id}}" name="cart_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder=""
                                       value=""
                                       required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                       placeholder=""
                                       value=""
                                       required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="1234 Main St" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <br><br>

                        {{--<form action="{{url('pay_now')}}" method="post" class="payment-form">--}}
                        <input type="hidden" name="amount" id="amount" value="{{$total}}">
                        <h4 class="mb-3"><b>Billing Information (Paypal)</b></h4>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                       placeholder=""
                                       required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                       placeholder=""
                                       required="">
                                <small class="text-muted">Full name as displayed on card</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div id="dropin-container"></div>
                                {{--<br>--}}
                                {{--<button type="submit" class="btn btn-primary">Pay Now with BrainTree</button>--}}
                            </div>
                        </div>
                        {{--</form>--}}


                        {{--<hr class="mb-4">--}}
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout
                        </button>
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
<script>
    function changeQuantity(cart_id) {
        console.log('changeQuantity');
        console.log('cart_id: ' + cart_id);
        var quantity = $('#qty').val();
        console.log('quantity: ' + quantity);

        $.ajax({
            type: "get",
            data: {
                "cart_id": cart_id,
                "quantity": quantity
            },
            url: "{{ route('changeQuantity') }}",
            beforeSend: function () {
            },
            success: function (data) {
                console.log(data);
                location.reload();
            }
        });
    }

    function pay_now() {
        var amount = $('#amount').val();
        var cc_name = $('#cc_name').val();
        var credit_card_number = $('#credit-card-number').val();
        var expiration = $('#expiration').val();
        console.log('amount: ' + amount);
        console.log('cc_name: ' + cc_name);
        console.log('credit_card_number: ' + credit_card_number);
        console.log('expiration: ' + expiration);

        {{--$.ajax({--}}
        {{--type: "get",--}}
        {{--data: {--}}
        {{--"cart_id": cart_id,--}}
        {{--"quantity": quantity--}}
        {{--},--}}
        {{--url: "{{ route('changeQuantity') }}",--}}
        {{--beforeSend: function () {--}}
        {{--},--}}
        {{--success: function (data) {--}}
        {{--console.log(data);--}}
        {{--location.reload();--}}
        {{--}--}}
        {{--});--}}
    }

    function deleteCart(cart_id) {

        $.ajax({
            type: "get",
            data: {
                "cart_id": cart_id
            },
            url: "{{ route('deleteCart') }}",
            beforeSend: function () {
            },
            success: function (data) {
                console.log(data);
                location.reload();
            }
        });
    }
</script>