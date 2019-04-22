@extends('layouts.layoutindex')
@section('content2')


<div class="site-section">
  <div class="container">
    <div class="column">
      <strong><h1 align="center">My Orders</h1></strong>
        <br>

        <table border="0" align="center" style="width:60%">
        <tr style=" border-bottom: 1px solid #ddd ">
        <th><h5>Today, 13 Feb 2019</h5></th>
        <th></th>
       </tr>

        <tr style=" border-bottom: 1px solid #ddd ">
          <td><h4>Yoga class</h4><p>6:00 - 7:00</p></td>
          <td><p><b>-5</b></p></td>
        </tr>

        <tr style=" border-bottom: 1px solid #ddd ">
          <td><h5>Added</h5><p>6:00 pm</p></td>
          <td><p><b>+15</b></p></td>
        </tr>

        </table>




          </div>
      </div>
    </div>
  </div>
</div>


    @endsection
