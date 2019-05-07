@extends('layouts.layoutweb')
@section('content1')


<div class="site-section">
  <div class="container">


   @include('layouts.storeincluding')

    <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-7 text-center">
        <div class="site-block-27" align="center">
        {{ $products->links('vendor.pagination.custom') }}

        </div>
      </div>
    </div>

  </div>
</div>

	@endsection
