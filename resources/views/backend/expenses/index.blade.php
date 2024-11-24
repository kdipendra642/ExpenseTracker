@extends('backend.main')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Expenses</h5>
                        <span class="d-block m-t-5"><a href="{{ route('expenses.create') }}">Add Expenses</a></span>
                        <a href="{{ route('expenses.download') }}" class="btn btn-primary"><i class="icon feather icon-download"></i> Download</a>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('expenses.index') }}">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="week">Select a week:</label>
                                        <input type="week" class="form-control" id="week" name="filterDate">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Amount</th>
                                        <th>Category</th>
                                        <th>Comment</th>
                                        <th>Paid To</th>
                                        <th>Paid At</th>
                                        <th>Action</th>
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
                                                <td>
                                                    <a href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger">Delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No expenses found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection