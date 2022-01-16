<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('style')
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="row" style="margin-top:170px">
            <div class="col-md-4 col-md-offset-4 mx-auto">
                <h4 class="text-center">Login Your Account</h4>
                <hr>
                <form action="{{url('auth/check')}}" method="post">
                    @csrf
                    @if (Session::get('login_error'))
                    <div class="alert alert-danger">{{Session::get('login_error')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="" class="">Email</label>
                        <input type="text" class="form-control" name='email' placeholder="Enter Your Email"
                            value={{old('email')}}>
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Password</label>
                        <input type="password" class="form-control" name='password' placeholder="Enter Your Password">
                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3 w-100">Sing In</button>
                </form>
                <div class="text-center mt-3">
                    <a href="{{url('auth/register')}}" class="text-decoration-none pt-3">Have no account, create an
                        account?</a>
                </div>
            </div>
        </div>
    </div>

    @include('script')
</body>

</html>