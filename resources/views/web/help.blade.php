@extends('layouts.layoutindex')
@section('content2')


    <div class="site-section" style="height: 1000px;">

        <div class="container">
            <div class="column">
                <strong><h1 align="center">FAQs</h1></strong>
                <br><br>
                <div class="panel-group" id="accordion">

                    @foreach ($results as $result)
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: lightgray; padding: 10px;">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{ $result-> id }}"><b>{{ $result-> questions}}</b></a>
                                </h4>
                            </div>
                            <div id="collapse{{ $result->id }}" class="panel-collapse collapse in" style="padding: 10px; border: 1px solid lightgray;">
                                <div class="panel-body">{{ $result->answer }}</div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
    </div>


@endsection
