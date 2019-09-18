@extends('layouts.layoutindex')
@section('content2')


    <div class="site-section">
        <div class="container">
            <div class="column">
                <strong><h1 align="center">My Orders</h1></strong>
                <br>

                <div class="row">

                    @if(isset($results) && count($results)>0)
                        @foreach($results as $row)
                            <?php
                            $total = 0;
                            if (!empty($row->total)) {
                                $total = $row->total;
                            }
                            ?>
                            <div class="col-sm-6">

                                <table class="table border">
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Total</th>
                                        <th>created_at</th>
                                        <th>status</th>
                                    </tr>
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->type}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>${{$total}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td><span style="padding: 10px; font-size: 14px;"
                                                  class="badge <?php echo $row->status == 'Accept' ? 'badge-success' : 'badge-danger' ?>">{{$row->status}}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>


@endsection
