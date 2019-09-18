@extends('layouts.layoutweb')
@section('content1')


    <div class="site-section">
        <div class="container">
            {{--<div class="column">--}}
                {{--<strong><h1 align="center">Loyalty Programme</h1></strong>--}}
                {{--<br>--}}
                {{--<p style="text-align: justify;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit--}}
                    {{--explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing--}}
                    {{--elit. Impedit explicabo odio officiis autem minima quibusdamLorem ipsum dolor sit amet, consectetur--}}
                    {{--adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet,--}}
                    {{--consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam--}}
                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem--}}
                    {{--minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio--}}
                    {{--officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit--}}
                    {{--explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing--}}
                    {{--elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur--}}
                    {{--adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet,--}}
                    {{--consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum--}}
                    {{--dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam--}}
                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem--}}
                    {{--minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio--}}
                    {{--officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit--}}
                    {{--explicabo odio officiis autem minima quibusdam--}}
                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem--}}
                    {{--minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio--}}
                    {{--officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit--}}
                    {{--explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing--}}
                    {{--elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur--}}
                    {{--adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum dolor sit amet,--}}
                    {{--consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam Lorem ipsum--}}
                    {{--dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam--}}
                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem--}}
                    {{--minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio--}}
                    {{--officiis autem minima quibusdam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit--}}
                    {{--explicabo odio officiis autem minima quibusdam--}}
                {{--</p>--}}
            {{--</div>--}}



            @include('layouts.gift')


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
    </div>
    </div>


@endsection
