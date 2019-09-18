@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->


@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <!-- Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{url('new-qrcode')}}">
                    <input id="user_id" name="user_id" value="" type="hidden">
                    <input id="status" name="status" value="" type="hidden">
                    <div class="modal-header">
                        <h6 class="modal-title" id="qrModalLabel">Are you sure you want to assign QR code to this
                            user!</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Detail User</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Detail User</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Users</div>

                </div>
            </div>
            <div class="dataset__body dataset__body--panel">

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
                <br>
                <div class="container">
                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Name</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->name }}
                        </div>
                        <div class="col-2">
                            <label><b>Email</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->email }}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Company</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->company_name }}
                        </div>
                        <div class="col-2">
                            <label><b>Phone</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->phone }}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Loyalty Points</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->loyaltyPoints }}
                        </div>
                        <div class="col-2">
                            <label><b>Date</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->dat }}
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>IC</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->IC }}
                        </div>
                        <div class="col-2">
                            <label><b>signature</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->signature }}
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Workpermit</b></label>
                        </div>
                        <div class="col-4">
                            {{ $results->workpermit }}
                        </div>
                    </div>
                    <br>

                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Q:1 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q1==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                        <div class="col-2">
                            <label><b>Q:2 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q2==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Q:3 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q3==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                        <div class="col-2">
                            <label><b>Q:4 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q4==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Q:5 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q5==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                        <div class="col-2">
                            <label><b>Q:6 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q6==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Q:7 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q7==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                        <div class="col-2">
                            <label><b>Q:8 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q8==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-2">
                            <label><b>Q:9 (Answer)</b></label>
                        </div>
                        <div class="col-4">
                            @if($results->q9==0)
                                No
                            @else
                                Yes
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


@include('web.admin.footerjs')

<script>
    function qrOpenModal(id) {
        $('#qrModal').modal('toggle');
        $('#user_id').val(id);
    }

</script>

</body>
</html>
