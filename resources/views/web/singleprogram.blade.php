@extends('layouts.layoutweb')
@section('content1')


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="mb-5"><img src="web/images/img_1.jpg" alt="Image" class="img-fluid"></p>
      </div>
      <div class="col-lg-5 ml-auto">
        <h1 class="site-section-heading mb-3">Hip Hop</h1>
        <h6>Credits : 50</h6>
        <h6>Level : open level</h6>
        <h6>Durayion : 3 Months</h6>
        <h6>Category : style of dance</h6>

        <h6>Class Timing :  7:00-8:00</h6>
        <h5>Venue : </h5><p>The Wave</p>
        <h5>About : </h5>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam.</p>


                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn btn-primary text-white px-4" data-toggle="modal" data-target="#myModal">Reserve class</button><hr>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                          <center><h1>Hip Hop</h1></center>
                          <center><h5>The Wave</h5></center>
                          <center><h4>Monday,22 Feb</h4></center>
                          <center><h4>7:00 - 8:00</h4></center>
                          <center><h1>05</h1></center>
                          <center><h3>Credit</h3></center>

        <center><button type="button" class="btn btn-primary text-white px-4" data-dismiss="modal" onclick="JSalert1();">Confirm Reservation</button></center>

                        </div>

                      </div>

                    </div>
                  </div>





          </div>

      </div>
    </div>
  </div>
</div>


    @endsection
