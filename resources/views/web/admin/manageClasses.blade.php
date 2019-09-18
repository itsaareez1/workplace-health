@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->


@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{url('deleteClass')}}">
                    <input id="delete_id" name="delete_id" value="" type="hidden">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" id="delete_btn" onclick="">Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Manage Classes</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Classes</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading"> Classes</div>

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
                        {{--<th>Time</th>--}}
                        <th>Duration</th>
                        <th>Venue</th>
                        <th>Level</th>
                        <th>Slot</th>
                        <th>QR CODE</th>
                        {{--<th>Status</th>--}}
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $class)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $class->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $class->name }}</a>
                                </div>
                            </td>
                            {{--<td>--}}
                                {{--<div class="table__cell-widget">--}}
                                    {{--<span class="table__cell-widget-name">{{ $class->time }}</span>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $class->duration }} hours</span>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $class->venue }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $class->level }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $class->slot }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">

                                    <?php
                                    if (!empty($class->QRpassword)) {
                                    ?>
                                    <a download="{{$class->name}}-qrcode.png" target="_blank"
                                       href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($class->QRpassword)) !!} ">
                                        <img style="width: 100px;"
                                             src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($class->QRpassword)) !!} ">

                                    </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>

                            {{--<td class="table__label"><span class="badge badge-success">--}}
                            <?php
                            //                                    if ($class->state == 1) {
                            //                                        echo 'Coming Soon';
                            //                                    } else if ($class->state == 2) {
                            //                                        echo 'Available';
                            //                                    } else {
                            //                                        echo 'Out of Stock';
                            //                                    }
                            ?>
                            {{--</span></td>--}}
                            <td class="table__cell-actions">
                                <a href="{{url('/wh-detailSession')}}/{{$class->id}}" class="btn btn-warning" style="margin-bottom: 5px">Timings</a>
                                <div class="table__cell-actions-wrap">
                                    <div class="dropdown table__cell-actions-item">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-toggle="dropdown">
                                            Actions
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" onclick="deleteClassOpenModal({{$class->id}})"
                                               href="#.">Delete</a>
                                            <a class="dropdown-item"
                                               href="{{url('wh-editClass')}}/{{$class->id}}">Edit</a>
                                        </div>
                                    </div>
                                </div>
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
    function deleteClassOpenModal(id) {
        $('#deleteModal').modal('toggle');
        $('#delete_id').val(id);
    }
</script>

</body>
</html>
