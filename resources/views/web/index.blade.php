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
                                <img style="max-height: 230px; min-height: 230px"
                                     src="{{asset('storage/'.$new->img.'')}}" alt="Image" class="img-fluid">
                                <div class="media-image-body">
                                    <h2>{{ $new->title }}</h2>
                                    <p>{{str_limit($new->description, 30, '...')}}</p><br/>
                                    {{--<p><a href="{{url('single-news/'.$new->id)}}" class="btn btn-primary text-white px-4"><span--}}
                                                    {{--class="caption">Read More</span></a></p>--}}
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
                <h2 class="site-section-heading text-center">Upcoming Events</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">
                    @foreach ($programs as $program)
                        <div class="media-image">
                            {{--web/images/img_1.jpg--}}
                            <img src="{{asset('storage')}}/{{$program->img}}" style="height: 200px" alt="Image" class="img-fluid">
                            <div class="media-image-body">
                                <h2>{{ $program->name }}</h2>
                                <p>{{ $program->description }}</p><br/>
                                <p><a href="{{url('singleprogram').'/'.$program->id}}"
                                      class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layouts.storeincluding')



@endsection
