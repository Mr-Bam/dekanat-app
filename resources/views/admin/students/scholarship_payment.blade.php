@extends('layouts.app')
<style >
    label {
        min-width: 150px;
        display: inline-block;
        float: left;
    }

    form {
        text-align: center;
        margin: auto;
        width: 70% !important;
    }

    .form-control {
        width: 40% !important;
    }

    nav.breadcrumb {
        font-size: 22px;
        margin-left: 223px;
    }

    .pay-btn {
        margin-left: 21px;
    }
</style>
@section('content')
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/students">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Scholarship Payment for Student #{{ $student->id }}</li>
        </ol>
    </nav>
{{--    <div class="container">--}}
        <form action="/admin/students/{{ $student->id }}/pay-scholarship" method="POST" style="width: 800px;">
            {{ csrf_field() }}
            <label for="amount">Amount</label>
            <input id="amount" class="form-control mb-3" type="number" min="1" name="amount">

            <input class="btn btn-success pay-btn" type="submit" value="Pay">
        </form>
{{--    </div>--}}
@endsection
