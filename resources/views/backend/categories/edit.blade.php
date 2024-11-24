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
                    <form action="{{ route('categories.update', $categories->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <input type="hidden" name="userId" value="{{auth()->user()->id}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" name="title" value="{{$categories->title}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Description">Description</label>
                                        <input type="text" class="form-control" id="Description" name="description" value="{{$categories->description}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
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