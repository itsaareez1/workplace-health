@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
            <div class="container-header">
                <h2 class="container-heading">Add New Point Product</h2>
            </div>
            <div class="form-wizard-a__body">
                <div class="form-wizard-a__content">
                    <div class="form-wizard-a__step-content is-current" data-step-content="1">
                        <h3 class="form-wizard-a__step-content-heading">
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Point Product</span>
                            Information
                        </h3>
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


                        <div class="row">
                            <div class="col-lg-4">
                                <form class="form-wizard__step-form" method="POST"
                                      action="{{ url('postPointProduct') }}"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="title" type="text"
                                                   placeholder="Write title for points product here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('title'))
                                        <span style="color: red">{{ $errors->first('title') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="type">Select Type</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select name="type" onchange="check()">
                                                <option disabled selected>Select Product Type!</option>
                                                <option id="Priced" value="1">Voucher Product</option>
                                                <option id="Pointed" value="2">Promocode Product</option>
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
                                        <label for="code">Code</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="code" type="text"
                                                   placeholder="Write code for point product here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('code'))
                                        <span style="color: red">{{ $errors->first('code') }}</span>
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

    function check() {
        if (document.getElementById("Priced").selected == true) {
            document.getElementById('pointsBox').style.display = "none";
            document.getElementById('priceBox').style.display = "block";
        }
        else if (document.getElementById("Pointed").selected == true) {
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
