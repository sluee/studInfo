<html>
    <head>
        <title>Products Summary</title>

    </head>
    <style>
        *{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13pt;
        }

        h1{
            font-size: 22pt;

        }

        table{
            border-collapse: collapse;

        }
        table th, table td{
            padding:2px;
            border: 1px solid #333;
        }

    </style>

    <body>
        <div style="text-align:center; padding-bottom:12pt; border-bottom: 1px solid #333">
            <strong>St. Average College</strong> <br>
            {{-- <img src="{{public_path('images/mdc-logo.jpg')}}" style="height: 100px; justify-center" alt="MDC Bank, Inc."><br> --}}
            #456 Skina Japan Ave., Instagram Block <br>
            Tel. No.: 456-123-900, 145-234-890
        </div>

        <h1 style="padding-bottom: 10pt; border-bottom: 1px solid #333">Student Information</h1>

        <table>

                <tr>
                    <th>Name</th>
                    <td>{{$student->last_name}} , {{$student->first_name}}</td>
                </tr>
                <tr>
                    <th>Course & Year</th>
                    <td>{{$student->course}} - {{$student->year}}</td>
                </tr>

                <tr>
                    <th>Age</th>
                    <td>{{$student->age}}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{$student->dob}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{$student->gender}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$student->address}}</td>
                </tr>
                

        </table>

    </body>
</html>