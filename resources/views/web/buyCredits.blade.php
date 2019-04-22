@extends('layouts.layoutindex')
@section('content2')


<div class="site-section">
  <div class="container">
    <div class="column">
      <strong><h1 align="center">Buy Credits</h1></strong>
        <br>
         ‎
         <table border="1" BGCOLOR="#0099cc">
         <tr>
         <td><h4>Your current Credits &nbsp; &nbsp; $25</h4></td>
          </tr>
       </table><br><br>
        <h4>Plan Detais</h4>
        <p>The Monthly plan with this one-time addition. If you don't use allof your credits. Up to 10 credits will automatically roll over your next month. </p>
<p><a href="{{url('paymentMethod')}}" class="btn btn-outline-primary py-2 px-4">Buy 5-credit pack  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $5</a></p><hr>
<p><a href="{{url('paymentMethod')}}" class="btn btn-outline-primary py-2 px-4">Buy 10-credit pack  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $15</a></p><hr>
<p><a href="{{url('paymentMethod')}}" class="btn btn-outline-primary py-2 px-4">Buy 20-credit pack  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $20</a></p><hr>
<p><a href="{{url('paymentMethod')}}" class="btn btn-outline-primary py-2 px-4">Buy 40-credit pack  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $40</a></p><hr>

          </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.storeincluding')


    @endsection
