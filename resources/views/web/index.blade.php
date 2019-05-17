@extends('layouts.layoutindex')
@section('content2')
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center">News</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">
            @foreach ($news as $new)
              <div class="media-image">
                <img style="max-height: 230px; min-height: 230px" src="{{asset('storage/'.$new->img.'')}}" alt="Image" class="img-fluid">
                <div class="media-image-body">
                  <h2>{{ $new->title }}</h2>
                  <p>{{str_limit($new->description, 30, '...')}}</p><br/>
                  <p><a href="{{url('singleclass')}}" class="btn btn-primary text-white px-4"><span class="caption">Read More</span></a></p>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>



          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="site-section-heading text-center">My Classes</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">
                  <div class="media-image">
                    <img src="web/images/img_1.jpg" alt="Image" class="img-fluid">
                    <div class="media-image-body">
                      <h2>Body Building</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                      <p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a></p>
                    </div>
                  </div>
                  <div class="media-image">
                    <img src="web/images/img_2.jpg" alt="Image" class="img-fluid">
                    <div class="media-image-body">
                      <h2>Body Combat</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                      <p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a></p>
                    </div>
                  </div>
                  <div class="media-image">
                    <img src="web/images/img_3.jpg" alt="Image" class="img-fluid">
                    <div class="media-image-body">
                      <h2>Push Up</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                      <p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a></p>
                    </div>
                  </div>
                  <div class="media-image">
                    <img src="web/images/img_4.jpg" alt="Image" class="img-fluid">
                    <div class="media-image-body">
                      <h2>Weight Lifting</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                      <p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a></p>
                    </div>
                  </div>
                  <div class="media-image">
                    <img src="web/images/img_5.jpg" alt="Image" class="img-fluid">
                    <div class="media-image-body">
                      <h2>Body Combat</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                      <p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a></p>
                    </div>
                  </div>
                  <div class="media-image">
                    <img src="web/images/img_6.jpg" alt="Image" class="img-fluid">
                    <div class="media-image-body">
                      <h2>Body Combat</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                      <p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@include('layouts.storeincluding')



	@endsection
