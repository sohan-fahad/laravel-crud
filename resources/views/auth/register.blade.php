<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('style')
    <title>Register</title>
</head>

<body>

    <div class="container">
        <div class="row" style="margin-top:120px">
            <div class="col-md-4 col-md-offset-4 mx-auto">
                <h4 class="text-center">Create An Account</h4>
                <hr>
                <form action="{{route('auth.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Session::get('fail'))
                    <div class="alert alert-warning">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="" class="">Name</label>
                        <input type="text" class="form-control" name='name' placeholder="Enter Your Name"
                            value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="" class="mt-3">Email</label>
                        <input type="text" class="form-control" name='email' placeholder="Enter Your Email"
                            value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Student Roll</label>
                        <input type="text" class="form-control" name='roll' placeholder="Enter Your ID"
                            value="{{old('roll')}}">
                        <span class="text-danger">@error('roll'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Class</label>
                        <select type="text" class="form-control" name='class' value="{{old('class')}}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <span class="text-danger">@error('class'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Section</Section></label>
                        <select type="text" class="form-control" name='section' value="{{old('section')}}">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <span class="text-danger">@error('select'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Academic Your</label>
                        <input type="text" class="form-control" name='a_year' value="{{old('a_year')}}">
                        <span class="text-danger">@error('a_year'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Religion</label>
                        <input type="text" class="form-control" name='religion' placeholder="Enter Your Religion"
                            value="{{old('religion')}}">
                        <span class="text-danger">@error('religion'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Blood Group</label>
                        <select type="text" class="form-control" name='blood' value="{{old('blood')}}">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                        </select>
                        <span class="text-danger">@error('blood'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Password</label>
                        <input type="password" class="form-control" name='password' placeholder="Enter Your Password">
                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="" class="">Image</label>
                        <input type="file" id="img" name="img" accept="image/*" value="{{old('img')}}">
                        <span class="text-danger">@error('img'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3 w-100">Sing up</button>
                </form>
                <div class="text-center mt-3">
                    <a href="{{url('auth/login')}}" class="text-decoration-none">Already have an
                        account, sing in?</a>
                </div>
            </div>
        </div>
    </div>

    @include('script')
</body>

</html>