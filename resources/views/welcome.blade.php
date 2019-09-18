@extends('layouts.layoutweb')
@section('content1')
    <div class="slide-one-item home-slider owl-carousel">

        <div class="site-blocks-cover inner-page" style="background-image: url('web/images/hero_b1_1.jpg');"
             data-aos="fade" data-stellar-background-ratio="0.5">
            <!-- <div class="container"> -->
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">
                    <h1>Welcome To NTU SPARKS</h1>
                    <span class="caption d-block text-white">Find The Healthy Way</span>
                </div>
            </div>
            <!-- </div> -->
        </div>

        <div class="site-blocks-cover inner-page" style="background-image: url('web/images/hero_bg_2.jpg');"
             data-aos="fade" data-stellar-background-ratio="0.5">
            <!-- <div class="container"> -->
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">
                    <h1>Optimize Your Health</h1>
                    <span class="caption d-block text-white">Effective Program</span>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>


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
                                    <p>{{str_limit($new->description, 30, '...')}}</p>
                                    {{--<p><a href="{{url('singleprogram')}}" class="btn btn-primary text-white px-4"><span--}}
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
                <h2 class="site-section-heading text-center">Popular Corporate Classes / Workshops</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">
                    @foreach ($classes as $class)
                        <div class="media-image">
                            <img style="max-height: 230px; min-height: 230px" src="{{asset('storage/'.$class->img.'')}}"
                                 alt="Image" class="img-fluid">
                            <div class="media-image-body">
                                <h2>{{ $class->name }}</h2>
                                <p>{{ str_limit($class->description, 100, '...')}}</p>
                                <p><a href="{{url('singleprogram').'/'.$class->id}}"
                                      class="btn btn-primary text-white px-4"><span class="caption">View Details</span></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-5"><img src="web/images/img_1.jpg" alt="Image" class="img-fluid"></p>
                </div>
                <div class="col-lg-5 ml-auto">
                    <h2 class="site-section-heading mb-3">Employees Loyalty Program</h2>
                    <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ad,
                        tempora incidunt accusantium. Similique magni quaerat beatae illo aliquid. Libero non ipsa nisi,
                        corporis architecto incidunt rem repellendus asperiores numquam!</p>
                    <p style="text-align: justify;" class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Impedit explicabo odio officiis autem minima quibusdam.</p>
                    <p><a href="{{url('signup')}}" class="btn btn-outline-primary py-2 px-4">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.storeincluding')







@endsection
