@extends('master')
@section('title', 'Show Data')
@section('body')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-8">
                            Students List
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('student.add') }}" class="btn btn-warning btn-sm offset-md-5"> Add
                                Student</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('student_deleted'))
                            <div class="alert alert-success">
                                {{ Session::get('student_deleted') }}
                            </div>
                        @endif
                        <table class="table table-image">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Time</th>
                                    <th scope="col" style="width:30%">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $i=1; @endphp
                                @foreach ($students as $student)
                                    <tr>
                                        <th scope="row" style="text-align:left">{{ $i++ }}</th>
                                        <td>{{ $student->fullname }}</td>

                                        <td>{{ $student->created_at->diffForHumans() }} </td>
                                        <td class="img_width">
                                            <img src="{{ asset('users') }}/{{ $student->attachment }}"
                                                class="img-fluid img-thumbnail" alt="Sheep">
                                        </td>
                                        <td style="text-align:center">
                                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning "><span class="fa fa-edit"></span> &nbsp Edit </a>
                                            <a href="{{ route('student.delete', $student->id) }}" class="btn btn-danger "><span class="fa fa-remove"></span>&nbsp Remove </a>

                                        </td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
