@extends('layouts.app')
<style >
    label {
        min-width: 150px;
        display: inline-block;
    }

    .container {
        width: 40% !important;
    }

    label {
        font-weight: bold;
    }

    table {
        text-align: center;
        margin: auto;
        width: 70% !important;
    }

    table tr {
        vertical-align: middle;
    }

    nav.breadcrumb {
        font-size: 22px;
        margin-left: 223px;
    }

    .block {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .title {
        margin-left: 246px;
    }
</style>
@section('content')
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/students">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Student #{{ $student->id }}</li>
        </ol>
    </nav>
    <div class="container">
        <div class="block">
            <label>First Name</label> {{ $student->first_name }}
        </div>
        <div class="block">
            <label>Last Name</label> {{ $student->last_name }}
        </div>
        <div class="block">
            <label>Course</label> {{ $student->course }}
        </div>
        <div class="block">
            <label>Rating</label> {{ $student->rating }}
        </div>
        <div class="block">
            <label>Dormitory</label> {{ $student->dormitory->number }}
        </div>
    </div>
    <br/>
    <h2 class="title">Scholarships</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Amount</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($student->scholarships as $scholarship)
            <tr>
                <td>{{ $scholarship->amount }}</td>
                <td>{{ $scholarship->created_at }}</td>
                <td>{{ $scholarship->updated_at }}</td>
            </tr>
        @endforeach
        @if (\count($student->scholarships) == 0)
            <tr>
                <td colspan="3">Records not found</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
