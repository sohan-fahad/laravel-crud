@php
$id = Session::get('userId');
$array_courses = Session::get('array_courses');
@endphp

@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <h4>Select Your Courses</h4>
        <form action="{{url('courses/save/'.$id)}}" method="POST">
            @csrf
            <select class="js-select2 px-3" multiple="multiple" name='courses[]'>
                @foreach ($courses as $course)
                <option value="{{$course['code']}}" data-badge="" @if ($array_courses) @foreach ($array_courses as
                    $item) @if($item['courseId']==$course['code']) {{"selected"}} @endif @endforeach @endif>
                    {{$course['course']}}</option>
                @endforeach
            </select> <br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection