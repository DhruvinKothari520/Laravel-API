@extends('students.layout')
@section('content')

<div class="pull left">
    <h2 style="text-align:center;">Student Registration Form</h2>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.create') }}"> Create New Student</a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>
            {{$message}}
        </p>
    </div>
@endif

    <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Fee</th>
                <th width="280px">Actions</th>
            </tr>
        
            @foreach($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->studname }}</td>
                    <td>{{ $student->studemail }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->fee }}</td>

                    <td>
                        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                            <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a>
                            <a class="btn btn-info" href="{{ route('students.edit', $student->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
