@extends('layouts.employeemaster')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div>

        <div style="width: 100%;">

            <div style="width: 50%; height: 100px; float: left;">
                <div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/Mankind_Serving_Life.png" alt=""
                        class="img-fluid" width="200px" />
                </div>
                <div class="doctorphoto" style="padding: 0;display: flex;margin:60px;margin-left: 240;">
                    <img id="photo" src="{{ asset($doctorImage->path) }}" alt="Passport Photo" height="400px"
                        width="300px" style="border: 5px solid blue;  border-radius: 20px;">
                </div>
                @php
                    $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                    $selectedMonth = (int) $month;
                    $currentMonthIsFeb = $currentMonth === $selectedMonth;
                @endphp

                <div class="text-center">

                    @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                        <h3>Date Of Birth: {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</h3>
                    @endif

                    @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                        <h3>Marriage Anniversary:
                            {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</h3>
                    @endif

                </div>



            </div>

            <div style="margin-left: 50%; height: 100px;">
                <main style="margin-top: 100px">
                    <!-- Project Code Start -->

                    <h3 id="monthAndYear" class="text-right mb-4"
                        style="    margin-right: 73px;
           margin-top: -29px;">
                    </h3>
                    <div id="calendar-container"></div>

                    <div style="margin-right: 60px;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('extra_css')
    <!-- DataTables -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('extra_js')
    <!-- Responsive examples -->
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>

    <script>
        // JavaScript code to generate and populate the calendar
        function displayCalendar(year, month) {
            const calendarContainer = document.getElementById('calendar-container');

            const cal = new Date(year, month - 1, 1);

            const lastDay = new Date(year, month, 0).getDate();

            let calendarHTML = `
                <h2 class="text-right" style="margin-right:70px;">${cal.toLocaleString('default', { month: 'long' })} ${year}</h2>
                <table  style="width:100%; border-collapse: collapse; height:450px;">
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
            `;

            let day = 1;
            for (let i = 0; i < 6; i++) {
                calendarHTML += '<tr>';
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < cal.getDay()) {
                        calendarHTML += '<td></td>';
                    } else if (day > lastDay) {
                        break;
                    } else {
                        calendarHTML += `<td>${day}</td>`;
                        day++;
                    }
                }
                calendarHTML += '</tr>';
            }

            calendarHTML += '</table>';
            calendarContainer.innerHTML = calendarHTML;
        }

        // Example: Set manual month and year
        const manualYear = {{ $year }}; // Set your desired year
        const manualMonth = {{ $month }}; // Set your desired month (Note: Month is 1-based)

        displayCalendar(manualYear, manualMonth);
    </script>
@endsection
