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
                            <p class="card-text">
                                <!-- Table with panel -->
                            <div class="card card-cascade narrower">
                                <form method="POST" class="p-7" action="/clinic/lab/detail/{{ $student->id }}/{{ $labRequest->id }}">
                                    @csrf
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>STUDENT ID</th>
                                                    <th>Lab Detail</th>
                                                    <th>Lab Result</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                    <tr>
                                                        <td>{{ 1 }}</td>
                                                        <td>{{ $labRequest->student->student_id }}</td>
                                                        <td>{{ $labRequest->title }}</td>
                                                        <td> <input class="form-control" name="title" placeholder="Enter ..." />
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Send</button>
                                    <!-- /.card-body -->
                                </form>
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
