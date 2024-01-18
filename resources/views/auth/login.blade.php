@extends('customers.layouts.app')
@section('title', 'login')
@section('content')
<div class="container-fluid login-wrap">
  <div class="row">
    <div class="col-4"></div>
    <div class="col-xl-4 col-ms-6 col-sm-12 text-center">
      <div class="form-signin">
        <form action="{{ route('login.store') }}" method="post">
          @csrf
          <img
            class="mb-4"
            src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png"
            alt=""
            width="100"
            height="100">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
          <div class="mb-3 d-flex gap-2">
            <a href="{{ url('/auth/google') }}" class="btn btn-danger"><i class="fa-brands fa-google"></i> Google</a>
            <a href="{{ url('/auth/facebook') }}" class="btn btn-primary"><i class="fa-brands fa-facebook"></i>Facebook</a>
            <a href="{{ url('/auth/github') }}" class="btn btn-secondary"><i class="fa-brands fa-github"></i> Github</a>
          </div>

          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mt-2">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
      </div>

    </div>
    <div class="col-4"></div>
  </div>
</div>
@endsection
