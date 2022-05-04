@extends('master')
@section('title', 'Add Student')
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

                        <form action="{{ route('student.storedata') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="fullname" class='form-control' placeholder="ex: Jhon Doe">
                            </div>

                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" name="attachment" class='form-control' onchange="preview(this)">
                                <img id="previewImg" style="max-width:150px;margin-top:20px;" />
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
        function preview(input) {

            var file = $("input[type=file]").get(0).files[0];
          
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
