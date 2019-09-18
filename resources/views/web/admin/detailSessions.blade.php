@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->


@include('web.admin.navbar')
@include('web.admin.menu')


<div class="page-content">

    <div class="container-fluid container-fh">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Detail Sessions</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('wh-dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Detail Sessions</li>
                </ol>
            </div>
        </div>
        <div class="container-fh__content dataset">
            <div class="dataset__header">
                <div class="dataset__header-side">
                    <div class="dataset__header-heading">Sessions</div>

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

                <table class="table dataset__table table__actions" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Session</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;?>
                    @foreach ($results as $session)
                        <tr>
                            <td>Session {{$i}}</td>
                            <td>{{$session->date}}</td>
                            <td>{{$session->time}}</td>
                        </tr>
                        <?php
                        $i++?>
                    @endforeach

                    </tbody>
                </table>

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
