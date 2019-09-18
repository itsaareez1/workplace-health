@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->


@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <!-- Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{url('changeOrderStatus')}}">
                    <input id="order_id" name="order_id" value="" type="hidden">
                    <input id="status" name="status" value="" type="hidden">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Are you sure you want to change status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button onclick="$('#status').val('Reject')" type="submit" class="btn btn-danger">Reject
                        </button>
                        <button onclick="$('#status').val('Accept')" type="submit" class="btn btn-success"
                                id="delete_btn" onclick="">Accept
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Manage Orders</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Orders</li>
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

                <table class="table dataset__table table__actions">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Discount</th>
                        <th>Total</th>
                        {{--<th>Created At</th>--}}
                        {{--<th>Updated At</th>--}}
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $order)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $order->user_id }}" class="table__cell-widget-name">{{ $order->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailOrders')}}/{{ $order->id }}" class="table__cell-widget-name">{{ $order->type }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $order->user_id }}" class="table__cell-widget-name">{{ $order->user_name }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $order->user_id }}" class="table__cell-widget-name">{{ $order->address }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $order->user_id }}" class="table__cell-widget-name">{{ $order->discount }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $order->user_id }}"
                                       class="table__cell-widget-name">$<?php echo empty($order->total) ? '0' : $order->total?></a>
                                </div>
                            </td>
                            {{--<td>--}}
                                {{--<div class="table__cell-user">--}}
                                    {{--<img src="img/users/user-10.png" alt=""--}}
                                         {{--class="table__cell-user-avatar rounded-circle">--}}
                                    {{--<div class="table__cell-user-wrap">--}}
                                        {{--<a href="{{url('/wh-detailUsers')}}/{{ $order->user_id }}" class="table__cell-widget-name">{{ $order->created_at }}</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<div class="table__cell-widget">--}}
                                    {{--<span class="table__cell-widget-name">{{ $order->updated_at }}</span>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            <td class="table__label">

                                <a href="#." onclick="statusOpenModal({{$order->id}})"> <span
                                            class="badge  <?php echo $order->status == 'Accept' ? 'badge-success' : 'badge-danger' ?>">{{ $order->status }}</span></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="dataset__footer">

                {{ $results->links('vendor.pagination.custom') }}

            </div>
        </div>
    </div>

</div>
</div>


@include('web.admin.footerjs')

<script>
    function statusOpenModal(id) {
        $('#statusModal').modal('toggle');
        $('#order_id').val(id);
    }

</script>

</body>
</html>
