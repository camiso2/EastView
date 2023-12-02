@extends('root.app')
@section('content')
    <main class="login-form" >
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4" style="margin-top: 55px;">

                    <div class="card" style="margin: 25px;">
                        <h3 class="card-header text-center"><b>INICIAR SESIÓN</b></h3>
                        <div class="fadeIn first m-log">
                            <img src="images/bruja.jpeg" id="icon" alt="User Icon" class="img-log " />
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" onsubmit="preload()">
                                {{ csrf_field() }}
                                @if (session('success'))
                                    <h6>{{ session('success') }}</h6>
                                @endif
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <hr>
                                <div class="form-group mb-4">

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn-button btn-block " >INICIAR SESIÓN &nbsp;&nbsp;<i class="fa fa-check-square-o"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
