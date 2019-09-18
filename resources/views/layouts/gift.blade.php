<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="site-section-heading text-center">Loyalty programme</h2>
        </div>
    </div>
    @if (session()->has('status'))
        <div class="row">
            <div class="col-lg-12">
                <span class="alert alert-success">{{ session()->get('status') }}</span>
            </div>
        </div><br/><br/>
    @endif

    <div class="row">

        <?php
        $user_id = 0;
        if (session()->has('usr_id')) {
            $user_id = session()->get('usr_id');
        }
        ?>
        @if(isset($products) && count($products)>0)
            @foreach($products as $row)

                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <img style="max-height: 200px; min-height:200px" src="{{asset('storage/'.$row->img.'')}}"
                             alt="Image" class="img-fluid">
                        <hr>
                        <h2 class="h5">{{ $row->name }}</h2>
                        <p>{{ str_limit($row->description, 50, '...') }}</p>
                        <p>Points = {{ $row->points }}</p>
                        <p><a href="{{url('viewGift').'/'.$row->id}}" class="btn btn-primary text-white px-4"><span
                                        class="caption">View</span></a></p>
                    </div>
                </div>

            @endforeach
        @endif


        @if(isset($coupons) && count($coupons)>0)
            @foreach($coupons as $row)

                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <img style="max-height: 200px; min-height:200px" src="{{asset('storage/'.$row->img.'')}}"
                             alt="Image" class="img-fluid">
                        <hr>
                        <h2 class="h5">Coupon Code</h2>
                        <h2 class="h5">{{ $row->product_name }}</h2>
                        <p>{{ str_limit($row->title, 50, '...') }}</p>
                        <p>Points = {{ $row->points }}</p>
                        {{--<p><a href="#." class="btn btn-primary text-white px-4"><span--}}
                        {{--class="caption">Redeem Now</span></a></p>--}}

                        <form method="post" action="{{ url('radeem_now_coupon') }}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="product_name" value="{{ $row->product_name }}">
                            <input type="hidden" name="code" value="{{ $row->code }}">
                            <input type="hidden" name="product_points" value="{{ $row->points }}">
                            <input type="submit" class="btn btn-info btn-lg" value="Redeem Now">
                        </form>
                    </div>
                </div>

            @endforeach
        @endif


        @if(isset($vouchers) && count($vouchers)>0)
            @foreach($vouchers as $row)

                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <img style="max-height: 200px; min-height:200px" src="{{asset('storage/'.$row->img.'')}}"
                             alt="Image" class="img-fluid">
                        <hr>
                        <h2 class="h5">Vouchers</h2>
                        <h2 class="h5">{{ $row->title }}</h2>
                        <p>{{ str_limit($row->description, 50, '...') }}</p>
                        <p>Points = {{ $row->points }}</p>
                        {{--<p><a href="#." class="btn btn-primary text-white px-4"><span--}}
                        {{--class="caption">Redeem Now</span></a></p>--}}

                        <form method="post" action="{{ url('radeem_now_voucher') }}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="product_name" value="{{ $row->title }}">
                            <input type="hidden" name="code" value="{{ $row->code }}">
                            <input type="hidden" name="product_points" value="{{ $row->points }}">
                            <input type="submit" class="btn btn-info btn-lg" value="Redeem Now">
                        </form>
                    </div>
                </div>

            @endforeach
        @endif


        {{--<div class="col-md-4 text-center mb-4">--}}
        {{--<div class="border p-4 text-with-icon">--}}
        {{--<img src="{{asset('/web/images/s1.jpg')}}" alt="Image" class="img-fluid">--}}
        {{--<hr>--}}
        {{--<h2 class="h5">Bag</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente libero</p>--}}
        {{--<p>Points = 50</p>--}}
        {{--<p><a href="{{url('viewGift')}}" class="btn btn-primary text-white px-4"><span--}}
        {{--class="caption">Redeem</span></a></p>--}}
        {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-4 text-center mb-4">--}}
        {{--<div class="border p-4 text-with-icon">--}}
        {{--<img src="{{asset('/web/images/s1.jpg')}}" alt="Image" class="img-fluid">--}}
        {{--<hr>--}}
        {{--<h2 class="h5">Bag</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente libero</p>--}}
        {{--<p>Points = 50</p>--}}
        {{--<p><a href="{{url('viewGift')}}" class="btn btn-primary text-white px-4"><span--}}
        {{--class="caption">Redeem</span></a></p>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-4 text-center mb-4">--}}
        {{--<div class="border p-4 text-with-icon">--}}
        {{--<img src="{{asset('/web/images/s1.jpg')}}" alt="Image" class="img-fluid">--}}
        {{--<hr>--}}
        {{--<h2 class="h5">Bag</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente libero</p>--}}
        {{--<p>Points = 50</p>--}}
        {{--<p><a href="{{url('viewGift')}}" class="btn btn-primary text-white px-4"><span--}}
        {{--class="caption">Redeem</span></a></p>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-4 text-center mb-4">--}}
        {{--<div class="border p-4 text-with-icon">--}}
        {{--<img src="{{asset('/web/images/s1.jpg')}}" alt="Image" class="img-fluid">--}}
        {{--<hr>--}}
        {{--<h2 class="h5">Bag</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente libero</p>--}}
        {{--<p>Points = 50</p>--}}
        {{--<p><a href="{{url('viewGift')}}" class="btn btn-primary text-white px-4"><span--}}
        {{--class="caption">Redeem</span></a></p>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-4 text-center mb-4">--}}
        {{--<div class="border p-4 text-with-icon">--}}
        {{--<img src="{{asset('/web/images/s1.jpg')}}" alt="Image" class="img-fluid">--}}
        {{--<hr>--}}
        {{--<h2 class="h5">Bag</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente libero</p>--}}
        {{--<p>Points = 50</p>--}}
        {{--<p><a href="{{url('viewGift')}}" class="btn btn-primary text-white px-4"><span--}}
        {{--class="caption">Redeem</span></a></p>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-md-4 text-center mb-4">--}}
        {{--<div class="border p-4 text-with-icon">--}}
        {{--<img src="{{asset('/web/images/s1.jpg')}}" alt="Image" class="img-fluid">--}}
        {{--<hr>--}}
        {{--<h2 class="h5">Bag</h2>--}}
        {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente libero</p>--}}
        {{--<p>Points = 50</p>--}}
        {{--<p><a href="{{url('viewGift')}}" class="btn btn-primary text-white px-4"><span--}}
        {{--class="caption">Redeem</span></a></p>--}}
        {{--</div>--}}
        {{--</div>--}}


    </div>
</div>
