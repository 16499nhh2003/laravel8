@extends('layouts.app')
@section('title','Trang Đăng Nhập')
@section('content')
<div class="wrapper bg-white">
    <div class="h2 text-center">Đăng nhập</div>
    <!-- <div class="h4 text-muted text-center pt-2">Enter your login details</div> -->
    <form class="pt-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group py-2">
            <label for="email">Tên đăng nhập:</label>
            <div class="input-field">
                <span class="far fa-user p-2"></span>
                <input id="email" type="text" placeholder="Nhập tên đăng nhập/email" class="" name="email">
            </div>
        </div>
        <div class="form-group py-1 pb-2">
            <label for="password">Mật khẩu:</label>
            <div class="input-field">
                <span class="fas fa-lock p-2"></span>
                <input id="password" type="password" placeholder="Nhập mật khẩu" class="" name="password">
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
        </div>
        <div class="d-flex align-items-start">
            <div class="remember">
                <label class="option text-muted"> Lưu Mật Khẩu
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="1">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="ml-auto">
                <a href="#" id="forgot">Quên mật khẩu</a>
            </div>
        </div>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif
        <button class="btn btn-block text-center my-3" type="submit">Đăng nhập</button>
        <div class="text-center pt-3 text-muted">Chưa có tài khoản? <a href="{{route('register')}}">Đăng ký</a></div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
    });
</script>
@stop()

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

    .fa-eye.btn {
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
        transform : translate(-53%, -47%) scale(1);
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
</style>
@stop()