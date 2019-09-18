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
                <h2 class="page-content__header-heading">Manage Users</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Users</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Users</div>

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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Loyalty Points</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        {{--<th>QR CODE</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $user)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $user->id }}" class="table__cell-widget-name">{{ $user->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $user->id }}" class="table__cell-widget-name">{{ $user->name }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $user->id }}" class="table__cell-widget-name">{{ $user->email }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="{{url('/wh-detailUsers')}}/{{ $user->id }}"
                                       class="table__cell-widget-name">{{ $user->loyaltyPoints }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-user">
                                    {{--<img src="img/users/user-10.png" alt=""--}}
                                    {{--class="table__cell-user-avatar rounded-circle">--}}
                                    <div class="table__cell-user-wrap">
                                        <a href="{{url('/wh-detailUsers')}}/{{ $user->id }}" class="table__cell-widget-name">{{ $user->created_at }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $user->updated_at }}</span>
                                </div>
                            </td>
                            {{--<td>--}}
                            {{--<div class="table__cell-widget">--}}

                            {{--@if (!empty($user->QRpassword))--}}
                            {{--<img style="width: 60px;"--}}
                            {{--src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($user->QRpassword)) !!} ">--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            <td class="table__label">
                                {{--<a href="{{url('/wh-detailUsers')}}/{{ $user->id }}." onclick="qrOpenModal({{$user->id}})">--}}
                                {{--<span class="badge badge-success">Create QR CODE</span></a>--}}

                                <a href="{{asset('wh-manageReservedClasses')}}/{{$user->id}}">
                                    <span style="margin-top: 5px"
                                          class="badge badge-success">Reserved Classes</span>
                                </a>
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
    function qrOpenModal(id) {
        $('#qrModal').modal('toggle');
        $('#user_id').val(id);
    }

</script>

</body>
</html>
