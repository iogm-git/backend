<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Transaction History</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Web Id</th>
                <th>Web Type</th>
                <th>Web Category</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Reference</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($transaction['date'])) }}</td>
                    <td>{{ $transaction['web']->id }}</td>
                    <td>{{ $transaction['web']->web_category->name }}</td>
                    <td>{{ $transaction['web']->web_type->name }}</td>
                    <td>{{ 'RP ' . number_format($transaction['amount'], 2, ',', '.') }} </td>
                    <td>{{ $transaction['status'] }}</td>
                    <td>{{ $transaction['reference_tripay'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
