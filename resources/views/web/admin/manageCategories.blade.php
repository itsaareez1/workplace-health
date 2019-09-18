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
                <form method="post" action="{{url('deleteCategory')}}">
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
                <h2 class="page-content__header-heading">Manage Categories</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Categories</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Categories</div>

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
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $category)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $category->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $category->name }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-user">
                                    <img src="img/users/user-10.png" alt=""
                                         class="table__cell-user-avatar rounded-circle">
                                    <div class="table__cell-user-wrap">
                                        <a href="#" class="table__cell-widget-name">{{ $category->created_at }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $category->updated_at }}</span>
                                </div>
                            </td>
                            <td class="table__label"><span class="badge badge-success">Label</span></td>
                            <td class="table__cell-actions">
                                <div class="table__cell-actions-wrap">
                                    <div class="dropdown table__cell-actions-item">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-toggle="dropdown">
                                            Actions
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               onclick="deleteCategoryOpenModal({{$category->id}})"
                                               href="#.">Delete</a>
                                            <a class="dropdown-item"
                                               href="{{url('wh-editCategory')}}/{{$category->id}}">Edit</a>
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
    function deleteCategoryOpenModal(id) {
        $('#deleteModal').modal('toggle');
        $('#delete_id').val(id);
        // $('#delete_btn').attr('onclick', 'deleteCategory(' + id + ')');
    }

    {{--function deleteCategory(id) {--}}
    {{--$.ajax({--}}
    {{--type: "POST",--}}
    {{--data: {--}}
    {{--"delete_id": id--}}
    {{--},--}}
    {{--url: "{{ url('deleteCategory') }}",--}}
    {{--beforeSend: function () {--}}
    {{--},--}}
    {{--success: function (data) {--}}
    {{--console.log(data);--}}
    {{--if (data == 1) {--}}
    {{--console.log('Category delete successfully');--}}

    {{--window.location.href = '{{url("wh-manageCategory")}}';--}}
    {{--} else {--}}
    {{--console.log('Something went wrong');--}}
    {{--}--}}
    {{--}--}}
    {{--});--}}
    {{--$('#deleteModal').modal('toggle');--}}
    {{--}--}}

</script>
</body>
</html>
