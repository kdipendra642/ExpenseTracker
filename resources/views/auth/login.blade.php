@extends('auth.main')
@section('authContent')
<div class="card borderless">
    <div class="row align-items-center ">
        <div class="col-md-12">
            <form action="{{ route('login.enter') }}" method="post">
                @csrf
                @method('post')
                <div class="card-body">
                    <h4 class="mb-3 f-w-400">Signin</h4>
                    <hr>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" id="Email" placeholder="Email address" name="email">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                    </div>
                    <button class="btn btn-block btn-primary mb-4" type="submit">Signin</button>
                    <hr>
                    <p class="mb-0 text-muted">Don't have an account? <a href="{{ route('auth.register') }}" class="f-w-400">Signup</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection