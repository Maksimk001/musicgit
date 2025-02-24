@extends('layouts.app')
@section('content')
<title>Вход</title>

<body>
    <div class="authWindows">
        <div class="loginRegister" class="login">
            <a href="{{ url()->previous() }}"><img src="{{ asset('image/Chevron_left.svg') }}" alt=""></a>
            <h1>Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="place">
                    <label for="">Enter email</label>
                    <input type="email" id="email" name="email" class="inp-1" required>
                </div>
                <div class="place">
                    <label for="">Enter password</label>
                    <input type="password" id="password" name="password" class="inp-1" required>
                </div>
                <a href="{{ route('auth.register') }}" class="link">Нет аккаунта. Создайте!</a>

                <button type="submit" class="btn-1" class="register">Sing up</button>
            </form>
            
        </div>
        
    </div>
</body>
@endsection