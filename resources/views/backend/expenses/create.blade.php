@extends('backend.main')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
      
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Category Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('expenses.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="userId" value="{{auth()->user()->id}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="paidAt">Paid At</label>
                                        <input type="date" class="form-control" id="paidAt" name="paidAt">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="comment">Comment</label>
                                        <input type="text" class="form-control" id="comment" name="comment">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="amount">amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Example select</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="categoryId">
                                        <option selected disabled> Select One</option>
                                        @if($categories->isNotEmpty()) 
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->title}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="paidTo">Paid To</label>
                                        <input type="text" class="form-control" id="paidTo" name="paidTo">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
@endsection