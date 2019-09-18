@extends('layouts.layoutweb')
@section('content1')



    <link href=" {{ URL::asset('/qr_login/option2/css/style.css') }}" rel="stylesheet">
    <?php

//    $dur = 4;
//    $c_date = date("H:i:s");
//    echo $c_date . '<br>';
//    echo $new_time = date("H:i:s", strtotime('+'.$dur.' hours'))
    ?>
    <div class="site-section">
        <div class="container">
            {{--<input type="hidden" id="class_id" name="class_id" value="{{$_GET['id']}}">--}}


            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger error_msg" style="display: none"></div>

                    <div class="alert alert-success success_msg" style="display: none"></div>


                    {{--<div class="alert alert-danger" id="msg_0" style="display: none">--}}
                    {{--Something went wrong please try again later.!--}}
                    {{--</div>--}}

                    {{--<div class="alert alert-success" id="msg_1" style="display: none">--}}
                    {{--Your today attendance is already marked.!--}}
                    {{--</div>--}}

                    {{--<div class="alert alert-success" id="msg_2" style="display: none">--}}
                    {{--Your today Attendance marked successfully.!--}}
                    {{--</div>--}}

                    {{--<div class="alert alert-danger" id="msg_3" style="display: none">--}}
                    {{--This class has not session today!--}}
                    {{--</div>--}}

                    {{--<div class="alert alert-danger" id="msg_4" style="display: none">--}}
                    {{--Your QR code is not correct!--}}
                    {{--</div>--}}
                </div>
            </div>

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
                <div class="col-lg-12">
                    <h3 style="text-align: center">Scan QR code for Attendance</h3><br><br>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">

                                <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img"
                                        type="button" data-toggle="tooltip"><span
                                            class="glyphicon glyphicon-upload  fa fa-upload"></span></button>
                                <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img"
                                        type="button" data-toggle="tooltip"><span
                                            class="glyphicon glyphicon-picture  fa fa-image"></span></button>
                                <button title="Play" class="btn btn-success btn-sm" id="play" type="button"
                                        data-toggle="tooltip"><span class="glyphicon glyphicon-play fa fa-play"></span>
                                </button>
                                <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button"
                                        data-toggle="tooltip"><span
                                            class="glyphicon glyphicon-pause fa fa-pause"></span></button>
                                <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button"
                                        data-toggle="tooltip"><span class="glyphicon glyphicon-stop  fa fa-stop"></span>
                                </button>
                            </div>

                            <div class="well" style="position: relative;display: inline-block;">
                                <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                                <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                                <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                                <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                                <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                            </div>
                            <div class="well" style="width: 100%;">
                                <label id="zoom-value" width="100">Zoom: 2</label>
                                <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30"
                                       value="20"><br>
                                <label id="brightness-value" width="100">Brightness: 0</label>
                                <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0"
                                       max="128" value="0"><br>
                                <label id="contrast-value" width="100">Contrast: 0</label>
                                <input id="contrast" onchange="Page.changeContrast();" type="range" min="-128" max="128"
                                       value="0"><br>
                                <label id="threshold-value" width="100">Threshold: 0</label>
                                <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512"
                                       value="0"><br>
                                <label id="sharpness-value" width="100">Sharpness: off</label>
                                <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                                <label id="grayscale-value" width="100">grayscale: off</label>
                                <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                                <br>
                                <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                                <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                                <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                                <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="camera-select"></select>
                            <br><br>

                            <div class="thumbnail" id="result">
                                <div class="well">
                                    <img width="320" height="240" id="scanned-img" src="">
                                </div>
                                <div class="caption">
                                    <h4>Scanned result</h4>
                                    <p id="scanned-QR" style="display: none"></p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript" src="{{ URL::asset('/qr_login/option2/js/filereader.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/qr_login/option2/js/qrcodelib.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/qr_login/option2/js/webcodecamjs.js ') }}"></script>


    <script>

        function CallAjaxLoginQr(code) {
            // var class_id = $('#class_id').val();
            $.ajax({
                type: "POST",
                cache: false,
                url: "{{action('QrController@checkClassAttendance')}}",
                data: {data: code},
                // data: {data: code, 'class_id': class_id},
                success: function (data) {
                    $('.error_msg').hide();
                    $('.success_msg').hide();

                    // $('#msg_0').hide();
                    // $('#msg_1').hide();
                    // $('#msg_2').hide();
                    // $('#msg_3').hide();
                    // $('#msg_4').hide();

                    console.log(data);
                    // $('#scanned-QR').html('scanned-QR');
                    if (data == 1) {
                        $('.success_msg').show().html('Your today attendance is already marked.!');
                        // $('#msg_1').show();
                        return confirm('Your today attendance is already marked.!');
                        //location.reload()
                        {{--$(location).attr('href', '{{url('/')}}');--}}
                    } else if (data == 2) {
                        $('.success_msg').show().html('Your today Attendance is marked successfully.!');
                        // $('#msg_2').show();
                        return confirm('Your today Attendance is marked successfully.!');

                    } else if (data == 3) {
                        $('.error_msg').show().html('Your dont have class today!');
                        // $('#msg_3').show();
                        // return confirm('This class has not session today!');
                        return confirm('Your dont have class today!');

                    } else if (data == 4) {
                        $('.error_msg').show().html('Your QR code is not correct!');
                        // $('#msg_4').show();
                        return confirm('Your QR code is not correct!');

                    } else if (data == 4) {
                        $('.error_msg').show().html('Your QR Code is correct but this class is not reserved to this user!');
                        // $('#msg_4').show();
                        return confirm('Your QR Code is correct but this class is not reserved this user!');

                    } else {
                        $('.error_msg').show().html('Something went wrong please try again later.!');
                        // $('#msg_0').show();
                        return confirm('Something went wrong please try again later.!');
                        // return confirm('There is no user with this qr code');
                    }
                    //
                }
            })
        }

        (function (undefined) {
            "use strict";

            function Q(el) {
                if (typeof el === "string") {
                    var els = document.querySelectorAll(el);
                    return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
                }
                return el;
            }

            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var scannerLaser = Q(".scanner-laser"),
                imageUrl = new Q("#image-url"),
                play = Q("#play"),
                scannedImg = Q("#scanned-img"),
                scannedQR = Q("#scanned-QR"),
                grabImg = Q("#grab-img"),
                decodeLocal = Q("#decode-img"),
                pause = Q("#pause"),
                stop = Q("#stop"),
                contrast = Q("#contrast"),
                contrastValue = Q("#contrast-value"),
                zoom = Q("#zoom"),
                zoomValue = Q("#zoom-value"),
                brightness = Q("#brightness"),
                brightnessValue = Q("#brightness-value"),
                threshold = Q("#threshold"),
                thresholdValue = Q("#threshold-value"),
                sharpness = Q("#sharpness"),
                sharpnessValue = Q("#sharpness-value"),
                grayscale = Q("#grayscale"),
                grayscaleValue = Q("#grayscale-value"),
                flipVertical = Q("#flipVertical"),
                flipVerticalValue = Q("#flipVertical-value"),
                flipHorizontal = Q("#flipHorizontal"),
                flipHorizontalValue = Q("#flipHorizontal-value");
            var args = {
                autoBrightnessValue: 100,
                resultFunction: function (res) {
                    [].forEach.call(scannerLaser, function (el) {
                        fadeOut(el, 0.5);
                        setTimeout(function () {
                            fadeIn(el, 0.5);
                        }, 300);
                    });
                    scannedImg.src = res.imgData;
                    console.log('res.code');
                    console.log(res.code);
                    CallAjaxLoginQr(res.code);
                    scannedQR[txt] = res.format + ": " + res.code;
                },
                getDevicesError: function (error) {
                    var p, message = "Error detected with the following parameters:\n";
                    for (p in error) {
                        message += p + ": " + error[p] + "\n";
                    }
                    alert(message);
                },
                getUserMediaError: function (error) {
                    var p, message = "Error detected with the following parameters:\n";
                    for (p in error) {
                        message += p + ": " + error[p] + "\n";
                    }
                    alert(message);
                },
                cameraError: function (error) {
                    var p, message = "Error detected with the following parameters:\n";
                    if (error.name == "NotSupportedError") {
                        var ans = confirm("Your browser does not support getUserMedia via HTTP!\n(see: https:goo.gl/Y0ZkNV).\n You want to see github demo page in a new window?");
                        if (ans) {
                            window.open("http://rolandalla.com");
                        }
                    } else {
                        for (p in error) {
                            message += p + ": " + error[p] + "\n";
                        }
                        alert(message);
                    }
                },
                cameraSuccess: function () {
                    grabImg.classList.remove("disabled");
                }
            };
            var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back").init(args);
            decodeLocal.addEventListener("click", function () {
                Page.decodeLocalImage();
            }, false);
            play.addEventListener("click", function () {
                if (!decoder.isInitialized()) {
                    scannedQR[txt] = "Scanning ...";
                } else {
                    scannedQR[txt] = "Scanning ...";
                    decoder.play();
                }
            }, false);
            grabImg.addEventListener("click", function () {
                if (!decoder.isInitialized()) {
                    return;
                }
                var src = decoder.getLastImageSrc();
                scannedImg.setAttribute("src", src);
            }, false);
            pause.addEventListener("click", function (event) {
                scannedQR[txt] = "Paused";
                decoder.pause();
            }, false);
            stop.addEventListener("click", function (event) {
                grabImg.classList.add("disabled");
                scannedQR[txt] = "Stopped";
                decoder.stop();
            }, false);
            Page.changeZoom = function (a) {
                if (decoder.isInitialized()) {
                    var value = typeof a !== "undefined" ? parseFloat(a.toPrecision(2)) : zoom.value / 10;
                    zoomValue[txt] = zoomValue[txt].split(":")[0] + ": " + value.toString();
                    decoder.options.zoom = value;
                    if (typeof a != "undefined") {
                        zoom.value = a * 10;
                    }
                }
            };
            Page.changeContrast = function () {
                if (decoder.isInitialized()) {
                    var value = contrast.value;
                    contrastValue[txt] = contrastValue[txt].split(":")[0] + ": " + value.toString();
                    decoder.options.contrast = parseFloat(value);
                }
            };
            Page.changeBrightness = function () {
                if (decoder.isInitialized()) {
                    var value = brightness.value;
                    brightnessValue[txt] = brightnessValue[txt].split(":")[0] + ": " + value.toString();
                    decoder.options.brightness = parseFloat(value);
                }
            };
            Page.changeThreshold = function () {
                if (decoder.isInitialized()) {
                    var value = threshold.value;
                    thresholdValue[txt] = thresholdValue[txt].split(":")[0] + ": " + value.toString();
                    decoder.options.threshold = parseFloat(value);
                }
            };
            Page.changeSharpness = function () {
                if (decoder.isInitialized()) {
                    var value = sharpness.checked;
                    if (value) {
                        sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": on";
                        decoder.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
                    } else {
                        sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": off";
                        decoder.options.sharpness = [];
                    }
                }
            };
            Page.changeVertical = function () {
                if (decoder.isInitialized()) {
                    var value = flipVertical.checked;
                    if (value) {
                        flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": on";
                        decoder.options.flipVertical = value;
                    } else {
                        flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": off";
                        decoder.options.flipVertical = value;
                    }
                }
            };
            Page.changeHorizontal = function () {
                if (decoder.isInitialized()) {
                    var value = flipHorizontal.checked;
                    if (value) {
                        flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": on";
                        decoder.options.flipHorizontal = value;
                    } else {
                        flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": off";
                        decoder.options.flipHorizontal = value;
                    }
                }
            };
            Page.changeGrayscale = function () {
                if (decoder.isInitialized()) {
                    var value = grayscale.checked;
                    if (value) {
                        grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": on";
                        decoder.options.grayScale = true;
                    } else {
                        grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": off";
                        decoder.options.grayScale = false;
                    }
                }
            };
            Page.decodeLocalImage = function () {
                if (decoder.isInitialized()) {
                    decoder.decodeLocalImage(imageUrl.value);
                }
                imageUrl.value = null;
            };
            var getZomm = setInterval(function () {
                var a;
                try {
                    a = decoder.getOptimalZoom();
                } catch (e) {
                    a = 0;
                }
                if (!!a && a !== 0) {
                    Page.changeZoom(a);
                    clearInterval(getZomm);
                }
            }, 500);

            function fadeOut(el, v) {
                el.style.opacity = 1;
                (function fade() {
                    if ((el.style.opacity -= 0.1) < v) {
                        el.style.display = "none";
                        el.classList.add("is-hidden");
                    } else {
                        requestAnimationFrame(fade);
                    }
                })();
            }

            function fadeIn(el, v, display) {
                if (el.classList.contains("is-hidden")) {
                    el.classList.remove("is-hidden");
                }
                el.style.opacity = 0;
                el.style.display = display || "block";
                (function fade() {
                    var val = parseFloat(el.style.opacity);
                    if (!((val += 0.1) > v)) {
                        el.style.opacity = val;
                        requestAnimationFrame(fade);
                    }
                })();
            }

            document.querySelector("#camera-select").addEventListener("change", function () {
                if (decoder.isInitialized()) {
                    decoder.stop().play();
                }
            });
        }).call(window.Page = window.Page || {});


        //Trigger Click
        $("document").ready(function () {
            setTimeout(function () {
                $("#play").trigger('click');
            }, 10);
        });
    </script>

@endsection
