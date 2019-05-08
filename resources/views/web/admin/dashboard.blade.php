@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->




@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">
    
  <div class="container-fluid">
    <div class="page-content__header">
     <div>
       <h2 class="page-content__header-heading">Dashboard</h2>
       <div class="page-content__header-description">Welcome "<b>{{ session()->get('name') }}</b>" to Workplace Health Dashboard</div>
     </div>
     <div class="page-content__header-meta">
    </div>
  </div>

</div>

@include('web.admin.footerjs')



</body>
</html>
