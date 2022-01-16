@extends('layouts.master')


@section('content')
@if (Session::get('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@php
$user = Session::get('logged');
// @dd($user);
$name =Str::of($user['name'])->explode(' '); //it will slite the sentence by space(' ')
@endphp
<h1 class="mt-3">Welcome <span class="text-primary">{{$name[0]}}</span>...!</h1>

<!-- Student Profile -->
<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="uploads/users/{{$user['img']}}" alt="">
                        <h3>{{$user['name']}}</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-0"><strong class="pr-1">Student ID:</strong>{{$user['roll']}}</p>
                        <p class="mb-0"><strong class="pr-1">Class:</strong>{{$user['class']}}</p>
                        <p class="mb-0"><strong class="pr-1">Section:</strong>{{$user['section']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Roll</th>
                                <td width="2%">:</td>
                                <td>{{$user['roll']}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Academic Year </th>
                                <td width="2%">:</td>
                                <td>{{$user['a_year']}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Gender</th>
                                <td width="2%">:</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <th width="30%">Religion</th>
                                <td width="2%">:</td>
                                <td>{{$user['religion']}}</td>
                            </tr>
                            <tr>
                                <th width="30%">blood</th>
                                <td width="2%">:</td>
                                <td>{{$user['blood']}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection