<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Doctor Dashboard</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />

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

        .highlight-date::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            /* Adjust the width of the inner circle */
            height: 10px;
            /* Adjust the height of the inner circle */
            background-color: white;
            /* Adjust the color of the inner circle */
            border-radius: 50%;
        }
    </style>

</head>

<body>

    <div id="wrapperDiv">
        <div id="calendarDiv"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->april_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarData !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one" class="btn btn-success mx-auto">Download PDF April</button>
        </div>

        <div id="calendarDiv_may"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->may_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDataMay !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-may" class="btn btn-success mx-auto">Download PDF May</button>
        </div>
        <div id="calendarDiv_june"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->june_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDatajune !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-june" class="btn btn-success mx-auto">Download PDF June</button>
        </div>
        <div id="calendarDiv_july"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->july_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDatajuly !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-july" class="btn btn-success mx-auto">Download PDF July</button>
        </div>
        <div id="calendarDiv_august"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->august_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDataMayaugust !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-august" class="btn btn-success mx-auto">Download PDF
                August</button></div>
        <div id="calendarDiv_september"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->september_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDataMayseptember !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-september" class="btn btn-success mx-auto">Download PDF
                September</button></div>
        <div id="calendarDiv_october"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->october_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDataMayoctober !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-october" class="btn btn-success mx-auto">Download PDF
                October</button></div>
        <div id="calendarDiv_november"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->october_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDataMaynovember !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-november" class="btn btn-success mx-auto">Download PDF
                November</button></div>
        <div id="calendarDiv_december"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->december_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDataMaydecember !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-december" class="btn btn-success mx-auto">Download PDF
                December</button></div>
        <div id="calendarDiv_january"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->january_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDatajanuary !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-january" class="btn btn-success mx-auto">Download PDF
                January</button></div>
        <div id="calendarDiv_february"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->february_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDatafebruary !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <div class="text-center"><button id="btn-one-february" class="btn btn-success mx-auto">Download PDF
                February</button></div>
        <div id="calendarDiv_march"
            style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div style="width: 100%; height: 100%; display: flex;">

                <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                    <div>
                        <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt=""
                            class="img-fluid" width="100px" />


                    </div>
                    <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                        <img id="photo" src="{{ asset($doctordetails->march_photo) }}" alt="Passport Photo"
                            style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                    </div>

                    @php
                        $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                        $selectedMonth = (int) $month;
                        $currentMonthIsFeb = $currentMonth === $selectedMonth;
                    @endphp

                    <div class="text-center">
                        @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                            <p><b><i>Date Of Birth:
                                        {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</i></b>
                            </p>
                        @endif

                        @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                            <p><b><i>Marriage Anniversary:
                                        {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</i></b>
                            </p>
                        @endif
                    </div>
                </div>

                <div style="width: 50%; height: 100%; padding: 10mm;">
                    <main style="margin-top: 0;">
                        {{-- <h4 id="Year" class="text-right mb-4"></h4>   --}}
                        <h4 id="monthAndYear" class="text-right mb-4"></h4>
                        {{-- <div id="calendar-container"></div> --}}
                        <div id="calendar-container">
                            {!! $calendarDatamarch !!}
                        </div>
                        <div>
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                            <hr style="border: 1px solid black;  margin: 40px 0;">
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center"><button id="btn-one-march" class="btn btn-success mx-auto">Download PDF March</button>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // Pass the registration number and employee ID to the JavaScript variables
        var employeeId = "{{ Auth::guard('admin')->user()->employee_id }}";
        var employeeName = "{{ Auth::guard('admin')->user()->name }}";
        var doctorName = "{{ $doctordetails->name }}";
        // If employee ID is null, use the employee name
        var filenamePrefix = employeeId ? 'mr_' + employeeId : 'mr_' + employeeName;

        document.querySelector('#btn-one').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-may').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_may')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-june').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_june')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-july').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_july')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-august').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_august')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });


        document.querySelector('#btn-one-september').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_september')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-october').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_october')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-november').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_november')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-december').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_december')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-january').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_january')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-february').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_february')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);

                // Get the current date
                var currentDate = new Date().toISOString().slice(0, 10);

                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + doctorName.replace(/\s/g, '') + '_' + currentDate + '.pdf');
            });
        });

        document.querySelector('#btn-one-march').addEventListener('click', function() {
            html2canvas(document.querySelector('#calendarDiv_march')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');

                // Calculate A5 size in pixels (210 x 148 mm) for landscape
                let a5Width = 842; // A5 width in pixels
                let a5Height = 595; // A5 height in pixels

                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) *
                    imageWidth; // Height proportional to width

                // Create the PDF with A5 page size in landscape orientation
                let pdf = new jsPDF('l', 'px', [a5Width, a5Height]);

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
