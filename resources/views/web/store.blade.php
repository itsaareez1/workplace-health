@extends('layouts.layoutweb')
@section('content1')


<div class="site-section">
  <div class="container">


   @include('layouts.storeincluding')

    <div class="row">
      <div class="col-md-12 text-center">
        <div class="site-block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

	@endsection
