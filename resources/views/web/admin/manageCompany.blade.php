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
                <form method="post" action="{{url('deleteCompany')}}">
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
                <h2 class="page-content__header-heading">Manage Companies</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Companies</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Companies</div>
                    <!-- <div class="dropdown dataset__header-filter">
                      <div class="dropdown-toggle dataset__header-filter-toggle" data-toggle="dropdown">Filter and Order</div>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">ASC</a>
                        <a class="dropdown-item" href="#">DESC</a>
                      </div>
                    </div> -->
                </div>
                <!--   <div class="dataset__header-controls">
                    <div class="input-group input-group-icon icon-right dataset__header-search">
                      <input class="form-control dataset__header-search-input" type="text" placeholder="Search">
                      <span class="input-icon mdi mdi-magnify"></span>
                    </div>
                    <div class="dropdown dataset__header-view dataset__header-control">
                      <div class="mdi mdi-grid dropdown-toggle dropdown-toggle__icon dataset__header-controls-icon" data-toggle="dropdown"></div>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                          <span class="mdi mdi-grid dropdown-item__icon"></span>Table View
                        </a>
                        <a class="dropdown-item" href="#">
                          <span class="mdi mdi-format-list-bulleted dropdown-item__icon"></span>List View
                        </a>
                        <a class="dropdown-item" href="#">
                          <span class="mdi mdi-grid-large dropdown-item__icon"></span>Grid View
                        </a>
                      </div>
                    </div>
                    <a href="#" class="mdi mdi-plus-circle dataset__header-control dataset__header-controls-icon"></a>
                  </div> -->
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
                        <th>District</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        {{--<th>Status</th>--}}
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $company)
                        <tr>
                            <td class="table__checkbox">
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $company->id }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <a href="#" class="table__cell-widget-name">{{ $company->name }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $company->district }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-user">
                                    {{--<img src="img/users/user-10.png" alt=""--}}
                                         {{--class="table__cell-user-avatar rounded-circle">--}}
                                    <div class="table__cell-user-wrap">
                                        <a href="#" class="table__cell-widget-name">{{ $company->created_at }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="table__cell-widget">
                                    <span class="table__cell-widget-name">{{ $company->updated_at }}</span>
                                </div>
                            </td>
                            {{--<td class="table__label"><span class="badge badge-success">Label</span></td>--}}
                            <td class="table__cell-actions">
                                <div class="table__cell-actions-wrap">
                                    <div class="dropdown table__cell-actions-item">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-toggle="dropdown">
                                            Actions
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" onclick="deleteCompanyOpenModal({{$company->id}})"
                                               href="#.">Delete</a>
                                            <a class="dropdown-item" href="{{url('wh-editCompany')}}/{{$company->id}}">Edit</a>
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
    function deleteCompanyOpenModal(id) {
        $('#deleteModal').modal('toggle');
        $('#delete_id').val(id);
    }

</script>


</body>
</html>
