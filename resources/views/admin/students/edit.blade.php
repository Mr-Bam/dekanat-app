@extends('layouts.app')
<style >
    label {
        min-width: 150px;
        display: inline-block;
        float: left;
    }

    .form-control, .form-select {
        width: 40% !important;
    }

    form {
        text-align: center;
        margin: auto;
        width: 70% !important;
    }

    nav.breadcrumb {
        font-size: 22px;
        margin-left: 223px;
    }

    .save-btn {
        margin-left: 13px;
    }
</style>
@section('content')
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/students">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Student #{{ $student->id }}</li>
        </ol>
    </nav>
    <form action="/admin/students/{{ $student->id }}" method="POST" style="width: 800px;">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="first_name">First Name</label>
        <input id="first_name" class="form-control mb-3" type="text" name="first_name" value="{{ $student->first_name }}">

        <label for="last_name">Last Name</label>
        <input id="last_name" class="form-control mb-3" type="text" name="last_name" value="{{ $student->last_name }}">

        <label for="course">Course</label>
        <input id="course" class="form-control mb-3" type="number" min="1" name="course" value="{{ $student->course }}">

        <label for="rating">Rating</label>
        <input id="rating" class="form-control mb-3" type="number" min="0" name="rating" value="{{ $student->rating }}">

        <label for="dormitory">Dormitory</label>
        <select id="dormitory" class="form-select mb-3" name="dormitory">
            @foreach ($dormitories as $dormitory)
                <option value="{{ $dormitory->id }}">{{ $dormitory->number }}</option>
            @endforeach
        </select>

        <input class="btn btn-success save-btn" type="submit" value="Save">
    </form>
@endsection
