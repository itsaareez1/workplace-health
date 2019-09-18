@extends('layouts.layoutindex')
@section('content2')


    <div class="site-section" style="min-height: 600px">
        <div class="container">
            <div class="column" style="padding: 5px;">
                <strong><h1 align="center">History</h1></strong>
                <br>

                <div class="tab" style="padding: 5px;">
                    <button class="tablinks" onclick="openCity(event, 'Classes')" id="defaultOpen">Classes</button>
                    <button class="tablinks" onclick="openCity(event, 'Orders')">Orders</button>
                </div>

                <div id="Classes" class="tabcontent" style="overflow: hidden;">

                    @if(isset($classes) && count($classes)>0)
                        @foreach($classes as $row)
                            <a href="{{url('singleprogram')}}/{{$row->id}}">
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <img align="left" src="{{asset('storage/')}}/{{$row->img}}"
                                             style="width: 100%">
                                    </div>
                                    <div class="col-sm-9">
                                        <br>
                                        {{--<h5>{{$row->QRpassword}}</h5>--}}
                                        <h5>{{$row->name}}</h5>
                                        <h6>Placed On: {{$row->reserve_time}}</h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif

                    {{--<img align="left" src="web/images/yoga.jpg" style="padding : 12px">--}}
                    {{--<br>--}}
                    {{--<h5>Yoga class</h5>--}}
                    {{--<h6>Placed On:01-04-2019 &nbsp; 13:06:40</h6>--}}
                    {{--<h6>STATUS : <span style="color: green;"> Finished</span></h6>--}}
                    {{--<br><br><br>--}}
                    {{--<img align="left" src="web/images/yoga.jpg" style="padding : 12px">--}}
                    {{--<br>--}}
                    {{--<h5>Yoga class</h5>--}}
                    {{--<h6>Placed On:01-04-2019 &nbsp; 13:06:40</h6>--}}
                    {{--<h6>STATUS : <span style="color: red;"> Continue</span></h6>--}}

                </div>

                <div id="Orders" class="tabcontent" style="overflow: hidden;">

                    @if(isset($results) && count($results)>0)
                        @foreach($results as $row)

                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <img align="left" src="{{asset('/web/images/yoga.jpg')}}"
                                         style="width: 100%">

                                </div>
                                <div class="col-sm-10">
                                    <br><h5>Order: {{$row->type}}</h5>
                                    <h6>Placed On: {{$row->created_at}}</h6>
                                    <h6>STATUS : <span
                                                style="color: <?php echo $row->status == 'Accept' ? 'green' : 'red'?>;"> {{$row->status}}</span>
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>


@endsection
