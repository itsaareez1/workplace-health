@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


  

  <div class="page-content">
    
<div class="container-fluid container-fh">
  <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
    <div class="container-header">
      <h2 class="container-heading">Add News</h2>
    </div>
    <div class="form-wizard-a__body">
      <div class="form-wizard-a__content">
        <div class="form-wizard-a__step-content is-current" data-step-content="1">
          <h3 class="form-wizard-a__step-content-heading">
            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>News</span> Information
          </h3>
          @if (session()->has('status'))
          <div class="row">
          <div class="col-lg-12">
          <div class="alert action-alert action-alert--danger has-btn" role="alert">
              <span class="action-alert__message">
              <span class="action-alert__action-message">{{ session()->get('status') }}</a>
            </span>
          </div>
         </div>
         </div>
         @endif

          
          <div class="row">
            <div class="col-lg-4">
              <form class="form-wizard__step-form" method="POST" action="{{ url('postNews') }}" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title">Title for News</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="title" type="text" placeholder="Write title of news here!">
                    <span class="input-icon ua-icon-home"></span>
                  </div>
                </div>
                @if ($errors->first('title'))
                <span style="color: red">{{ $errors->first('title') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="type">Select Type of News</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select id="type" name="type">
                        <option disabled selected>Select One</option>
                        <option value="1">General (Shown before login)</option>
                        <option value="2">Specific (Shown after login)</option>
                    </select>
                  </div>
                </div>
                @if ($errors->first('type'))
                <span style="color: red">{{ $errors->first('type') }}</span>
                <br/><br/>
                @endif
                <div class="form-group" id="company" style="display:none;">
                  <label for="type">Select Company</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select name="company">
                        <option disabled selected>Select One</option>
                        @foreach ($companies as $company)
                          <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                @if ($errors->first('company'))
                <span style="color: red">{{ $errors->first('company') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="image">Upload Header Image</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="image" type="file">
                  </div>
                </div>
                @if ($errors->first('image'))
                <span style="color: red">{{ $errors->first('image') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="description">Description</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <textarea class="form-control" name="description" rows ="20" type="text" placeholder="Write short description here!"></textarea>
                  </div>
                </div>
                @if ($errors->first('description'))
                <span style="color: red">{{ $errors->first('description') }}</span>
                <br/><br/>
                @endif


                <div class="form-group">
                    <input type="submit" value="Add Now!" class="btn-primary btn">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>
</div>



<script type="text/javascript">

  window.onload = function(){
    var cSelect = document.getElementById('type');
    cSelect.onchange = function(){
      if (cSelect.selectedIndex == 2){
        document.getElementById('company').style = "block";
      }
      else{
        document.getElementById('company').style = "none";

      }
    }
  }

</script>

@include('web.admin.footerjs')

<script src="{{asset('admin/js/form-wizard/form-wizard.js')}}"></script>
<script src="{{asset('admin/js/preview/form-wizard-a.min.js')}}"></script>

<script src="asset('admin/vendor/alloy-editor/alloy-editor-all-min.js')}}"></script>
<script src="asset('admin/js/preview/wysiwyg-alloy-editor.min.js')}}"></script>



</body>
</html>
