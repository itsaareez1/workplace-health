@include('web.admin.head')
<body class="js-loading "> <!-- Edit for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div id="form-wizard-a" class="main-container container-fh__content form-wizard-a">
            <div class="container-header">
                <h2 class="container-heading">Edit FAQ</h2>
            </div>
            <div class="form-wizard-a__body">
                <div class="form-wizard-a__content">
                    <div class="form-wizard-a__step-content is-current" data-step-content="1">
                        <h3 class="form-wizard-a__step-content-heading">
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>FAQ</span>
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
                                <form class="form-wizard__step-form" method="POST" action="{{ url('updateFaqs') }}">
                                    <input name="update_id" type="hidden" value="{{$faqs_detail->id}}">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="question" type="text"
                                                   value="{{$faqs_detail->questions}}"
                                                   placeholder="Write question here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('question'))
                                        <span style="color: red">{{ $errors->first('question') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <textarea class="form-control" name="answer" type="text" rows="12"
                                                      placeholder="Write answer here!">{{$faqs_detail->answer}}</textarea>
                                        </div>
                                    </div>
                                    @if ($errors->first('answer'))
                                        <span style="color: red">{{ $errors->first('answer') }}</span>
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
