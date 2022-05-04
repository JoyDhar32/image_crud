@extends('master')
@section('title', 'Edit Student')
@section('body')

    <div class="container">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <div class="card">

                    <div class="card-header row">
                        <div class="col-md-8 text-center"> Add New Student</div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('student.show') }}" class="btn btn-warning btn-sm">Student List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('student_added'))
                            <div class="alert alert-success">
                                {{ Session::get('student_added') }}
                            </div>
                        @endif

                        <form action="{{ route('student.edit.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}" />
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="fullname" class='form-control' value="{{ $student->fullname }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" name="attachment" class='form-control' onchange="previewFile(this)">
                                <img id="previewImg"  style="max-width:150px;margin-top:20px;" />
                                <div id="temp"> <img src="{{ asset('users') }}/{{ $student->attachment }}"
                                        style="max-width:150px;margin-top:20px;" /></div>
                            </div>
                            <div class="text-center"> <button type="submit" class="btn btn-primary"> Submit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                document.getElementById('temp').style.display = "none";
                reader.readAsDataURL(file);

            }
        }
    </script>

@endsection
