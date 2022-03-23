@extends('layouts.home')
@section('content')

    <style>
        .fc .fc-toolbar>*> :first-child {
            font-size: small;
        }

        .fc-toolbar.fc-header-toolbar h2 {
            font-weight: 900;
            color: #f00d0d;
            margin-right: 10px;
        }

    </style>

    <div id="content" style="height: auto;">
        @include('layouts.includes.topnavbar')

        <div class="row no-margin-padding">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="block-title">Dashboard</h3>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row counter-row">
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <div class="counter d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-nurse"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <div class="counter d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"
                                style="border-color: #f00d0d">
                                <i class="fas fa-user-alt" style="color: #f00d0d"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <div class="counter d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center" style="border-color:gold">
                                <i class="fas fa-users" style="color: gold;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row d-flex">
                <div class="col-md-8">
                    <div class="dashboarditem container">
                        <canvas class="ms-4" id="myChart" height="200"></canvas>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="dashboarditem container">
                        <div class="calendar2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@section('scripts')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('.calendar2').fullCalendar({
                height: 400,
                defaultView: 'listWeek',
                events: '/events',
                header: true,
                views: {
                    listDay: {
                        buttonText: 'DAY'
                    },
                    listWeek: {
                        buttonText: 'WEEK'
                    },
                    listMonth: {
                        buttonText: 'MONTH'
                    }
                },

                header: {
                    left: 'title',
                    center: '',
                    right: 'listDay,listWeek,listMonth'
                },
            });

        });
    </script>
@endsection
