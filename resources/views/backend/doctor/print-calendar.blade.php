<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Doctor Dashboard</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <style>
        #loader {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        #wrapperDiv {
    /* Your existing desktop styles go here */

    /* Mobile-specific styles */
    @media only screen and (max-width: 767px) {
        /* Adjust the styles for mobile view */
        width: 100%; /* Set width to 100% to take the full width on mobile */
        margin: 0;   /* Remove any margins on mobile */
    }
}

    </style>
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .highlight-date {
            position: relative;
            background-color: yellow;
            border-radius: 50%;
            width: 25px;
            /* Adjust the width as needed */
            height: 25px;
            /* Adjust the height as needed */
            line-height: 25px;
            /* Adjust the line-height as needed */
        }

        .highlight-date-birth {
            position: relative;
            background-color: yellow;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            line-height: 25px;
        }

        .highlight-date-anniversary {
            position: relative;
            background-color: yellow;
            /* Adjust the color for marriage anniversary */
            border-radius: 50%;
            width: 25px;
            height: 25px;
            line-height: 25px;
        }

        .marriage_wish {
            margin-top: -5px;
            margin-bottom: 1rem;
        }
    </style>

</head>

<body>


    <div id="wrapperDiv">
        {{-- div start april  --}}
        <div id="calendarDiv"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->april_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarData !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 04)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 04)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one" class="btn btn-success mx-auto">Download PDF April</button>
        </div>


        {{-- may div start --}}

        <div id="calendarDiv_may"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->may_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDataMay !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 05)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 05)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-may" class="btn btn-success mx-auto">Download PDF May</button>
        </div>
        {{-- may div end  --}}



        {{-- june div start  --}}
        <div id="calendarDiv_june"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->june_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDatajune !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 06)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 06)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-june" class="btn btn-success mx-auto">Download PDF June</button>
        </div>
        {{-- june div end  --}}




        {{-- div july start  --}}

        <div id="calendarDiv_july"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->july_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDatajuly !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 07)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 07)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-july" class="btn btn-success mx-auto">Download PDF July</button>
        </div>

        {{-- div july End --}}



        {{-- aug div start  --}}


        <div id="calendarDiv_august"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->august_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDataMayaugust !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 8)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 8)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-august" class="btn btn-success mx-auto">Download PDF
                August</button></div>
        {{-- aug div end  --}}






        {{-- september div start  --}}

        <div id="calendarDiv_september"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->september_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDataMayseptember !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 9)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 9)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-september" class="btn btn-success mx-auto">Download PDF
                September</button></div>
        {{-- september div end  --}}




        {{-- october div start  --}}
        <div id="calendarDiv_october"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->october_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDataMayoctober !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 10)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 10)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-october" class="btn btn-success mx-auto">Download PDF
                October</button></div>
        {{-- october div end --}}


        {{-- november div start  --}}

        <div id="calendarDiv_november"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->november_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDataMaynovember !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 11)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 11)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-november" class="btn btn-success mx-auto">Download PDF
                November</button></div>
        {{-- november div end  --}}



        {{-- december div start  --}}

        <div id="calendarDiv_december"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->december_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDataMaydecember !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 12)
                            <p style="color:#000080;"><b><i>Happy Birthday </i></b></p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 12)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-december" class="btn btn-success mx-auto">Download PDF
                December</button></div>
        {{-- december div end  --}}




        {{-- january div start  --}}
        <div id="calendarDiv_january"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->january_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDatajanuary !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 01)
                            <p style="color:#000080;"><b><i>Happy Birthday
                                    </i></b>
                            </p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 01)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-january" class="btn btn-success mx-auto">Download PDF
                January</button></div>
        {{-- january div end  --}}


        {{-- february div start  --}}

        <div id="calendarDiv_february"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->february_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDatafebruary !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 02)
                            <p style="color:#000080;"><b><i>Happy Birthday</i></b>
                            </p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 02)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary </i></b></p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-february" class="btn btn-success mx-auto">Download PDF
                February</button></div>
        {{-- february div end  --}}


        {{-- march div start  --}}

        <div id="calendarDiv_march"
            style="width: 8.5in; height: 5.5in; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div class="doctorphoto" style="width: 50%; height: 100%; float: left; padding: 0mm;">
                    <img id="photo" src="{{ asset($doctordetails->march_photo) }}" alt="Passport Photo"
                        style="width: 4.2in; height: 100%;">
                </div>
                <div style="width: 50%; height: 100%; padding: 0mm; position: relative;">
                    <div style="text-align: right; margin-right: 10.17mm;">
                        <img src="{{ asset('assets/images/top_calendar.png') }}" alt="" class="img-fluid"
                            width="70px" height="100px" />
                    </div>

                    <main style="margin-top: 20px;">
                        <div id="calendar-container">
                            {!! $calendarDatamarch !!}
                        </div>
                    </main>

                    <div style="text-align: right; margin-right: 6.09mm;" class="mt-2">
                        <img src="{{ asset('assets/images/bottom_calendar.png') }}" alt="" class="img-fluid"
                            width="320px" />
                    </div>

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === 03)
                            <p style="color:#000080;"><b><i>Happy Birthday
                                    </i></b>
                            </p>
                        @endif
                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === 03)
                            <p style="color:#000080;" class="marriage_wish"><b><i>Marriage Anniversary
                                    </i></b>
                            </p>
                        @endif
                        <!-- Rotated Text -->
                        <div style="position: absolute; bottom: 0; right: 0;">
                            <span
                                style="display: inline-block;transform: rotate(270deg);text-align: right;margin-right: 3mm;margin-bottom: 31px;font-size: 4px;">{{ $doctordetails->calendar_id }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center"><button id="btn-one-march" class="btn btn-success mx-auto">Download PDF
                March</button>
        </div>
        {{-- march div end  --}}

        <div class="col-12 text-center">
            @if (Auth::guard('admin')->user()->role === 'admin')
                <div class="mt-2 mb-2 text-center">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-success mx-auto">Back</a>
                </div>
            @else
                <div class="mt-2 mb-2 text-center">
                    <a href="{{ route('mr-dashboard.index') }}" class="btn btn-success mx-auto">Back</a>
                </div>
            @endif

           {{-- <a href="{{ Route('download.calendar.pdf')}}">Download All</a> --}}
       
        </div>

        <!-- Loader element -->
        <div id="loader"></div>


    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // Pass the registration number and employee ID to the JavaScript variables
        var employeeId = "{{ $doctordetails->calendar_id }}";
        var employeeName = "{{ Auth::guard('admin')->user()->name }}";
        var doctorName = "{{ $doctordetails->name }}";
        // If employee ID is null, use the employee name
        var filenamePrefix = employeeId;

        document.querySelector('#btn-one').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';

                let base64image = canvas.toDataURL('image/png');

                // Set A5 size in inches for landscape
                let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });



        document.querySelector('#btn-one-may').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_may'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

               // Set A5 size in inches for landscape
               let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-june').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_june'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

              // Set A5 size in inches for landscape
              let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-july').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_july'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                 // Set A5 size in inches for landscape
                 let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-august').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_august'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                 // Set A5 size in inches for landscape
                 let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-september').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_september'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                 // Set A5 size in inches for landscape
                 let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-october').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_october'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                 // Set A5 size in inches for landscape
                 let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-november').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_november'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                // Set A5 size in inches for landscape
                let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-december').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_december'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                 // Set A5 size in inches for landscape
                 let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-january').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_january'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

               // Set A5 size in inches for landscape
               let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-february').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_february'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                  // Set A5 size in inches for landscape
               let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-march').addEventListener('click', function() {
            // Show loader
            document.getElementById('loader').style.display = 'block';

            html2canvas(document.querySelector('#calendarDiv_march'), {
                scale: 4
            }).then((canvas) => {
                // Hide loader
                document.getElementById('loader').style.display = 'none';
                let base64image = canvas.toDataURL('image/png');

                 // Set A5 size in inches for landscape
                 let a5WidthInInches = 8.5;
                let a5HeightInInches = 5.5;

                // Convert inches to points
                let a5Width = a5WidthInInches * 72; // A5 width in points
                let a5Height = a5HeightInInches * 72; // A5 height in points

                // Set margin values to 0
                let marginX = 0;
                let marginY = 0;

                // Calculate the position and size of the image to fit A5 page without margins
                let imageX = marginX; // X-coordinate
                let imageY = marginY; // Y-coordinate
                let imageWidth = a5Width - marginX * 2; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'pt', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });
    </script>
    
</body>

</html>
