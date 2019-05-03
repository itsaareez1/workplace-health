@include('web\admin\head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->



@include('web\admin\navbar')
@include('web\admin\menu')
  

  <div class="page-content">
    
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
 
      </div>
    </div>
    <div class="dataset__body dataset__body--panel">
      <table class="table dataset__table table__actions">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>District</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Status</th>
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
              <img src="img/users/user-10.png" alt="" class="table__cell-user-avatar rounded-circle">
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
          <td class="table__label"><span class="badge badge-success">Label</span></td>
          <td class="table__cell-actions">
            <div class="table__cell-actions-wrap">
              <div class="dropdown table__cell-actions-item">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                  Actions
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Delete</a>
                  <a class="dropdown-item" href="#">Edit</a>
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


@include('web\admin\footerjs')






</body>
</html>
