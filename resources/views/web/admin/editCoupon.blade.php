@include('web.admin.head')
<body class="js-loading "> <!-- Edit for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
            <div class="container-header">
                <h2 class="container-heading">Edit Discount Coupon</h2>
            </div>
            <div class="form-wizard-a__body">
                <div class="form-wizard-a__content">
                    <div class="form-wizard-a__step-content is-current" data-step-content="1">
                        <h3 class="form-wizard-a__step-content-heading">
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Coupon</span>
                            Information
                        </h3>
                        @if (session()->has('status'))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert action-alert action-alert--success has-btn" role="alert">
              <span class="action-alert__message">
              <span class="action-alert__action-message">{{ session()->get('status') }}</a>
            </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-lg-4">
                                <form class="form-wizard__step-form" method="POST" action="{{ url('updateCoupon') }}">
                                    <div class="form-group">
                                        <input name="update_id" type="hidden" value="{{$coupons_detail->id}}">
                                        <label for="username">Coupon Title</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="title" type="text"
                                                   value="{{$coupons_detail->title}}"
                                                   placeholder="Write short title for coupon here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('title'))
                                        <span style="color: red">{{ $errors->first('title') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="code">Coupon Code</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="code" type="text"
                                                   value="{{$coupons_detail->code}}"
                                                   placeholder="Write code title for coupon here!">
                                            <span class="input-icon ua-icon-lock-outline"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('code'))
                                        <span style="color: red">{{ $errors->first('code') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="code">Coupon Worth ($)</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="price" type="text"
                                                   value="{{$coupons_detail->price}}"
                                                   placeholder="Value of coupon">
                                            <span class="input-icon ua-icon-lock-outline"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('price'))
                                        <span style="color: red">{{ $errors->first('price') }}</span>
                                        <br/><br/>
                                    @endif


                                    <div class="form-group">
                                        <label for="product">Select Product</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select id="product_id" name="product">
                                                <option value="0">Select All!</option>
                                                @foreach ($products as $product)
                                                    <option
                                                        <?php echo $coupons_detail->product == $product->id ? 'selected' : '' ?> value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->first('product'))
                                        <span style="color: red">{{ $errors->first('product') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="points">Points</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="points" type="text"
                                                   value="<?php echo $coupons_detail->points ?>"
                                                   placeholder="Write points for coupon here!">
                                            <span class="input-icon ua-icon-lock-outline"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('points'))
                                        <span style="color: red">{{ $errors->first('points') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="state">Select State</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select id="state" name="state">
                                                <option disabled selected>Set Coupon State!</option>
                                                <option
                                                    <?php echo $coupons_detail->state == 1 ? 'selected' : '' ?> value="1">
                                                    Available
                                                </option>
                                                <option
                                                    <?php echo $coupons_detail->state == 2 ? 'selected' : '' ?> value="2">
                                                    Expired
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->first('state'))
                                        <span style="color: red">{{ $errors->first('state') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <input type="submit" value="Update Now!" class="btn-primary btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


@include('web.admin.footerjs')

<script src="{{asset('admin/js/form-wizard/form-wizard.js')}}"></script>
<script src="{{asset('admin/js/preview/form-wizard-a.min.js')}}"></script>


</body>
</html>
