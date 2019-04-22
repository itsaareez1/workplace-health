@extends('layouts.layoutindex')
@section('content2')


<div class="site-section" style="min-height: 600px">
  <div class="container">
    <div class="column" style="padding: 5px;">
      <strong><h1 align="center">History</h1></strong>
        <br>

<div class="tab"  style="padding: 5px;">
  <button class="tablinks" onclick="openCity(event, 'Classes')" id="defaultOpen">Classes</button>
  <button class="tablinks" onclick="openCity(event, 'Orders')">Orders</button>
</div>

<div id="Classes" class="tabcontent" style="overflow: hidden;">
  <img align="left" src="web/images/yoga.jpg" style="padding : 12px">
  <br>
  <h5>Yoga class</h5>
  <h6>Placed On:01-04-2019 &nbsp; 13:06:40</h6>
  <h6>STATUS : <span style="color: green;"> Finished</span></h6>
  <br><br><br>
  <img align="left" src="web/images/yoga.jpg" style="padding : 12px">
  <br>
  <h5>Yoga class</h5>
  <h6>Placed On:01-04-2019 &nbsp; 13:06:40</h6>
  <h6>STATUS : <span style="color: red;"> Continue</span></h6>

</div>
<div id="Orders" class="tabcontent"  style="overflow: hidden;">
<img align="left" src="web/images/yoga.jpg" style="padding : 12px">
  <br>
  <h5>Order: Yoga Class`</h5>
  <h6>Placed On:01-04-2019 &nbsp; 13:06:40</h6>
  <h6>STATUS : <span style="color: green;"> Processed</span></h6>
</div>

        </div>
      </div>
    </div>
  </div>
</div>


    @endsection
