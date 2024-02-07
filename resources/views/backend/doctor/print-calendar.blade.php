<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Doctor Dashboard</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="calendarDiv"
        style="width: 210mm; height: 148mm; margin: 0 auto; page-break-after: always; background-image: url('{{ asset('assets/images/calendar-background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        <div style="width: 100%; height: 100%; display: flex;">

            <div style="width: 50%; height: 100%; float: left; padding: 10mm;">
                <div>
                    <img src="{{ asset('assets/images/Mankind_Serving_Life.png') }}" alt="" class="img-fluid" width="100px" />

                  
                </div>
                <div class="doctorphoto" style="padding: 0; display: flex; margin: 40px; margin-left: 80px;">
                    <img id="photo" src="{{ asset($doctorImage->path) }}" alt="Passport Photo"
     style="border: 5px solid blue; border-radius: 30px; width: 2.5in; height: 2in;">


                </div>
 
                @php
                    $currentMonth = (int) \Carbon\Carbon::now()->format('m');
                    $selectedMonth = (int) $month;
                    $currentMonthIsFeb = $currentMonth === $selectedMonth;
                @endphp

                <div class="text-center">
                    @if ((int) Carbon\Carbon::parse($doctordetails->date_of_birth)->format('m') === $selectedMonth)
                        <p>Date Of Birth: {{ \Carbon\Carbon::parse($doctordetails->date_of_birth)->format('jS M') }}</p>
                    @endif

                    @if ((int) Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('m') === $selectedMonth)
                        <p>Marriage Anniversary:
                            {{ \Carbon\Carbon::parse($doctordetails->marriage_anniversary)->format('jS M') }}</p>
                    @endif
                </div>
            </div>

            <div style="width: 50%; height: 100%; padding: 10mm;">
                <main style="margin-top: 0;">

                    <h4 id="monthAndYear" class="text-right mb-4"></h4>
                    {{-- <div id="calendar-container"></div> --}}
                    <div id="calendar-container">
                        {!! $calendarData !!}
                    </div>
                    <div>
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                        <hr style="border: 2px solid black;  margin: 40px 0;">
                    </div>
                </main>
            </div>
        </div>
    </div>

    <button id="btn-one" class="btn btn-success mx-auto">Download PDF</button>
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    

    <script>
        // Pass the registration number and employee ID to the JavaScript variables
        var registrationNumber = "{{ $doctordetails->registration_number }}";
        var employeeId = "{{ Auth::guard('admin')->user()->employee_id }}";
        var employeeName = "{{ Auth::guard('admin')->user()->name }}";
    
        // If employee ID is null, use the employee name
        var filenamePrefix = employeeId ? registrationNumber + '_employee_' + employeeId : registrationNumber + '_employee_' + employeeName;
    
        document.querySelector('#btn-one').addEventListener('click', function () {
            html2canvas(document.querySelector('#calendarDiv')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');
    
                // Calculate A5 size in pixels (148 x 210 mm)
                let a5Width = 595; // A5 width in pixels
                let a5Height = 842; // A5 height in pixels
    
                // Calculate the position and size of the image to fit A5 page
                let imageX = 15; // X-coordinate
                let imageY = 15; // Y-coordinate
                let imageWidth = a5Width - 30; // Width of the image
                let imageHeight = (canvas.height / canvas.width) * imageWidth; // Height proportional to width
    
                // Create the PDF with A5 page size
                let pdf = new jsPDF('p', 'px', [a5Width, a5Height]);
    
                // Add the image to the PDF
                pdf.addImage(base64image, 'PNG', imageX, imageY, imageWidth, imageHeight);
    
                // Get the current date
                var currentDate = new Date().toISOString().slice(0,10);
    
                // Save the PDF with the generated filename
                pdf.save(filenamePrefix + '_' + currentDate + '.pdf');

                console.log('a5Width:', a5Width);
console.log('a5Height:', a5Height);
console.log('imageWidth:', imageWidth);
console.log('imageHeight:', imageHeight);

            });
        });
    </script>
    
    
    
</body>

</html>
