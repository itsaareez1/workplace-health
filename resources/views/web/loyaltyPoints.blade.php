@extends('layouts.layoutindex')
@section('content2')


<div class="site-section">
  <div class="container">
    <div class="column" align="center">
      <strong><h1 align="center">Loyalty Points</h1></strong>
        <br>
         ‎
         <table border="1" BGCOLOR="#0099cc" style="width : 40%">
         <tr>
         <td><h4 align="center">Your current point 100</h4></td>
          </tr>
       </table><br><br>
        <a class="btn btn-lg btn-primary" href="{{ url('gift-store')}}">Redeem Now</a>


      <!--  <button class="btn btn-outline-primary py-2 px-4" onclick="JSalert();">Redeem Now</button><hr>-->



          <!-- Trigger the modal with a button -->
 <!-- 
          <button type="button" class="btn  text-white px-4 py-2" style="background-color: #008CBA;"  data-toggle="modal" data-target="#myModal">Redeem Now</button><hr>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">

              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <center><h2>Redeem Now</h2></center>

                  <center><button type="button" class="btn btn-info btn-circle"><i class="fa fa-minus"></i></button>&ensp; &ensp; &ensp;
                  <span><FONT SIZE="5">‎30</font></span>&ensp; &ensp; &ensp;
                  <button type="button" class="btn btn-info btn-circle"><i class="fa fa-plus"></i></button></center>
                    <center><h4>01 Credit</h4></center>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info btn-lg" data-dismiss="modal" onclick="JSalert();">Apply NoW</button>
                </div>
              </div>

            </div>
          </div>

-->








<br><br><br>

                <table border="0"  style="width:50%">
                <tr>
                <th><h4>Transactions</h4></th>
                <th></th>
               </tr>

                <tr>
                  <td><p>Yoga</p></td>
                  <td><p>10p</p></td>
                </tr>

                <tr>
                  <td><p>Towel</p></td>
                  <td><p>10p</p></td>
                </tr>

                <tr>
                  <td><p>zumba </p></td>
                  <td><p>10p</p></td>
                </tr>

                </table>


          </div>
      </div>
    </div>
  </div>
</div>


    @endsection
