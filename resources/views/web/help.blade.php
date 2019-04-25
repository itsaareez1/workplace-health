@extends('layouts.layoutindex')
@section('content2')


<div class="site-section" style="height: 1000px;">
  <div class="container">
    <div class="column">
      <strong><h1 align="center">FAQs</h1></strong>
      <div class="panel-group" id="accordion">

@foreach ($results as $result)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $result-> id }}">
        {{ $result-> questions}}</a>
      </h4>
    </div>
    <div id="collapse{{ $result->id }}" class="panel-collapse collapse in">
      <div class="panel-body">{{ $result->answer }}</div>
    </div>
  </div>
@endforeach
  </div>
</div>



          </div>
      </div>
    </div>
  </div>
</div>


    @endsection
