@extends('auth.main')
@section('authContent')
    <div class="card borderless">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
                        <form action="{{ route('users.create') }}">
                            @csrf
                            @method('POST')
                            <h4 class="f-w-400">Sign up</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Name" placeholder="Name" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" id="Email" placeholder="Email address" name="email">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" id="PasswordConfirmation" placeholder="Password" name="password_confirmation">
                            </div>
                            <button class="btn btn-primary btn-block mb-4">Sign up</button>
                            <hr>
                            <p class="mb-2">Already have an account? <a href="{{ route('auth.login') }}" class="f-w-400">Signin</a></p>
                        </form>
                    
                    </div>
				</div>
			</div>
		</div>
@endsection
