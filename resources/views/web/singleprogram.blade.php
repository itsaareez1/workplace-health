@extends('layouts.layoutweb')
@section('content1')


    <script src="{{asset('/js/html5-qrcode.min.js')}}"></script>
    <script src="{{asset('/js/jsqrcode-combined.min.js')}}"></script>


    <div class="site-section">
        <div class="container">


            @if (session()->has('status'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert action-alert action-alert--danger alert-success has-btn" role="alert">
                            <span class="action-alert__message">
                              <span class="action-alert__action-message">{{ session()->get('status') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert action-alert action-alert--danger alert-danger has-btn" role="alert">
                            <span class="action-alert__message">
                              <span class="action-alert__action-message">{{ session()->get('error') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    {{--<p class="mb-5"><img src="{{asset('admin/store_img/'.$class->img.'')}}" alt="Image"--}}
                    <p class="mb-5"><img src="{{asset('storage/'.$class->img.'')}}" alt="Image"
                                         class="img-fluid"></p>
                </div>
                <div class="col-lg-5 ml-auto">
                    <h1 class="site-section-heading mb-3">{{ $class->name }}</h1>
                    {{--<h6>Credits : {{ $class->credits }}</h6>--}}


                    @if(session()->has('userst'))
                        <h6>Duration : {{ $class->duration }}</h6>
                        <h6>Level : {{ $class->level }}</h6>
                        <h6>Category : {{ $class->category }}</h6>
                        {{--<h6>Class Timing : {{ $class->time}}</h6>--}}

                        <br>
                        <h6 style="text-align: center"><b>Class Timing</b></h6>
                        <table class="table">
                            <tr>
                                <th>Session</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>

                            <?php
                            if (isset($class_session_deatil) && count($class_session_deatil) > 0) {
                            $cont_session = 1;
                            foreach ($class_session_deatil as $row) {
                            ?>

                            <tr>
                                <td>{{$cont_session}}</td>
                                <td>{{$row->date}}</td>
                                <td>{{$row->time}}</td>
                            </tr>
                            <?php
                            $cont_session++;
                            }
                            }
                            ?>
                        </table>
                        <h5>Venue : </h5>
                        <p>{{ $class->venue }}</p>
                        <h5>About : </h5>
                        <p class="mb-4">{{ $class->description}} </p>


                        @if(isset($is_class_reserve) && !empty($is_class_reserve))

                            {{--<button type="button" class="btn btn-primary text-white px-4" data-toggle="modal"--}}
                            {{--data-target="#markModal">Mark Attendance--}}
                            {{--</button>--}}

                            @if (!empty($is_class_reserve->QRpassword))
                                <!--<a target="_blank"-->
                                <!--   href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($is_class_reserve->QRpassword)) !!} ">-->
                                <!--    <img style="border: 3px solid #262626; margin-bottom: 5px"-->
                                <!--         src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($is_class_reserve->QRpassword)) !!} ">-->
                                <!--</a>-->
                            @endif
                        <br>
                            <a class="btn btn-primary" href="{{url('attendance')}}">
                                <i class="fa fa-camera"></i> Scan QR Attendance</a>
                        @else
                            <button type="button" class="btn btn-primary text-white px-4" data-toggle="modal"
                                    data-target="#myModal">Reserve class
                            </button>
                        @endif

                    @else
                        <h6>Duration : {{ $class->duration }}</h6>
                        <h5>About : </h5>
                        <p class="mb-4">{{ $class->description}} </p>

                    @endif


                <!-- Trigger the modal with a button -->
                    {{--@if (isset($is_class_reserve) && !empty($is_class_reserve))--}}
                <!--<button type="button" class="btn btn-primary text-white px-4" data-toggle="modal"-->
                    <!--        data-target="#markModal">Mark Attendance-->
                    <!--</button>-->

                    {{--                <!--<a href="{{asset('/attendance')}}?id={{ $class->id }}" type="button"-->--}}
                <!--   class="btn btn-primary text-white px-4">Attendance</a>-->
                    {{--@endif--}}

                    <hr>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <form method="post" action="{{url('reserve_class')}}">
                                    <input type="hidden" value="{{ $class->id }}" name="class_id">
                                    <div class="modal-body">
                                        <center><h1>{{ $class->name }}</h1></center>
                                        <center><h5>{{ $class->venue }}</h5></center>
                                        {{--<center><h4>Monday,22 Feb</h4></center>--}}
                                        <center><h4>{{ $class->time}}</h4></center>
                                        {{--<center><h1>{{ $class->credits }}</h1></center>--}}
                                        {{--<center><h3>Credit</h3></center>--}}

                                        <center>
                                            {{--<button type="button" class="btn btn-primary text-white px-4"--}}
                                            {{--data-dismiss="modal" onclick="JSalert1();">Confirm Reservation--}}
                                            {{--</button>--}}
                                            <button type="submit" class="btn btn-primary text-white px-4">Confirm
                                                Reservation
                                            </button>
                                        </center>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="markModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <form method="post" action="{{url('mark_attendance')}}">
                                    <input type="hidden" value="{{ $class->id }}" name="class_id">
                                    <div class="modal-body">
                                        <center><h3>Are you sure you want to mark your attendance</h3></center>
                                        <br><br>
                                        <center>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary text-white px-4">
                                                Yes
                                            </button>
                                        </center>

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


@endsection
