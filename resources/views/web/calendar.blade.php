@extends('layouts.layoutindex2')
@section('content2')


    <?php
    $current_date = date("Y-m-d");
    //    print_r($results);
    ?>
    <style>
        #calendar {
            max-width: 900px;
            margin: 50px auto;
        }
    </style>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 " style="width: auto">
					<span class="login100-form-title p-b-70">
						Attendance History Calendar
					</span>
                <br/>

                @if (session()->has('status'))
                    <div class="row" style="color:green">
                        <div class="col-lg-12">
                            <div class="alert action-alert action-alert--danger has-btn" role="alert">
                                  <span class="action-alert__message">
                                    <span class="action-alert__action-message">{{ session()->get('status') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                <?php

                if (isset($results) && count($results) > 0) {
                    foreach ($results as $row) {
                        if ($row->current_date != NULL) {
                            echo $row->id;
                        }
                    }
                }
                ?>


                <div class="wrap-input100 validate-input m-b-26">


                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </div>


@endsection

<link href='{{asset('fullcalendar/fullcalendar.min.css')}}' rel='stylesheet'/>
<link href='{{asset('fullcalendar/fullcalendar.print.min.css')}}' rel='stylesheet' media='print'/>
<script src='{{asset('fullcalendar/lib/moment.min.js')}}'></script>
<script src='{{asset('fullcalendar/lib/jquery.min.js')}}'></script>
<script src='{{asset('fullcalendar/fullcalendar.min.js')}}'></script>
<script>

    $(document).ready(function () {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '<?php echo $current_date ?>',
            navLinks: true, // can click day/week names to navigate views

            weekNumbers: true,
            weekNumbersWithinDays: true,
            weekNumberCalculation: 'ISO',

            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [

                    <?php
                    if (isset($results) && count($results) > 0) {
                    foreach ($results as $row) {

                    $origDate = $row->date;
                    $newDate = date("Y-m-d", strtotime($origDate));
                    if ($row->current_date != NULL) {

                    ?>
                {
                    color: 'green',
                    title: '(<?php echo $row->name; ?>)\n Present',
                    start: '<?php echo $newDate; ?>'
                },
                    <?php
                    }else {
                    ?>

                {
                    color: 'red',
                    title: '(<?php echo $row->name; ?>)\n Absent',
                    start: '<?php echo $newDate; ?>'
                },
                <?php
                }
                }
                }
                ?>
                // {
                //     title: 'All Day Event',
                //     start: '2019-01-01'
                // },
                // {
                //     title: 'Long Event',
                //     start: '2019-01-07',
                //     end: '2019-01-10'
                // },
                // {
                //     id: 999,
                //     title: 'Repeating Event',
                //     start: '2019-01-09T16:00:00'
                // },
                // {
                //     id: 999,
                //     title: 'Repeating Event',
                //     start: '2019-01-16T16:00:00'
                // },
                // {
                //     title: 'Conference',
                //     start: '2019-01-11',
                //     end: '2019-01-13'
                // },
                // {
                //     title: 'Meeting',
                //     start: '2019-01-12T10:30:00',
                //     end: '2019-01-12T12:30:00'
                // },
                // {
                //     title: 'Lunch',
                //     start: '2019-01-12T12:00:00'
                // },
                // {
                //     title: 'Meeting',
                //     start: '2019-01-12T14:30:00'
                // },
                // {
                //     title: 'Happy Hour',
                //     start: '2019-01-12T17:30:00'
                // },
                // {
                //     title: 'Dinner',
                //     start: '2019-01-12T20:00:00'
                // },
                // {
                //     title: 'Birthday Party',
                //     start: '2019-01-13T07:00:00'
                // },
                // {
                //     title: 'Click for Google',
                //     url: 'http://google.com/',
                //     start: '2019-01-28'
                // }
            ]
        });

    });

</script>

