<!DOCTYPE html>
<html>
<head>
    <title>Expenses Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Expenses Report</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Comment</th>
                <th>Paid To</th>
                <th>Paid At</th>
            </tr>
        </thead>
        <tbody>
            @if($expenses->isNotEmpty()) 
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>Rs. {{ $expense->amount }}</td>
                        <td>{{ $expense->category->title }}</td>
                        <td>{{ $expense->comment }}</td>
                        <td>{{ $expense->paidTo }}</td>
                        <td>{{ $expense->paidAt }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No expenses found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
