@php
// @dd($user);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('style')
    <title>Edit</title>
</head>

<body>
    @include('student.nav')
    <div class="container">
        <div class="row" style="margin-top:120px;margin-bottom:120px">
            <div class="col-md-4 col-md-offset-4 mx-auto">
                <h4 class="text-center">Update Information</h4>
                <hr>
                <form action="{{url('auth/update/'.$user['id'])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="" class="">Name</label>
                        <input type="text" class="form-control" name='name' placeholder="Enter Your Name"
                            value="{{$user['name']}}">
                    </div>

                    <div class="form-group">
                        <label for="" class="mt-3">Email</label>
                        <input type="text" class="form-control" name='email' placeholder="Enter Your Email"
                            value="{{$user['email']}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Student Roll</label>
                        <input type="text" class="form-control" name='roll' placeholder="Enter Your ID"
                            value="{{$user['roll']}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Class</label>
                        <select type="text" class="form-control" name='class' value="{{$user['class']}}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Section</Section></label>
                        <select type="text" class="form-control" name='section' value="{{$user['section']}}">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Academic Your</label>
                        <input type="text" class="form-control" name='a_year' value="{{$user['a_year']}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Religion</label>
                        <input type="text" class="form-control" name='religion' placeholder="Enter Your Religion"
                            value="{{$user['religion']}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Blood Group</label>
                        <select type="text" class="form-control" name='blood' value="{{$user['blood']}}">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Password</label>
                        <input type="password" class="form-control" name='password'
                            placeholder="Enter Your new Password">
                    </div>
                    <div class="form-group">
                        <label for="" class="">Image</label>
                        <input type="file" id="img" name="img" accept="image/*" }}">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3 w-100">Update</button>
                </form>
            </div>
        </div>
    </div>

    @include('script')
</body>

</html>