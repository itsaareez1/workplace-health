@include('web.admin.head')
<body class="js-loading "> <!-- Edit for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
            <div class="container-header">
                <h2 class="container-heading">Edit Contact Information</h2>
            </div>
            <div class="form-wizard-a__body">
                <div class="form-wizard-a__content">
                    <div class="form-wizard-a__step-content is-current" data-step-content="1">
                        <h3 class="form-wizard-a__step-content-heading">
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Contact </span>
                            Information
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
                                <form class="form-wizard__step-form" method="POST"
                                      action="{{ url('updateContactinfo') }}">
                                    <input name="update_id" type="hidden" value="{{$contactinfo_detail->id}}">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="address" type="text"
                                                   value="{{$contactinfo_detail->address}}"
                                                   placeholder="Write address here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('address'))
                                        <span style="color: red">{{ $errors->first('address') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="phone" type="text"
                                                   value="{{$contactinfo_detail->phone}}"
                                                   placeholder="Write phone here!">
                                        </div>
                                    </div>
                                    @if ($errors->first('phone'))
                                        <span style="color: red">{{ $errors->first('phone') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="email" type="email"
                                                   value="{{$contactinfo_detail->email}}"
                                                   placeholder="Write email here!">
                                        </div>
                                    </div>
                                    @if ($errors->first('email'))
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                        <br/><br/>
                                    @endif


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
