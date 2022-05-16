<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images\logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>SORECO II</title>
</head>

<body>


    <div class="container-fluid p-0" id="mreport">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class href="PsiSchedule"><i class="fas fa-arrow-left" style="color: #ffff;"></i></a>

                <p class="fw-bold m-0 p-0 report-title" style="color: #ffff;">NOTICE OF POWER SERVICE INTERRUPTION
                </p>
                {{-- <button id="MARbtnPrint" type="button" class="btn btn-primary"><i class="fas fa-print"></i> PRINT</button> --}}
                <button onclick="printpage()"><i class="fas fa-print"></i> PRINT</button>
                {{-- <input type="submit" name="SendEmail" value="Send" class="'btn btn-info"> --}}

            </div>
        </nav>

        {{-- I added some --}}


        <div class="col-md-12 p-0" id="notice">
            <div class="d-flex justify-content-center flex-column mar-report">
                {{-- <img class="soreco-logo" src="{{ asset('images/logo.png') }} "
                    style="width:180px; height:120px; object-fit:cover; display:block;"> --}}
                <p class="text-center fw-bold">SORSOGON II ELECTRIC COOPERATIVE</p>
                <p class="text-center fw-bold">(SORECO II)</p>
                <p class="text-center fw-bold">"Owned By Those It Serves"</p>
                <p class="text-center">Brgy.Buhatan, East District, Sorsogon City</p>
                <p class="text-center">Sorsogon</p><br>
                <p class="text-center fw-bold">NOTICE OF POWER SERVICE INTERRUPTION</p><br><br>
                <p class="fw-bold">To all concerned SORECO II Member Consumers;</p>
                <p class="fw-bold">Please be informed that we are scheduling a POWER SERVICE
                    INTERRUPTION in your area with the
                    following details:</p>

                {{-- <form  id="table-mar" class="d-flex justify-content-center mt-4" action="{{ route('PsiSchedule.') }}" method="POST"> --}}
                {{-- action="{{ route('PsiSchedule.generatenotice') }}" --}}
                <form id="table-mar" class="d-flex justify-content-center mt-4 "
                    action="{{ route('PsiSchedule.show', 'id') }}" method="GET">
                    @csrf
                    {{-- method="GET">
                    @csrf --}}
                    {{-- <form id="table-mar" class="d
                    -flex justify-content-center mt-4"> --}}
                    <table style="width: 80%;" class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                {{-- <th style="width: 10%">ID</th> --}}
                                <th style=" width: 20%">DAY/DATE</th>
                                <th style=" width: 10%">TIME</th>
                                <th style=" width: 35%">AFFECTED AREAS</th>
                                <th style=" width: 25%">REASONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($psischedule)
                                @foreach ($psischedule as $psischedule)
                                    <tr>

                                        {{-- <td class="text-center" name="notice_areas" id="notice_areas" type="text">{{ $psischedule->id }}</td> --}}
                                        <td class="text-center" name="notice_date" id="notice_date" type="text">
                                            {{ $psischedule->notice_date }}
                                        </td>
                                        <td class="text-center" name="notice_time" id="notice_time" type="text">
                                            {{ $psischedule->notice_time }}
                                        </td>
                                        <td class="text-center" name="notice_areas" id="notice_areas" type="text">
                                            {{ $psischedule->notice_areas }}
                                        </td>
                                        <td class="text-center" name="notice_reasons" id="notice_reasons"
                                            type="text">
                                            {{ $psischedule->notice_reasons }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </form>
                <p class="fw-bold">ATTENTION!</p>
                <p class="fw-bold">All works may be completed ahead of time. Electric power may
                    be restored earlier as scheduled. Please be consider our lines always energized.</p><br>
                <p class="fw-bold">NOTE:</p>
                <p class="fw-bold">MSD to furnish all Radio Stations, the Provincial Information
                    Office, the BOD, MSEAC, LGU official channels, Big Load and the General Public with this
                    notice.</p>
                <br>

                <div class="signature-by ms-4">

                    {{-- <div class="d-flex flex-grid bhw-signature">
                    <div class="submitted-by">
                        <input type="text" name="med" id="med" value="{{ Carbon\Carbon::now()->format('M-d-Y') }}">
                        <hr style="margin: 0">
                        <p class="fw-bold worker-type">Date Requested</p>
                    </div>
                </div> --}}
                    <div class="d-flex flex-grid noted-by justify-content-center ">
                        <div class="noted-sign-cap">
                            <p class="submitted-worker">Prepared by:</p>
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name="" value="">
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name="" value="">

                            {{-- <p class="fw-bold worker-type">Line Engineer</p> --}}
                        </div>

                        <div class="noted-sign-cap">
                            <p class="submitted-worker">Noted by:</p>
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name="" value="">
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name="" value="">
                            {{-- <p class="fw-bold worker-type">TSD Manager</p> --}}
                        </div>
                    </div>
                    <br>
                    <div class="d-flex flex-grid noted-by justify-content-center">
                        <div class="noted-sign-cap">
                            <p class="submitted-worker">Recommending Approval:</p>
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name=""
                                value="MS. CLEMEN LICUP">
                            <p class="fw-bold worker-type">PSP & ET Div. Supvr.</p>
                        </div>

                        <div class="noted-sign-cap">
                            <p class="submitted-worker"></p>
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name=""
                                value="MS. SHERYL A. YANESA">
                            <p class="fw-bold worker-type">CPD Manager</p>
                        </div>
                    </div>
                    <div class="d-flex flex-grid noted-by justify-content-center">
                        <div class="noted-sign-cap">
                            <p class="submitted-worker">Approved by:</p>
                            <input type="text" class="sub-name me-5 fw-bold worker-type" name=""
                                value="ENGR. JOSEF ERWIN R. TABUENA">
                            <p class="fw-bold worker-type">General Manager</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function printpage() {
                    window.print();
                }
            </script>

</body>

</html>
