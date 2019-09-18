@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->


@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <!-- Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{url('new-qrcode')}}">
                    <input id="user_id" name="user_id" value="" type="hidden">
                    <input id="status" name="status" value="" type="hidden">
                    <div class="modal-header">
                        <h6 class="modal-title" id="qrModalLabel">Are you sure you want to assign QR code to this
                            user!</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Detail Orders</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Detail Orders</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Orders</div>

                </div>
            </div>
            <div class="dataset__body dataset__body--panel">

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

                <?php
                $display = '';
                if ($results->type == 'point') {
                    $display = 'none';
                }
                ?>
                <br>
                <div class="container">
                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Type</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->type }}
                        </div>
                        <div class="col-2">
                            <label><b>Status</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->status }}
                        </div>
                    </div>

                    <div class="row form-group" style="display: <?php echo $display; ?>;">
                        <div class="col-2">
                            <label><b>Name</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->name }}
                        </div>
                        <div class="col-2">
                            <label><b>Contact</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->contact }}
                        </div>
                    </div>

                    <div class="row form-group" style="display: <?php echo $display; ?>;">
                        <div class="col-2">
                            <label><b>CC Name</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->cc_name }}
                        </div>
                        <div class="col-2">
                            <label><b>Address</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->address }}
                        </div>
                    </div>


                    <div class="row form-group" style="display: <?php echo $display; ?>;">
                        <div class="col-2">
                            <label><b>Discount</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->discount }}
                        </div>
                        <div class="col-2">
                            <label><b>Shipping Charges</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->shipping_charges }}
                        </div>
                    </div>


                    <div class="row form-group" style="display: <?php echo $display; ?>;">
                        <div class="col-2">
                            <label><b>Sub Total</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->sub_total }}
                        </div>
                        <div class="col-2">
                            <label><b>Total</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->total }}
                        </div>
                    </div>
                    <br>


                    <table class="table dataset__table table__actions">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th style="display: <?php echo $display; ?>">Price</th>
                            <th style="display: <?php echo $display; ?>">Quantity</th>
                            <th>Specification</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $product_qty = explode(",", $results->product_qty);
                        $product_ids = explode(",", $results->product_id);
                        ?>
                        @foreach ($products as $product)
                            @if($product_ids[$i]==$product->id)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td style="display: <?php echo $display; ?>">{{$product->price}}</td>
                                    <td style="display: <?php echo $display; ?>">{{$product_qty[$i]}}</td>
                                    <td>{{$product->specification}}</td>
                                </tr>
                                <?php $i++ ?>
                            @endif
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
</div>


@include('web.admin.footerjs')

<script>
    function qrOpenModal(id) {
        $('#qrModal').modal('toggle');
        $('#user_id').val(id);
    }

</script>

</body>
</html>
