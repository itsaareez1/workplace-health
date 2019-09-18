@include('web.admin.head')
<body class="js-loading "> <!-- Update for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
            <div class="container-header">
                <h2 class="container-heading">Edit Profile</h2>
            </div>
            <div class="form-wizard-a__body">
                <div class="form-wizard-a__content">
                    <div class="form-wizard-a__step-content is-current" data-step-content="1">
                        <h3 class="form-wizard-a__step-content-heading">
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Profile</span>
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
                                <form class="form-wizard__step-form" method="POST" action="{{ url('updateProfile') }}">
                                    <input type="hidden" name="update_id" value="{{$results->id}}">
                                    <div class="form-group">
                                        <label for="name">Name of Profile</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" id="name" name="name" type="text"
                                                   value="{{$results->name}}" placeholder="Write name here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" id="email" name="email" type="text" disabled
                                                   value="{{$results->email}}" placeholder="Write email here!">
                                            <span class="input-icon ua-icon-contact-email"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('email'))
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" id="password" name="password" type="password"
                                                   value="" placeholder="Write password here!">
                                            <span class="input-icon ua-icon-tree-lock"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="confm_pwd">Confirm Password</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                                <input class="form-control" id="confm_pwd" name="confm_pwd" type="password"
                                                   value="" placeholder="Write confirm password here!">
                                            <span class="input-icon ua-icon-tree-lock"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Update Now!" class="btn-primary btn">
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


@include('web.admin.footerjs')

<script src="{{asset('admin/js/form-wizard/form-wizard.js')}}"></script>
<script src="{{asset('admin/js/preview/form-wizard-a.min.js')}}"></script>


</body>
</html>
