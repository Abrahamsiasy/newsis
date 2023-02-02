{{-- view for queues of students to be accepted by the doctor  --}}
@extends('layouts.app')

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

    {{ auth()->user()->rol_id }}

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
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>STUDENT ID</th>
                                                <th>STUDENT NAME</th>
                                                <th>ACTION</th>
                                                {{-- counter start here --}}

                                                <label id="minutes">00</label>:<label id="seconds">00</label>

                                                <script>
                                                    var minutesLabel = document.getElementById("minutes");
                                                    var secondsLabel = document.getElementById("seconds");
                                                    var totalSeconds = 0;
                                                    setInterval(setTime, 1000);

                                                    function setTime() {
                                                        ++totalSeconds;
                                                        secondsLabel.innerHTML = pad(totalSeconds % 60);
                                                        minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
                                                    }

                                                    function pad(val) {
                                                        var valString = val + "";
                                                        if (valString.length < 2) {
                                                            return "0" + valString;
                                                        } else {
                                                            return valString;
                                                        }
                                                    }
                                                </script>
                                                {{-- counter start here --}}

                                            </tr>
                                        </thead>
                                        <tbody>


                                            {{-- for emergency table raw start --}}
                                            @foreach ($emergency as $key => $emer)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $emer->student->student_id }}</td>
                                                    <td>{{ $emer->student->first_name }}</td>

                                                    {{-- <td>{{ $student->queues->created_at }}</td> --}}
                                                    @if ($minidemer->id == $emer->id)
                                                        <td><a href="/clinic/doctor/detail/{{ $emer->student->id }}"
                                                                class="btn btn-danger">ACCEPT</>
                                                        </td>
                                                    @else
                                                        <td><a href="/clinic/doctor/detail/{{ $emer->student->id }}"
                                                                class="btn btn-danger disabled">ACCEPT</>
                                                        </td>
                                                    @endif
                                                </td>
                                                </tr>
                                            @endforeach
                                            {{-- for emergency only table raw end --}}



                                            @foreach ($students as $key => $student)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $student->student->student_id }}</td>
                                                    <td>{{ $student->student->first_name }}</td>


                                                    {{-- <td>{{ $student->queues->created_at }}</td> --}}
                                                    @if ($minid->id == $student->id)
                                                        <td><a href="/clinic/doctor/detail/{{ $student->student->id }}"
                                                                class="btn btn-primary">ACCEPT</>
                                                        </td>
                                                    @else
                                                        <td><a href="/clinic/doctor/detail/{{ $student->student->id }}"
                                                                class="btn btn-primary disabled">ACCEPT</>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

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
@endsection
