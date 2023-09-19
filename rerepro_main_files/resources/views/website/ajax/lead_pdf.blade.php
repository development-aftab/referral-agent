<!DOCTYPE html>
<html>
<head>
    <title>Lead Information</title>
    <style type="text/css">
        table {
            width: 300px;
        }
        table, th, td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
    </style>
</head>
<body>
<table class="table" id="myTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Sender</th><th>Receiver</th><th>Area</th><th>ZipCode</th><th>Lead Type</th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>{{ $Sender }}</td><td>{{ $Receiver }}</td><td>{{ $Area }}</td>
        <td>{{ $ZipCode }}</td><td>{{ $Lead_Type }}</td>
    </tbody>
</table>
</body>
</html>