@extends('layouts.app')
@section('content')
<title>Регистрация</title>

<body>
    <div class="authWindows">
        <div class="loginRegister">
            <a href="{{ url()->previous() }}"><img src="{{ asset('image/Chevron_left.svg') }}" alt=""></a>
            <h1>Registration</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="place">
                    <label for="">Enter name</label>
                    <input type="name" id="name" name="name" class="inp-1" required>
                </div>
                <div class="place">
                    <label for="">Enter email</label>
                    <input type="email" id="email" name="email" class="inp-1" required>
                </div>
                <div class="place">
                    <label for="">Enter password</label>
                    <input type="password" id="password" name="password" class="inp-1" required>
                </div>
                <div class="place">
                    <label for="">Confirm password</label>
                    <input type="password" id="confirm_password" name="password_confirmation" class="inp-1" required>
                </div>
                <a href="{{ route('auth.login') }}" class="link">Уже есть аккаунт? Войдите!</a>

                <button type="submit" class="btn-1" class="register">Sing up</button>
            </form>
            
        </div>
    </div>
</body>
@endsection