@extends('layouts.layoutindex')
@section('content2')


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="mb-5"><img src="web/images/img_1.jpg" alt="Image" class="img-fluid"></p>
      </div>
      <div class="col-lg-5 ml-auto">
        <h1 class="site-section-heading mb-3">Hartha Yoga</h1>
        <h6>Saturday : 22 Feb, 5:00-6:00</h6>
        <h6>Durayion : 3 Months</h6>
        <h6>Level : open level</h6>
        <h6>program : Yoga</h6>
        <h5>Classes Attended : </h5><p>18 out of 25</p>
        <h5>Venue : </h5><p>The Wave</p>
        <h5>About : </h5>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit explicabo odio officiis autem minima quibusdam.</p>
        <h5>When To Arrive</h5><p>15 Minutes befoe</p>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Attendance</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="padding: 50px;">


    <div class="panel">
        <h3 style="text-align:center;" class="panel-primary" id="monthAndYear"></h3><br>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

            <button class="btn btn-primary col-sm-6" id="next" onclick="next()">Next</button>
        </div>
<br>
        <div class="form-inline">
            <div style="width: 20px; height: 20px; border-radius: 50%; background-color: green;"></div><span>&nbsp;&nbsp; Classes Attended</span>
            <span style="width:35%"></span>
            <div style="width: 20px; height: 20px; border-radius: 50%; background-color: red;"></div><span>&nbsp;&nbsp; Absent</span>

        </div>

        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
            <option value=1990>1990</option>
            <option value=1991>1991</option>
            <option value=1992>1992</option>
            <option value=1993>1993</option>
            <option value=1994>1994</option>
            <option value=1995>1995</option>
            <option value=1996>1996</option>
            <option value=1997>1997</option>
            <option value=1998>1998</option>
            <option value=1999>1999</option>
            <option value=2000>2000</option>
            <option value=2001>2001</option>
            <option value=2002>2002</option>
            <option value=2003>2003</option>
            <option value=2004>2004</option>
            <option value=2005>2005</option>
            <option value=2006>2006</option>
            <option value=2007>2007</option>
            <option value=2008>2008</option>
            <option value=2009>2009</option>
            <option value=2010>2010</option>
            <option value=2011>2011</option>
            <option value=2012>2012</option>
            <option value=2013>2013</option>
            <option value=2014>2014</option>
            <option value=2015>2015</option>
            <option value=2016>2016</option>
            <option value=2017>2017</option>
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
            <option value=2022>2022</option>
            <option value=2023>2023</option>
            <option value=2024>2024</option>
            <option value=2025>2025</option>
            <option value=2026>2026</option>
            <option value=2027>2027</option>
            <option value=2028>2028</option>
            <option value=2029>2029</option>
            <option value=2030>2030</option>
        </select></form>
    </div>
  
      <script src="{{asset('/web/js/cal.js')}}"></script>    
    </div>

  </div>
</div>

        <button type="button" class="btn btn-primary text-white px-4" >Mark Attendance</button><br><br>

      <p><span class="txt1">Do you want to cancel the class?</span>
        <a href="#" class="txt2" onclick="JSalert1();">Here</a></p>

          </div>
      </div>
    </div>
  </div>
</div>


    @endsection
