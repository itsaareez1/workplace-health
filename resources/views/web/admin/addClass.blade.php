@include('web.admin.head')
<body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->
@include('web.admin.navbar')
@include('web.admin.menu')

<?php
$QRpassword = bcrypt(str_random(40));
?>

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
                            <span class="form-wizard-a__step-content-heading-icon ua-icon-lock-outline"></span> <span>Class</span>
                            Information
                        </h3>
                        @if (session()->has('status'))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert action-alert action-alert--success has-btn" role="alert">
                                      <span class="action-alert__message">
                                      <span class="action-alert__action-message">{{ session()->get('status') }}</span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-lg-4">
                                <form class="form-wizard__step-form" method="POST" action="{{ url('postClass') }}"
                                      enctype="multipart/form-data">
                                    <input type="hidden" name="QRpassword" value="<?php echo $QRpassword; ?>">
                                    <div class="form-group">
                                        <label for="name">Class Name</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="name" type="text"
                                                   placeholder="Write name for class here!">
                                            <span class="input-icon ua-icon-home"></span>
                                        </div>
                                    </div>
                                    @if ($errors->first('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="company_id">Select Company</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select id="company_id" name="company_id">
                                                <option disabled selected>Select One!</option>
                                                @foreach ($companies as $companie)
                                                    <option value="{{ $companie->id }}">{{ $companie->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->first('company_id'))
                                        <span style="color: red">{{ $errors->first('company_id') }}</span>
                                        <br/><br/>
                                    @endif


                                    <div class="form-group">
                                        <label for="program_id">Select Programme</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select id="program_id" name="program_id">
                                                <option disabled selected>Select Programme!</option>
                                                {{--@foreach ($programs as $program)--}}
                                                {{--<option value="{{ $program->id }}">{{ $program->name }}</option>--}}
                                                {{--@endforeach--}}
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
                                        <label for="time">Class Session</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <select class="form-control" name="class_session" id="class_session"
                                                    onchange="changeSession()">
                                                <?php
                                                for ($i = 1; $i <= 10; $i++) {
                                                    echo '<option value="' . $i . '">Session ' . $i . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group multiple_session" id="multiple_session">
                                        <div class="form-group single_session">
                                            <h3>Session 1</h3>

                                            <div class="form-group">
                                                <label for="time">Class Date</label>
                                                <div class="input-group input-group-icon iconfont icon-right">
                                                    <input class="form-control" name="date[]" type="date" required
                                                           placeholder="Write class date here!">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Class Time</label>
                                                <div class="input-group input-group-icon iconfont icon-right">
                                                    <input class="form-control" name="time[]" type="time"
                                                           placeholder="Write class time here!">

                                                    {{--<div class="input-group clockpicker" data-placement="right"--}}
                                                    {{--data-align="top" data-autoclose="true">--}}
                                                    {{--<input type="time" class="form-control" name="time[]"--}}
                                                    {{--placeholder="Write class time here!">--}}
                                                    {{--<span class="input-group-addon">--}}
                                                    {{--<span class="glyphicon glyphicon-time"></span>--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="duration">Class Duration</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            {{--<input class="form-control" name="duration" type="text"--}}
                                            {{--placeholder="Write class duration here!">--}}
                                            <select class="form-control" name="duration" id="duration">
                                                <option value="-1">Select duration</option>
                                                <?php
                                                for ($i = 1; $i < 6; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . ' hour</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->first('duration'))
                                        <span style="color: red">{{ $errors->first('duration') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="venue">Class Venue</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="venue" type="text"
                                                   placeholder="Write venue for class here!">
                                        </div>
                                    </div>
                                    @if ($errors->first('venue'))
                                        <span style="color: red">{{ $errors->first('venue') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="slot">Class Slots</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="slot" type="text"
                                                   placeholder="Use comma (,) seprated values.">

                                        </div>
                                    </div>
                                    @if ($errors->first('slot'))
                                        <span style="color: red">{{ $errors->first('slot') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <label for="description">Class Description</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <textarea class="form-control" name="description" type="text"
                                                      placeholder="Write short description for class here!"></textarea>
                                        </div>
                                    </div>
                                    @if ($errors->first('description'))
                                        <span style="color: red">{{ $errors->first('description') }}</span>
                                        <br/><br/>
                                    @endif
                                    {{--<div class="form-group">--}}
                                    {{--<label for="credits">Class Credits</label>--}}
                                    {{--<div class="input-group input-group-icon iconfont icon-right">--}}
                                    {{--<input class="form-control" name="credits" type="text"--}}
                                    {{--placeholder="Write credits for class here!">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--@if ($errors->first('credits'))--}}
                                    {{--<span style="color: red">{{ $errors->first('credits') }}</span>--}}
                                    {{--<br/><br/>--}}
                                    {{--@endif--}}
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="level" type="text"
                                                   placeholder="Write level for class here!">
                                        </div>
                                    </div>
                                    @if ($errors->first('level'))
                                        <span style="color: red">{{ $errors->first('level') }}</span>
                                        <br/><br/>
                                    @endif
                                    <div class="form-group">
                                        <label for="loyaltyPoints">Loyalty Points</label>
                                        <div class="input-group input-group-icon iconfont icon-right">
                                            <input class="form-control" name="loyaltyPoints" type="number"
                                                   placeholder="Write loyalty Points for class here!">
                                        </div>
                                    </div>
                                    @if ($errors->first('loyaltyPoints'))
                                        <span style="color: red">{{ $errors->first('loyaltyPoints') }}</span>
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

                                    {{--<div class="form-group">--}}
                                    {{--<label for="state">Select Status</label>--}}
                                    {{--<div class="input-group input-group-icon iconfont icon-right">--}}
                                    {{--<select id="state" name="state">--}}
                                    {{--<option disabled selected>Select Status!</option>--}}
                                    {{--<option value="1">Coming Soon</option>--}}
                                    {{--<option value="2">Available</option>--}}
                                    {{--</select>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    @if ($errors->first('state'))
                                        <span style="color: red">{{ $errors->first('state') }}</span>
                                        <br/><br/>
                                    @endif

                                    <div class="form-group">
                                        <input type="submit" value="Add Now!" class="btn-primary btn">
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-3">
                                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($QRpassword )) !!} ">

                                <!-- Bootstrap stylesheet -->
                            {{--<link rel="stylesheet" type="text/css" href="clockpicker/assets/css/bootstrap.min.css">--}}

                            {{--<!-- ClockPicker Stylesheet -->--}}
                            {{--<link rel="stylesheet" type="text/css"--}}
                            {{--href="clockpicker/dist/bootstrap-clockpicker.min.css">--}}

                            <!-- Input group, just add class 'clockpicker', and optional data-* -->
                            {{--<div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">--}}
                            {{--<input type="text" class="form-control" value="09:32">--}}
                            {{--<span class="input-group-addon">--}}
                            {{--<span class="glyphicon glyphicon-time"></span>--}}
                            {{--</span>--}}
                            {{--</div>--}}

                            <!-- Or just a input -->
                            {{--<input id="demo-input" />--}}

                            {{--<script type="text/javascript" src="clockpicker/assets/js/jquery.min.js"></script>--}}
                            {{--<script type="text/javascript" src="clockpicker/assets/js/bootstrap.min.js"></script>--}}

                            {{--<!-- ClockPicker script -->--}}
                            {{--<script type="text/javascript" src="clockpicker/dist/bootstrap-clockpicker.min.js"></script>--}}

                            {{--<script type="text/javascript">--}}
                            {{--$('.clockpicker').clockpicker()--}}
                            {{--.find('input').change(function () {--}}
                            {{--console.log(this.value);--}}
                            {{--});--}}
                            {{--abc--}}
                            {{--</script>--}}

                            <!-- jQuery and Bootstrap scripts -->
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


<script>

    function check() {
        if (document.getElementById("Priced").selected == true) {
            document.getElementById('pointsBox').style.display = "none";
            document.getElementById('priceBox').style.display = "block";
        } else if (document.getElementById("Pointed").selected == true) {
            document.getElementById('priceBox').style.display = "none";
            document.getElementById('pointsBox').style.display = "block";
        }

    }
</script>
<script>
    $('#company_id').change(function () {
        // console.log($('#company_id').val());
        var company_id = $('#company_id').val();

        $.post("program_thgh_companies",
            {
                company_id: company_id,
            },
            function (data, status) {
                // console.log(data);
                // console.log(data.html);
                // alert("Data: " + data + "\nStatus: " + status);
                $('#program_id').html(data.html);
            });


    });

    function changeSession() {
        var session_val = $('#class_session').val();
        console.log('changeSession: ' + session_val);
        var html = '';
        for (var i = 1; i <= session_val; i++) {
            html += '<div class="form-group single_session">\n' +
                '                                        <h3>Session ' + i + '</h3>\n' +
                '\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label for="time">Class Date</label>\n' +
                '                                            <div class="input-group input-group-icon iconfont icon-right">\n' +
                '                                                <input class="form-control" name="date[]" type="date" required\n' +
                '                                                       placeholder="Write class date here!">\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label for="time">Class Time</label>\n' +
                '                                            <div class="input-group input-group-icon iconfont icon-right">\n' +
                '<input class="form-control" name="time[]" type="time" placeholder="Write class time here!">\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';
        }

        $('#multiple_session').html(html);

    }


</script>

</body>
</html>
