@extends('layouts.layoutindex')
@section('content2')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 ">
					<span class="login100-form-title p-b-70">
						QR SCAN CODE FOR ATTENDANCE
					</span><br/>


                <div class="visible-print text-center">

                    {{--                    @if (session()->has('status'))--}}
                    @if (isset($status))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert action-alert action-alert--danger has-btn alert-success" role="alert">
                                      <span class="action-alert__message">
                                      {{--<span class="action-alert__action-message">{{ session()->get('status') }} </span>--}}
                                          <span class="action-alert__action-message">{{ $status }} </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="post" action="{{url('new-qrcode')}}">
                        <?php
                        if (empty($result->QRpassword)) {
                            echo '<h4>Admin is not assigned your QR CODE <br>When admin will assign then show here your QR code!</h4>';
//                            echo '<button type="submit" id="autogenerate_qr" class="btn btn-primary">Create QR Code</button>';
                        } else {
                        ?>

                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($result->QRpassword)) !!} ">
                        {{--<button type="submit" id="autogenerate_qr" class="btn btn-primary">Change New</button>--}}
                        <?php
                        }
                        ?>

                    </form>

                {{--<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate($result->QRpassword)) !!} ">--}}
                {{--<p> This is your qr code , Download it into your mobile</p>--}}

                {{--{!! QrCode::size(250)->generate('ItSolutionStuff.com'); !!}--}}
                {{--<img src="  data:image/png;base64, {!! base64_encode(QrCode::size(250)->generate('ItSolutionStuff.com')) !!}">--}}
                {{--                    <img style="width: 100px; height: 100px" src="{{asset('/qrcode_img/9423556.png')}}">--}}


                <!-- qr code  -->
                {{--<div class=" text-center">--}}
                {{--@if(Sentinel::getUser()->QRpassword)--}}
                {{--<img src="  data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->generate(Sentinel::getUser()->QRpassword)) !!} ">--}}
                {{--<p> This is your qr code , Download it into your mobile</p>--}}
                {{--@endif--}}
                {{--<button type="submit" id="autogenerate_qr" class="btn btn-primary">Change Now</button>--}}
                {{--</div>--}}

                <!--   end qr code -->

                </div>


            </div>
        </div>
    </div>
@endsection

<script>
    //Delete Items
    {{--$('#autogenerate_qr').click(function () {--}}
    {{--if (confirm('Are you sure you want to generate the qe code')) {--}}

    {{--$.ajax({--}}
    {{--type: "POST",--}}
    {{--cache: false,--}}
    {{--url: "{{action('QrController@QrAutoGenerate')}}",--}}
    {{--data: {action: 'updateqr'},--}}
    {{--success: function (data) {--}}
    {{--if (data == 1) {--}}
    {{--location.reload();--}}
    {{--} else {--}}
    {{--alert('Ups error :P ');--}}
    {{--}--}}
    {{--}--}}
    {{--})--}}


    {{--} else {--}}
    {{--return false;--}}
    {{--}--}}
    {{--});--}}
    //end qr autogenerated
</script>