{{-- view for queues of students to be accepted by the doctor  --}}
@extends('layouts.appdata')

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Table with panel -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">










                            {{-- modal starts here --}}

                            <div id="contact-modal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                        </div>
                                        <form id="contactForm" name="contact" method="POST"
                                            action="/clinic/doctor/changeDoctor/">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="form-group">


                                                        



                                                        <label>Room NO.</label>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            id="selected_value" style="width: 100%;" data-select2-id="1"
                                                            name="room_id" tabindex="-1" aria-hidden="true">
                                                            <option value="">Choose A doctor</option>
                                                            //foreach doctors as doctor get the Id
                                                            @foreach ($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
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
                                                        Name: <p id="doctor_name" class="badge bg-primary d-inline">
                                                        </p>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Email: <p id="room_type"
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





                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                            <script>
                                $(document).on('change', '#selected_value', function() {
                                    var id = document.getElementById('selected_value').value;
                                    $.ajax({
                                        method: 'GET',
                                        url: "{{ route('doctor.getdoctor') }}",
                                        data: {
                                            'id': id,
                                        },
                                        dataType: 'json',
                                        success: function(data) {

                                            $('#doctor_name').text(data.name);
                                            $('#room_type').text(data.email);

                                        },
                                        error: function() {}
                                    });

                                })
                            </script>

















                            <div class="dcf-overflow-x-auto" tabindex="0">
                                <table id="example1" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Student Id</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key => $student)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $student->student->first_name . ' ' . $student->student->last_name }}
                                                </td>
                                                <td>{{ $student->student->student_id }}</td>
                                                <td>
                                                    @php
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($student->student->dob), date_create($today));
                                                        echo $diff->format('%y');
                                                    @endphp
                                                </td>
                                                <td>{{ $student->student->sex }}</td>
                                                <td>
                                                    @php
                                                        //if student stuts is 0 echo done
                                                        if ($student->status == 0) {
                                                            echo '<span class="label label-success">Done</span>';
                                                        } elseif ($student->status == 1) {
                                                            echo '<span class=" h3 badge bg-primary">On GOing</span>';
                                                        }
                                                        
                                                    @endphp

                                                </td>
                                                <td>

                                                    <div class="btn-group">
                                                        <a href="/clinic/doctor/detail/{{ $student->student->id }}"
                                                            class="btn btn-danger">Show</a>


                                                        <div id="contact"><button type="button" class="btn btn-info btn"
                                                                data-toggle="modal"
                                                                data-target="#contact-modal">Assign</button></div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                            <!-- Table with panel -->
                            <script>
                                $(function() {
                                    $("#example1").DataTable({
                                        "responsive": true,
                                        "lengthChange": false,
                                        "autoWidth": false,
                                    });
                                });
                            </script>
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
