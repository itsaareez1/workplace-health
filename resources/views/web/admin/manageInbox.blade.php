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
                <form method="post" action="{{url('deleteInboxMessage')}}">
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
                        <button type="submit" class="btn btn-primary" id="delete_btn" onclick="">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('wh-inbox-reply') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" id="to_mail" name="to_mail" class="form-control">
                        <input type="hidden" id="update_id" name="update_id" class="form-control">
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" required class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" required class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Contact us queries</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Messages</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Messages</div>

                </div>
            </div>
            <div class="dataset__body dataset__body--panel">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @if (session()->has('status'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert action-alert action-alert--success has-btn" role="alert">
                              <span class="action-alert__message">
                                  <span class="action-alert__action-message">{{ session()->get('status') }}</span>
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
                        <th>Phone</th>
                        <th>Message</th>
                        {{--<th>Created At</th>--}}
                        {{--<th>Updated At</th>--}}
                        <th>Status</th>

                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $result->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $result->name }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $result->email }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $result->phone }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $result->message }}</a>
                                </div>
                            </td>

                            {{--<td>--}}
                                {{--<div class="table__cell-user">--}}
                                    {{--<div class="table__cell-user-wrap">--}}
                                        {{--<a href="#" class="table__cell-widget-name">{{ $result->created_at }}</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<div class="table__cell-widget">--}}
                                    {{--<span class="table__cell-widget-name">{{ $result->updated_at }}</span>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            @if($result->state == 1)
                                <td class="table__label">

                                    <a style="cursor: pointer"
                                       onclick="ReplyOpenModal({{$result->id}},'{{$result->email}}')">
                                        <span class="badge badge-danger">Pending Reply</span>
                                    </a>

                                </td>
                            @elseif($result->state == 2)
                                <td class="table__label"><span class="badge badge-primary">Replied</span></td>
                            @endif
                            <td class="table__cell-actions">
                                <div class="table__cell-actions-wrap">
                                    <div class="dropdown table__cell-actions-item">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" onclick="deleteIndexOpenModal({{$result->id}})"
                                               href="#.">Delete</a>
                                            {{--<a class="dropdown-item" href="#">Delete</a>--}}
                                            {{--<a class="dropdown-item" href="#">Edit</a>--}}
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

    function ReplyOpenModal(id, email) {
        $('#replyModal').modal('toggle');
        $('#to_mail').val(email);
        $('#update_id').val(id);
    }

    function deleteIndexOpenModal(id) {
        $('#deleteModal').modal('toggle');
        $('#delete_id').val(id);
    }

</script>
</body>
</html>
