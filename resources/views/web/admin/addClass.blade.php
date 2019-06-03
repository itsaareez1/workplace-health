@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


  

  <div class="page-content">
    
<div class="container-fluid container-fh">
  <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
    <div class="container-header">
      <h2 class="container-heading">Add New Class</h2>
    </div>
    <div class="form-wizard-a__body">
      <div class="form-wizard-a__content">
        <div class="form-wizard-a__step-content is-current" data-step-content="1">
          <h3 class="form-wizard-a__step-content-heading">
            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Class</span> Information
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
              <form class="form-wizard__step-form" method="POST" action="{{ url('postClass') }}" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Class Name</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="name" type="text" placeholder="Write name for class here!">
                    <span class="input-icon ua-icon-home"></span>
                  </div>
                </div>
                @if ($errors->first('name'))
                <span style="color: red">{{ $errors->first('name') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="program_id">Select Category</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select id="program_id" name="program_id">
                        <option disabled selected>Select Programme!</option>
                        @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                @if ($errors->first('program_id'))
                <span style="color: red">{{ $errors->first('program_id') }}</span>
                <br/><br/>
                @endif

                <div class="form-group">
                  <label for="image">Upload Display Image</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="image" type="file">
                  </div>
                </div>
                @if ($errors->first('image'))
                <span style="color: red">{{ $errors->first('image') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="time">Class Time</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="time" type="text" placeholder="Write class time here!">
                  </div>
                </div>
                @if ($errors->first('time'))
                <span style="color: red">{{ $errors->first('time') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="duration">Class Duration</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="duration" type="text" placeholder="Write class duration here!">
                  </div>
                </div>
                @if ($errors->first('duration'))
                <span style="color: red">{{ $errors->first('duration') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="venue">Class Venue</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="venue" type="text" placeholder="Write venue for class here!">
                  </div>
                </div>
                @if ($errors->first('venue'))
                <span style="color: red">{{ $errors->first('venue') }}</span>
                <br/><br/>
                @endif

                <div class="form-group">
                  <label for="slot">Class Slots</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                      <input class="form-control" name="slot" type="text" placeholder="Use comma (,) seprated values.">

                  </div>
                </div>
                @if ($errors->first('slot'))
                <span style="color: red">{{ $errors->first('slot') }}</span>
                <br/><br/>
                @endif

                <div class="form-group">
                  <label for="description">Class Description</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <textarea class="form-control" name="description" type="text" placeholder="Write short description for class here!"></textarea>
                  </div>
                </div>
                @if ($errors->first('description'))
                <span style="color: red">{{ $errors->first('description') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="credits">Class Credits</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="credits" type="text" placeholder="Write credits for class here!">
                  </div>
                </div>
                @if ($errors->first('credits'))
                <span style="color: red">{{ $errors->first('credits') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="level">Level</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <input class="form-control" name="level" type="text" placeholder="Write level for class here!">
                  </div>
                </div>
                @if ($errors->first('level'))
                <span style="color: red">{{ $errors->first('level') }}</span>
                <br/><br/>
                @endif
                <div class="form-group">
                  <label for="category_id">Select Category</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select id="category_id" name="category_id">
                        <option disabled selected>Select Category!</option>
                        @foreach ($results as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                @if ($errors->first('category_id'))
                <span style="color: red">{{ $errors->first('category_id') }}</span>
                <br/><br/>
                @endif

                <div class="form-group">
                  <label for="state">Select Status</label>
                  <div class="input-group input-group-icon iconfont icon-right">
                    <select id="state" name="state">
                        <option disabled selected>Select Status!</option>
                        <option value="1">Coming Soon</option>
                        <option value="2">Available</option>
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
