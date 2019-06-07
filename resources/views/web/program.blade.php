@extends('layouts.layoutweb')
@section('content1')

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <h2 class="site-section-heading text-center">Programs</h2>
      </div>
    </div>
    <div class="row">
    @foreach ($programs as $program)
      <div class="col-md-4 text-center mb-4">
        <div class="border p-4 text-with-icon">
          <span class="flaticon-weightlifting icon display-4 mb-4 d-block text-primary"></span>
          <h2 class="h5">{{$program->name}}</h2>

          <table  align="center" >
            @foreach ($classes as $class)
                @if ($program->id == $class->program_id)
            <tr><td><a href="{{url('singleprogram').'/'.$class->id}}" style="color: #808080 ">
              <table style=" border-bottom: 1px solid #ddd ">
                <tr>
                  <td><b>7:00</b></td>
                  <td><b>{{ $class->name }}</b></td>
               </tr>
               <tr>
                 <td>45 min</td>
                 <td>Venue - The Wave sports  &nbsp; slots - 15/30</td>
              </tr>
            </table></a></td>
            </tr>
            @endif
            @endforeach
          </table>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>


	@endsection
