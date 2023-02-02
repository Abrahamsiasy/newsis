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

                            <!-- Table with panel -->
                            {{-- @asyncWidget('LabQueuewidgit') --}}

                            <div class=" h-54">
                                <div class="flex justify-start p-2 bg-gray-600 flex-wrap">
                                    @foreach ($queuesdoc as $key => $queue)
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner display-1">
                                                    <h3 style="font-size: 80px"> {{ $queue->labAssistant->room->room_no }}
                                                        <sup style="font-size: 20px">ROOM
                                                            NO.</sup>
                                                    </h3>

                                                    <h4> {{ $queue->student->student_id }}</h4>
                                                    <h4> {{ $queue->student->first_name }}</h4>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <p class="small-box-footer">{{ $queue->labAssistant->name }} <i
                                                        class="fas fa-arrow-circle-right"></i></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- sample card for the view start --}}
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>STUDENT ID</th>
                                                            <th>STUDENT NAME</th>
                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($queues as $key => $que)
                                                            <tr>
                                                                <td>{{ $key +1  }}</td>
                                                                <td>{{ $que->student->student_id }}</td>
                                                                <td>{{ $que->student->first_name }}</td>
                                        
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- Table with panel -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
