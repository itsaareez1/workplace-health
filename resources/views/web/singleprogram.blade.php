@extends('layouts.layoutweb')
@section('content1')


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="mb-5"><img src="{{asset('storage/'.$class->img.'')}}" alt="Image" class="img-fluid"></p>
      </div>
      <div class="col-lg-5 ml-auto">
        <h1 class="site-section-heading mb-3">{{ $class->name }}</h1>
        <h6>Credits : {{ $class->credits }}</h6>
        <h6>Level : {{ $class->level }}</h6>
        <h6>Duration : {{ $class->duration }}</h6>
        <h6>Category : {{ $class->category }}</h6>

        <h6>Class Timing :  {{ $class->time}}</h6>
        <h5>Venue : </h5><p>{{ $class->venue }}</p>
        <h5>About : </h5>
        <p class="mb-4">{{ $class->description}} </p>


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
                          <center><h1>{{ $class->name }}</h1></center>
                          <center><h5>{{ $class->venue }}</h5></center>
                          <center><h4>Monday,22 Feb</h4></center>
                          <center><h4>{{ $class->time}}</h4></center>
                          <center><h1>{{ $class->credits }}</h1></center>
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
