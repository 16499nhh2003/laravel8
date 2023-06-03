@extends('layouts.app')
@section('title','Đăng Ký')
@section('content')
<div class="wrapper bg-white">
    <div class="h2 text-center">Đăng Ký</div>
    <form class="pt-3" action="{{route('registerPost')}}" method="POST">
        @csrf
        <div class="form-group py-2 m-0">
            <label for="name">{{ __('Họ và Tên') }}</label>
            <div class="input-field">
                <span class="far fa-user p-2"></span>
                <input id="name" type="text" placeholder="Nhập họ và tên" class="" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>
            @error('name')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group py-2 m-0">
            <label for="email">{{ __('Tên đăng nhập') }}</label>
            <div class="input-field">
                <span class="far fa-user p-2"></span>
                <input id="email" type="text" placeholder="Nhập tên đăng nhập" class="" name="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group py-2 m-0">
            <label for="password">{{ __('Mật khẩu') }}</label>
            <div class="input-field">
                <span class="fas fa-lock p-2"></span>
                <input id="password" type="password" placeholder="Nhập mật khẩu" class="" name="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                <i class="far fa-eye-slash" id="togglePassword1" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            @error('password')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group py-2 m-0">
            <label for="email">{{ __('Xác nhận mật khẩu') }}</label>
            <div class="input-field">
                <span class="fas fa-lock p-2"></span>
                <input id="password-confirm" type="password" placeholder="Xác nhận mật khẩu" class="" name="password_confirmation" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
                <i class="far fa-eye-slash" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            @error('password-confirm')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        @if(Session::has('register'))
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('register')}}</strong>
        </div>
        @php
        Session::forget('register');
        @endphp
        @endif
        <button class="btn btn-block text-center my-3" type="submit">Tạo tài khoản</button>
        <div class="text-center pt-3 text-muted">Đã có tài khoản? <a href="{{route('login')}}">Đăng Nhập</a></div>
    </form>
</div>
@endsection
@section('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #eee;
        height: 100vh;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to top, #fff 10%, rgba(93, 42, 141, 0.4) 90%) no-repeat;
        overflow: hidden;
    }

    .wrapper {
        max-width: 500px;
        border-radius: 10px;
        margin: 50px auto;
        padding: 30px 40px;
        box-shadow: 20px 20px 80px rgb(206, 206, 206);
    }

    .h2 {
        font-family: 'Kaushan Script', cursive;
        font-size: 3.5rem;
        font-weight: bold;
        color: #400485;
        font-style: italic;
    }

    .h4 {
        font-family: 'Poppins', sans-serif;
    }

    .input-field {
        /* border: 1px solid #ddd; */
        border-radius: 5px;
        padding: 5px;
        display: flex;
        align-items: center;
        cursor: pointer;
        border: 1px solid #400485;
        color: #400485;
    }

    .input-field:hover {
        color: #7b4ca0;
        border: 1px solid #7b4ca0;
    }

    input {
        border: none;
        outline: none;
        box-shadow: none;
        width: 100%;
        padding: 0px 2px;
        font-family: 'Poppins', sans-serif;
    }

    .fa-eye-slash.btn {
        border: none;
        outline: none;
        box-shadow: none;
    }

    a {
        text-decoration: none;
        color: #400485;
        font-weight: 700;
    }

    a:hover {
        text-decoration: none;
        color: #7b4ca0;
    }

    .option {
        position: relative;
        padding-left: 30px;
        cursor: pointer;
    }

    .option label.text-muted {
        display: block;
        cursor: pointer;
    }

    .option input {
        display: none;
    }

    .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 50%;
        cursor: pointer;
    }

    .option input:checked~.checkmark:after {
        display: block;
    }

    .option .checkmark:after {
        content: "";
        width: 13px;
        height: 13px;
        display: block;
        background: #400485;
        position: absolute;
        top: 48%;
        left: 53%;
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 300ms ease-in-out 0s;
    }

    .option input[type="checkbox"]:checked~.checkmark {
        background: #fff;
        transition: 300ms ease-in-out 0s;
        border: 1px solid #400485;
    }

    .option input[type="checkbox"]:checked~.checkmark:after {
        transform: translate(-53%, -47%) scale(1);
    }

    .btn.btn-block {
        border-radius: 20px;
        background-color: #400485;
        color: #fff;
    }

    .btn.btn-block:hover {
        background-color: #55268be0;
    }

    @media(max-width: 575px) {
        .wrapper {
            margin: 10px;
        }
    }

    @media(max-width:424px) {
        .wrapper {
            padding: 30px 10px;
            margin: 5px;
        }

        .option {
            position: relative;
            padding-left: 22px;
        }

        .option label.text-muted {
            font-size: 0.95rem;
        }

        .checkmark {
            position: absolute;
            top: 2px;
        }

        .option .checkmark:after {
            top: 50%;
        }

        #forgot {
            font-size: 0.95rem;
        }
    }

    .invalid-feedback {
        display: inline;
    }
</style>
@stop()
@section('js')
<script>
    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#password');
    togglePassword1.addEventListener('click', function(e) {
        let type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#password-confirm');
    togglePassword2.addEventListener('click', function(e) {
        let type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    setTimeout(() => {
        $('.alert').fadeOut('slow'); 
    },2000);
</script>
@stop()