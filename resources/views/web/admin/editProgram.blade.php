@include('web.admin.head')
<body class="js-loading "> <!-- Edit for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
            <div class="container-header">
                <h2 class="container-heading">Edit Programme</h2>
            </div>
            <div class="form-wizard-a__body">
                <div class="form-wizard-a__content">
                    <div class="form-wizard-a__step-content is-current" data-step-content="1">
                        <h3 class="form-wizard-a__step-content-heading">
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Programme</span>
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
                                <form class="form-wizard__step-form" method="POST" action="{{ url('updateProgram') }}">
                                    <input type="hidden" name="update_id" value="{{$program_detail->id}}">
                                    <div class="form-group">
                                        <label for="name">Name of Programme</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="name" type="text"
                                                   value="{{$program_detail->name}}"
                                                   placeholder="Write programme name here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group" id="company">
                                        <label for="type">Select Company</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select name="company">
                                                <option disabled selected>Select One</option>
                                                @foreach ($companies as $company)
                                                    <option
                                                        <?php echo $program_detail->company_id == $company->id ? 'selected' : '' ?> value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->first('company'))
                                        <span style="color: red">{{ $errors->first('company') }}</span>
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
