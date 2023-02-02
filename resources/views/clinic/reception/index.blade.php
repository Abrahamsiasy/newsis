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
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>STUDENT ID</th>
                                                <th>STUDENT NAME</th>
                                                <th>EMERGENCY LEVEL</th>
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
                                                            <div class="btn-group btn-group-toggle form-check" >
                                                                <label class="btn bg-olive active">
                                                                    <input type="radio" name="status" id="option" value="0" checked
                                                                        autocomplete="off"> NOR
                                                                </label>
                                                                <label class="btn btn-danger">
                                                                    <input type="radio" name="status" id="option1" value="5"
                                                                        autocomplete="off"> EMR
                                                                </label>
                                                            </div>
                                                        </td>
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
                            {{ $students->links()}}

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
