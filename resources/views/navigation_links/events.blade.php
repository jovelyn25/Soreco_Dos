@extends('layouts.home')

@section('content')
    <style>
        #calendar {
            max-width: 100%;
        }

        .fc-unthemed td.fc-today {
            background: hsla(151, 81%, 54%, 0.774);
        }

        #calendar .fc-state-hover,
        .fc-state-down,
        .fc-state-active,
        .fc-state-disabled {
            color: white;
            background-color: #f00d0d;
        }

        #calendar .fc-state-hover {
            color: darkslategray;
            text-decoration: none;
            background-position: 0 35px;
            -webkit-transition: background-position 0.1s linear;
            -moz-transition: background-position 0.1s linear;
            -o-transition: background-position 0.1s linear;
            transition: background-position 0.1s linear;
        }

        #calendar .fc-state-active {
            background-color: #f00d0d;
            color: #ffffff;
            background-image: none;
            text-shadow: none;
            font-weight: 500;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(95, 66, 66, 0.05);
        }

        .fc-state-hover,
        .fc-state-down,
        .fc-state-active,
        .fc-state-disabled {
            border-color: #e6e6e6 #e6e6e6 #bfbfbf;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            color: darkslategray;
        }

        #calendar .fc-toolbar.fc-header-toolbar h2 {
            font-size: 35px;
            color: #15c5c4;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.75);

        }

        #calendar .fc-head-container .fc-widget-header {
            font-size: 13px;
        }

        #calendar .fc-view-container {
            font-size: 13px;
        }

        #calendar .fc-event {
            background-color: #f00d0d;
        }

        #calendar .fc .fc-col-header-cell-cushion {
            display: inline-block;
            padding: 2px 4px;
            font-size: 13px;
        }

        #content {
            height: auto;
        }

        .eventcalendar {
            border-radius: 0;
            border: 20px solid #f00d0d;
            -webkit-box-shadow: 0 0 0 1px #dce3ec, 0 8px 16px 0 #dce3ec;
            box-shadow: 0 0 0 1px #dce3ec, 0 8px 16px 0 #dce3ec;
            background: #fff;
            width: 100%;
            padding: 20px;
            margin: 20px 0 20px 0;
        }

        .fc-icon-right-single-arrow:after,
        .fc-icon-left-single-arrow:after {
            font-size: 25px;
            top: -25%;
        }

    </style>


    <div id="content">
        @include('layouts.includes.topnavbar')
        <div class="row no-margin-padding">
            <div class="col-md-12 d-flex flex-row justify-content-between">
                <h3 class="block-title">Manage Events</h3>
            </div>
        </div>

        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="container">
                    <div class="eventcalendar">
                        <div id='calendar' class="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                displayEventTime: true,
                height: 500,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                events: '/events',
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url: "events/action",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Created Successfully");

                            }
                        })
                    }
                },

                editable: true,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "events/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "events/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },

                eventClick: function(event) {
                    if (confirm("Are you sure you want to remove it?")) {
                        var id = event.id;
                        $.ajax({
                            url: "events/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Deleted Successfully");
                            }
                        })
                    }
                }


            });

        });
    </script>
@endsection
