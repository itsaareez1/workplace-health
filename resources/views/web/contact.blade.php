@extends('layouts.layoutweb')



@section('content1')

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">


                    <form action="{{url('sendmessage')}}" method="POST" class="p-5 bg-white">

                        <div class="row form-group">
                            @if (session('status'))
                                <span style="color: green;">{{ session('status') }}</span><br/><br/><br/>
                            @endif

                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" class="form-control"
                                       placeholder="Full Name">
                                <span class="focus-input100" style="color: red">{{ $errors->first('fullname') }}</span>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       placeholder="Email Address">
                                <span class="focus-input100" style="color: red">{{ $errors->first('email') }}</span>

                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone #">
                                <span class="focus-input100" style="color: red">{{ $errors->first('phone') }}</span>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Message</label>
                                <textarea name="message" id="message" name="message" max="500" cols="30" rows="5"
                                          class="form-control" placeholder="Say hello to us"></textarea>
                                <span class="focus-input100" style="color: red">{{ $errors->first('message') }}</span>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn  text-white px-4 py-2"
                                       style="background-color: #008CBA;">
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">


                        <h3 class="h5 text-black mb-3">Contact Info</h3>

                        <img style="   width: 100%;" src="https://99watchseries.com/health/public/web/images/map.jpg" >

                        {{--<div id="map" style="height: 400px; width: 100%; "></div>--}}
                        {{--<script>--}}
                            {{--// Initialize and add the map--}}
                            {{--function initMap() {--}}
                                {{--// The location of Uluru--}}
                                {{--var uluru = {lat: 51.508742, lng: -0.120850};--}}
                                {{--// The map, centered at Uluru--}}
                                {{--var map = new google.maps.Map(--}}
                                    {{--document.getElementById('map'), {zoom: 12, center: uluru});--}}
                                {{--// The marker, positioned at Uluru--}}
                                {{--var marker = new google.maps.Marker({position: uluru, map: map});--}}
                            {{--}--}}
                        {{--</script>--}}
                        {{--<script async defer--}}
                                {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCxyBAYbEr4RqW54ZHEu0_20kUHIg_AYM&callback=initMap">--}}
                        {{--</script>--}}


                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4"><?php echo isset($result->address) ? $result->address : '' ?></p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#"><?php echo isset($result->address) ? $result->phone : '' ?></a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#"><?php echo isset($result->address) ? $result->email : '' ?></a></p>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
