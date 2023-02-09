{{-- view for queues of students to be accepted by the doctor  --}}
@extends('layouts.app')
@section('styles')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('allinone/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('allinone/toastr.min.css') }}">
@endsection
@section('aboveScript')
    <!-- SweetAlert2 -->
    <script src="{{ asset('allinone/sweetalert2.min.js') }}" defer></script>
    <!-- Toastr -->
    <script src="{{ asset('allinone/toastr.min.js') }}" defer></script>
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

    {{-- {{ auth()->user()->rol_id }} --}}

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- modal starts here --}}
                            <div id="contact"><button type="button" class="btn btn-info btn" data-toggle="modal"
                                    data-target="#contact-modal">Change Room</button></div>
                            <div id="contact-modal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                        </div>
                                        <form id="contactForm" name="contact" method="POST"
                                            action="/clinic/doctor/changeRoom/">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Room NO.</label>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            id="selected_value" style="width: 100%;" data-select2-id="1"
                                                            name="room_id" tabindex="-1" aria-hidden="true">
                                                            <option> Choose A Room
                                                                @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}"> {{ $room->room_no }}
                                                            </option>
                                                            @endforeach
                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                                                            {{-- <script>
                                                                document.getElementById("selected_value").addEventListener("change", function() {
                                                                    var e = document.getElementById("selected_value").value;
                                                                });
                                                               
                                                            </script> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">
                                                        Room title: <p id="room_title" class="badge bg-primary d-inline">
                                                        </p>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Room Type: <p id="room_type"
                                                            class="badge bg-primary d-inline"></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-success" id="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- modal ends here --}}



                            {{-- <button type="button" class="btn btn-primary" onclick="myFunction()">Show live toast</button> --}}



                            {{-- widgit for the toasts start here --}}
                            @asyncWidget('LabResultWidget')
                            {{-- widgit for the toasts end here --}}

                            {{-- message card start --}}
                            @if (session()->has('success'))
                                <div class="p-3">
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> {{ session()->get('success') }}
                                    </div>
                                </div>

                                <script>
                                    console.log(1);
                                    $('.toastrDefaultSuccess').click(function() {
                                        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                                    });
                                    // toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                                    window.setTimeout(function() {
                                        $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                            $(this).remove();
                                        });
                                    }, 4000);
                                </script>
                            @endif
                            {{-- message card end --}}

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


    {{-- <script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).on('change', '#selected_value', function() {
            var id = document.getElementById('selected_value').value;
            $.ajax({
                method: 'GET',
                url: "{{ route('doctor.getroom') }}",
                data: {
                    'id': id,
                },
                dataType: 'json',
                success: function(data) {

                    $('#room_title').text(data.room_title);
                    $('#room_type').text(data.room_type);

                },
                error: function() {}
            });

        })
    </script>
@endsection
