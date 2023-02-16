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
                                            action="/clinic/lab/changeRoom/">
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
                                                <th>REQUEST TYPE</th>
                                                <th>ACTION</th>
                                                {{-- counter start here --}}


                                                {{-- counter start here --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($LabRequests as $key => $LabRequest)
                                                {{-- @dd($labqueues); --}}
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $LabRequest->student->student_id }}</td>
                                                    <td>{{ $LabRequest->student->first_name }}</td>
                                                    <td>{{ $LabRequest->title }}</td>

                                                    <td><a href="/clinic/lab/detail/{{ $LabRequest->student->id }}/{{ $LabRequest->id }}"
                                                            class="btn btn-primary">ACCEPT</>
                                                    </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).on('change', '#selected_value', function() {
            var id = document.getElementById('selected_value').value;
            $.ajax({
                method: 'GET',
                url: "{{ route('lab.getroom') }}",
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

jjjjj

<div class="form-group" data-select2-id="29">
    <label>Minimal</label>
    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
        tabindex="-1" aria-hidden="true">
        <option selected="selected" data-select2-id="3">Alabama</option>
        <option data-select2-id="31">Alaska</option>
        <option data-select2-id="32">California</option>
        <option data-select2-id="33">Delaware</option>
        <option data-select2-id="34">Tennessee</option>
        <option data-select2-id="35">Texas</option>
        <option data-select2-id="36">Washington</option>
    </select>
</div>

<script>
    $(function() { // Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
<!-- /.row -->
</div><!-- /.container-fluid -->
    <!-- /.content -->
@endsection
