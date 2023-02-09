{{-- view for queues of students to be accepted by the doctor  --}}
@extends('layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">

                                <!-- Table with panel -->
                            <div class="card card-cascade narrower">

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    {{-- message card start --}}
                                    @if (session()->has('status'))
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Success!</strong> {{ session()->get('status') }}
                                        </div>

                                        <script>
                                            window.setTimeout(function() {
                                                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                                    $(this).remove();
                                                });
                                            }, 4000);
                                        </script>
                                    @endif
                                    {{-- message card end --}}
                                    <table class="table table-hover text-nowrap" id="exampl2">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>STUDENT ID</th>
                                                <th>STUDENT NAME</th>
                                                <th>EMERGENCY</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $key => $student)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $student->student_id }}</td>
                                                    <td>{{ $student->first_name }}</td>
                                                    <form action="/clinic/reception/{{ $student->id }}" method="POST">
                                                        @csrf
                                                        <td>
                                                            <input type="checkbox" name="statussssss" checked
                                                                data-toggle="toggle" data-on="Not Emrgency"
                                                                data-off="Emrgency" data-onstyle="success"
                                                                data-offstyle="danger" id="payMethod">
                                                        </td>
                                                        <input name="status" id="status_input" type="hidden" />

                                                        <td> <button class="btn btn-primary" type="submit">ACCEPT</button>
                                                            {{-- <a href="/clinic/reception/{{ $student->id }}"
                                                                class="btn btn-primary"></> --}}
                                                        </td>



                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            {{ $students->links() }}

                        </div>
                        <!-- Table with panel -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        // function myFunction() {
        //     var checkBox = document.getElementById("payMethod");
        //     if (checkBox.checked == true) {
        //         console.log("Checked");
        //     } else {
        //         console.log("NOT Checked");

        //     }
        // }

        $("#payMethod").change(function() {
            if ($(this).prop("checked") == true) {
                //run code
                //get an input element with id status_input and set its value to 1
                var status_input = document.getElementById("status_input");
                status_input.value = "0";
                console.log("Not Emergency");
            } else {
                //get an input element with id status_input and set its value to 1
                var status_input = document.getElementById("status_input");
                status_input.value = "5";
                console.log("Emrgency");
                //run code
            }
        });


        // $('#payMethod').on('change', function() {
        //     var status_input = document.getElementById("status_input");
        //     status_input.value = "5";
        //     console.log("Not Emergency")
        // });





        $(function() {
            $("#exampl2").DataTable({
                "pageLength": 50,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>
@endsection
@endsection
