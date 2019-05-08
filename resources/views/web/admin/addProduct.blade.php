@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


  

  <div class="page-content">
    
<div class="container-fluid container-fh">
  <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
    <div class="container-header">
      <h2 class="container-heading">Add New Product</h2>
    </div>
    <div class="form-wizard-a__body">
      <div class="form-wizard-a__content">
        <div class="form-wizard-a__step-content is-current" data-step-content="1">
          <h3 class="form-wizard-a__step-content-heading">
            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Product</span> Information
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
              <form class="form-wizard__step-form" method="POST" action="{{ url('postProduct') }}" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="name" type="text" placeholder="Write name for product here!">
                    <span class="input-icon ua-icon-home"></span>
                  </div>
                </div>
                @if ($errors->first('name'))
                <span style="color: red">{{ $errors->first('name') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="type">Select Type</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select name="type" onchange="check()">
                        <option disabled selected>Select Product Type!</option>
                        <option id="Priced"  value="1">Priced Product</option>
                        <option id="Pointed" value="2">Points Product</option>
                    </select>
                  </div>
                </div>
                @if ($errors->first('type'))                
                <span style="color: red">{{ $errors->first('type') }}</span>
                <br/><br/>
                @endif

                <div class="form-group">
                  <label for="image">Upload Product Image</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="image" type="file">
                  </div>
                </div>
                @if ($errors->first('image'))
                <span style="color: red">{{ $errors->first('image') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="description">Product Description</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <textarea class="form-control" name="description" type="text" placeholder="Write short description for product here!"></textarea>
                  </div>
                </div>
                @if ($errors->first('description'))
                <span style="color: red">{{ $errors->first('description') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="specs">Product Specifications</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <textarea class="form-control" name="specs" type="text" placeholder="Write specifications for product here!"></textarea>
                  </div>
                </div>
                @if ($errors->first('specs'))
                <span style="color: red">{{ $errors->first('specs') }}</span>
                <br/><br/>
                @endif

                <div class="form-group" id="priceBox">
                  <label for="price">Price</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="price" type="text" placeholder="Write price for product here!">
                  </div>
                </div>
                @if ($errors->first('price'))
                <span style="color: red">{{ $errors->first('price') }}</span>
                <br/><br/>
                @endif
                <div class="form-group" id="pointsBox">
                  <label for="points">Points</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="points" type="text" placeholder="Write points for product here!">
                    <span class="input-icon ua-icon-lock-outline"></span>
                  </div>
                </div>
                @if ($errors->first('points'))
                <span style="color: red">{{ $errors->first('points') }}</span>
                <br/><br/>
                @endif                
                <div class="form-group">
                  <label for="state">Select State</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select id="state" name="state">
                        <option disabled selected>Select Status!</option>
                        <option value="1">Coming Soon</option>
                        <option value="2">Available</option>
                        <option value="3">Out of Stock</option>

                    </select>
                  </div>
                </div>
                @if ($errors->first('state'))
                <span style="color: red">{{ $errors->first('state') }}</span>
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



<script>

function check(){
  if (document.getElementById("Priced").selected == true){
      document.getElementById('pointsBox').style.display = "none";
      document.getElementById('priceBox').style.display = "block";
    }
    else if (document.getElementById("Pointed").selected == true){
      document.getElementById('priceBox').style.display = "none";
      document.getElementById('pointsBox').style.display = "block";
    }

}
</script>

@include('web.admin.footerjs')

<script src="{{asset('admin/js/form-wizard/form-wizard.js')}}"></script>
<script src="{{asset('admin/js/preview/form-wizard-a.min.js')}}"></script>



</body>
</html>
