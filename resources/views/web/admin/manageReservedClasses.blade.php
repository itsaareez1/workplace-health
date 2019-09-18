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
                <form method="post" action="{{url('create-reserved-classes-qrcode')}}">
                    <input id="res_class_id" name="res_class_id" value="" type="hidden">
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
                <h2 class="page-content__header-heading">Manage Reserved Classes</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Reserved Classes</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Reserved Classes</div>

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
                        <th>Class Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        {{--<th>QR CODE</th>--}}
                        {{--<th>Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $reserved_class)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $reserved_class->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $reserved_class->class_name }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-user">
                                    <div class="table__cell-user-wrap">
                                        <a href="#"
                                           class="table__cell-widget-name">{{ $reserved_class->created_at }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $reserved_class->updated_at }}</span>
                                </div>
                            </td>
                            <!--
                            <td>
                                <div class="table__cell-widget">

                                    <?php
                                    if (!empty($reserved_class->QRpassword)) {
                                    ?>
                                    <img style="width: 60px;"
                                         src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($reserved_class->QRpassword)) !!} ">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="table__label">
                                <a href="#." onclick="qrOpenModal({{$reserved_class->id}})">
                                    <span class="badge badge-success">Create QR CODE</span></a>
                            </td>
                            !-->

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
        $('#res_class_id').val(id);
    }

</script>

</body>
</html>
