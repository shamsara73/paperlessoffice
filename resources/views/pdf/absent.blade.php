<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 15px;
            font-size:18px;
        }

        th {
            height: 30px;
            font-size:18px;
            text-transform: uppercase;
        }
        html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
        }
        body {
            font-family: "Verdana", Verdana, Geneva, sans-serif;
            color: #000;
        }
    </style>
</head>

<body>
    <div>
        <h1 style="text-align:center">Attendances Check</h1>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th style="width:10%">No</th>

                    <th style="width:40%">Name</th>
                    <th style="width:20%">Mark</th>

                </tr>

            </thead>
            <tbody>
                @foreach($data as $index => $row)
                <tr>
                    <td style="text-align:center">{{ $index +1 }}</td>
                    <td>{{$row['name']}}</td>
                    <td></td>
                </tr>
                @endforeach
            <tbody>



        </table>
    </div>

</body>

</html>
