{{-- view for student detail  --}}
@extends('layouts.app')

@section('content')
    {{-- medical edit modal starts here --}}
    <div id="contact"></div>
    <div id="contact-modal" class="modal fade col-12" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <form method="POST" action="/clinic/doctor/detail/record/med/{{ $student->id }}">
                    @csrf
                    @method('PUT')
                    <div class="justify-content-center">
                        <input type="hidden" name="medical_id" id="medical_id_id_edit" />
                        <div class="col-sm-12">
                            <!-- input -->
                            <div class="form-group">
                                <label>Medication Name</label>
                                <input class="form-control" placeholder="Enter ..." {{-- value="{{$medhistories->id}}" --}} id="em_name"
                                    name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- input -->
                            <div class="form-group">
                                <label>Medication Amount</label>
                                <input class="form-control" placeholder="Enter ..." id="em_amount" name="amount"
                                    value="{{ old('amount') }}" />
                                @error('amount')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- input -->
                            <div class="form-group">
                                <label>Medication Frequency</label>
                                <input class="form-control" placeholder="Enter ..." id="em_frequency" name="frequency"
                                    value="{{ old('frequency') }}" />
                                @error('frequency')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- input -->
                            <div class="form-group">
                                <label>Medication How Much</label>
                                <input class="form-control" placeholder="Enter ..." id="em_how_much" name="how_much"
                                    value="{{ old('how_much') }}" />
                                @error('how_much')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Reason</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="em_why" name="why" ">{{ old('why') }}</textarea>
                                @error('why')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="card-footer p-10 m-10 ">
                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        {{-- <button type="submit" class="btn btn-primary btn-lg">New</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- medical modal ends here --}}

    {{-- delete confirmation modal start here --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{-- medical delete --}}
                <form method="POST" action="/clinic/doctor/student/detail/med/delete/{{ $student->id }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h3 class="modal-title" id="deleteModalLabel">Comfirm Delete</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            {{-- hiden input to pass the id --}}
                            <input type="hidden" name="medical_id" id="medical_id_id_delete" />
                            <h4 for="recipient-name" class="col-form-label">Are you susre you wante to delete this
                                Medication from medication list:</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- medical delete confirmation end start here --}}



    {{-- personal delete confirmation modal start here --}}
    <div class="modal fade" id="deletePersonalModal" tabindex="-1" role="dialog"
        aria-labelledby="deletePersonalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{-- personal delete --}}
                <form method="POST" action="/clinic/doctor/student/detail/personal/delete/{{ $student->id }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h3 class="modal-title" id="deletePersonalModalLabel">Comfirm Delete</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            {{-- hiden input to pass the id --}}
                            <input type="hidden" name="personal_id" id="personal_id_id_delete" />
                            <h4 for="recipient-name" class="col-form-label">Are you susre you wante to delete this
                                Medication from medication list:</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- personal delete confirmation end start here --}}

    {{-- personal detail edit modal start --}}
    <div class="modal fade" id="personalEditModal" tabindex="-1" role="dialog" aria-labelledby="personalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content m-10 p-10">
                <form method="POST" action="/clinic/doctor/detail/record/edit/personal/{{ $student->id }}">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12 m-10 p-10">
                        <!-- input -->
                        <input type="hidden" name="personal_id" id="personal_id_id_edit" />
                        <div class="form-group">
                            <label>Disease Or Conditionse</label>
                            <input class="form-control" id="id_disease_or_conditions" name="disease_or_conditions"
                                value="{{ old('disease_or_conditions') }}" />
                            @error('disease_or_conditions')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>About It</label>
                            <textarea class="form-control" rows="3" id="id_comments" name="comments">{{ old('comments') }}</textarea>
                            @error('comments')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- Bootstrap Switch -->
                        <div class="card card-secondar p-10 m-20y">

                            <div class="card-body p-10">
                                <input type="checkbox" name="current" style="width:30px;height: 30px;" value="1">
                                <label>Still Active</label>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>



                    <div class="card-footer p-10 m-10 ">
                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        {{-- <button type="submit" class="btn btn-primary btn-lg">New</button> --}}
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- personal detail modal end here --}}
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->

                    <div class="card card-primary card-outline">
                        <!-- /.card-basic info start -->
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">
                                {{ $student->first_name . ' ' . $student->last_name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ $student->sex . ' ' }}
                                @php
                                    $today = date('Y-m-d');
                                    $diff = date_diff(date_create($student->dob), date_create($today));
                                    echo $diff->format('%y');
                                @endphp

                            </p>
                            <p class="text-muted text-center">{{ $student->phone_number }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Blood Type</b> <a class="float-right">{{ $histories->blood_type ?? '' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Highet</b> <a class="float-right">{{ $histories->height ?? '' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Weight</b> <a class="float-right">{{ $histories->weight ?? '' }}</a>
                                </li>
                                @if ($student->sex == 'F')
                                    <li class="list-group-item">
                                        <b>NO. of Pregnancies</b> {{ $histories->student->woman->last_menstrual_cycle ?? '' }} <a class="float-right"></a>
                                        @dump($histories->woman->last_menstrual_cycle ?? '')
                                    </li>
                                    <li class="list-group-item">
                                        <b>NO. of Live Births</b> <a class="float-right"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Last Menstrual Cycle</b> <a class="float-right"></a>
                                    </li>
                                @endif
                            </ul>

                        </div>
                        <!-- /.card-basic info end -->
                        <!-- /.card- women info start -->

                        <!-- /.card- eomrn info end -->

                        <div class="card card-primary card-outline" id="accordion">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Update Weight and Highet
                                    </h4>
                                </div>
                            </a>
                            {{-- form to update weight, hightt and blood type start --}}
                            <form method="POST" action="/clinic/doctor/detail/record/basic/{{ $student->id }}">
                                @csrf
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <!-- input -->
                                        <div class="form-group">
                                            <label>Blood Type</label>
                                            <input class="form-control" placeholder="Enter ..." name="blood_type" />
                                        </div>
                                        <!-- input -->
                                        <!-- input -->
                                        <div class="form-group">
                                            <label>Weight In Kg</label>
                                            <input class="form-control" placeholder="Enter ..." name="weight" />
                                        </div>
                                        <!-- input -->
                                        <div class="form-group">
                                            <label>Highet in meter</label>
                                            <input class="form-control" placeholder="Enter ..." name="height" />
                                        </div>
                                        <!-- input -->
                                        <input class="btn btn-primary btn-sm" type="submit">
                                    </div>
                                </div>
                            </form>
                            {{-- form to update weight, hightt and blood type --}}


                        </div>
                        @if ($student->sex == 'F')
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            Personal Questions for Girls
                                        </h4>
                                    </div>
                                </a>

                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    {{-- form to update  Femal info start --}}
                                    <form method="POST"
                                        action="/clinic/doctor/detail/record/basicg/{{ $student->id }}">
                                        @csrf
                                        <div class="card-body">
                                            <!-- input -->
                                            <div class="form-group">
                                                <label>Last Menstrual Cycle</label>
                                                <input class="form-control" placeholder="Enter ..."
                                                    name="last_menstrual_cycle" /> 

    
                                            </div>
                                            <!-- input -->
                                            <div class="form-group">
                                                <label>NO. of Pregnancies</label>
                                                <input class="form-control" placeholder="Enter ..."
                                                    name="number_of_pregnancies" />
                                            </div>
                                            <!-- input -->
                                            <div class="form-group">
                                                <label>NO. of Live Births</label>
                                                <input class="form-control" placeholder="Enter ..."
                                                    name="number_of_live_births" />
                                            </div>
                                            <!-- input -->
                                            <div class="form-group">
                                                <label>pregnancie_complications </label>
                                                <input class="form-control" placeholder="Enter ..."
                                                    name="pregnancie_complications" />
                                            </div>
                                            <!-- input -->
                                            <div class="form-group">
                                                <label>manopause_date</label>
                                                <input class="form-control" placeholder="Enter ..."
                                                    name="manopause_date" />
                                            </div>
                                            <!-- input -->
                                            <input class="btn btn-primary btn-sm" type="submit">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        @endif
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Medical
                                        Record</a></li>
                                <li class="nav-item"><a class="nav-link" href="#medication"
                                        data-toggle="tab">Medication</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="#lab_form" data-toggle="tab">Labratory
                                        Form</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#personal" data-toggle="tab">Personal
                                        Form</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">

                                        <!-- /.user-block -->
                                        <h3 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600">
                                            Medication History
                                        </h3>







                                        <!-- / medication card startcol -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">List of medication taken </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0 ">
                                                <table class="table  ">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Medication Name</th>
                                                            <th>Amount</th>
                                                            <th>Frequency</th>
                                                            <th>How Much</th>
                                                            <th>Reson</th>
                                                            <th class="float-right">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @dd($medhistories) --}}
                                                        @if ($medhistories)
                                                            @foreach ($medhistories as $key => $medhistory)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $medhistory->name ?? '' }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge bg-success">{{ $medhistory->amount ?? '' }}</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="badge bg-success">{{ $medhistory->frequency ?? '' }}</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="badge bg-success">{{ $medhistory->how_much ?? '' }}</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="badge bg-success">{{ $medhistory->why ?? '' }}</span>
                                                                    </td>
                                                                    <td class="float-right">
                                                                        <button type="button" class="btn btn-info btn-sm"
                                                                            data-toggle="modal" id="student_id_btn"
                                                                            data-target="#contact-modal"
                                                                            onclick="getMedicationIdEdit('{{ $medhistory->id }}', '{{ $medhistory->name }}', '{{ $medhistory->amount }}', '{{ $medhistory->frequency }}',' {{ $medhistory->how_much }}', '{{ $medhistory->why }}' )">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        {{-- <a href="/clinic/doctor/student/detail/med/delete/{{ $medhistory->id }}"
                                                                        class="btn btn-danger btn-sm">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a> --}}

                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            id="student_id_btn" data-toggle="modal"
                                                                            data-target="#deleteModal"
                                                                            data-whatever="@mdo"
                                                                            onclick="getMedicationIdDelete('{{ $medhistory->id }}' )">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>


                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /. medicatin card end-->





                                    </div>



                                    <!-- Post -->
                                    <div class="">

                                        <div class="post col-md-12">

                                            <!-- /.user-block -->
                                            <h3 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600">
                                                Personal History
                                            </h3>
                                            <!-- / medication card startcol -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Personal Behaviour and additional informaion
                                                    </h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0 table-responsive">
                                                    <table class="table w-full">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Conditions</th>
                                                                <th>Condition Description</th>
                                                                <th class="float-right">Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($personalmedhistories)
                                                                @foreach ($personalmedhistories as $key => $personalmedhistory)
                                                                    <tr>
                                                                        <td style="width: 10px">{{ $key + 1 }}</td>
                                                                        <td>{{ $personalmedhistory->disease_or_conditions ?? '' }}
                                                                        </td>
                                                                        <td>{{ $personalmedhistory->comments ?? '' }}t</td>
                                                                        <td class="float-right">
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm"
                                                                                data-toggle="modal" id="student_id_btn"
                                                                                data-target="#personalEditModal"
                                                                                onclick="getPersonalMedicationIdEdit('{{ $personalmedhistory->id }}', '{{ $personalmedhistory->disease_or_conditions }}', '{{ $personalmedhistory->comments }}' )">
                                                                                <i class="fas fa-edit"></i>
                                                                            </button>

                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                id="student_id_btn" data-toggle="modal"
                                                                                data-target="#deletePersonalModal"
                                                                                data-whatever="@mdo"
                                                                                onclick="getPersonalMedicationIdDelete('{{ $personalmedhistory->id }}' )">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /. medicatin card end-->




                                        </div>
                                        {{-- lab resukt list end --}}
                                        {{-- lab result list start --}}
                                        <div class="post col-md-12">

                                            <!-- /.user-block -->
                                            <h3 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600">
                                                Lab Result History
                                            </h3>
                                            <!-- / medication card startcol -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">List of Lab Results </h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0 ">
                                                    <table class="table  ">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Lab Request</th>
                                                                <th>Lab Result</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 0;
                                                                
                                                            @endphp
                                                            @foreach ($labhistories as $key => $medhistory)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td> {{ $labReq[$i]->title }}
                                                                    <td>{{ $medhistory->title }}</td>
                                                                    <td>
                                                                        {{ $medhistory->created_at->diffForHumans() }}
                                                                    </td>

                                                                </tr>
                                                                @php
                                                                    $i++;
                                                                    
                                                                @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /. medicatin card end-->




                                        </div>
                                        {{-- lab resukt list end --}}
                                        {{-- Personal info list end --}}



                                    </div>



                                </div>
                                <!-- /.tab- medication form start -->
                                <div class="tab-pane" id="medication">
                                    <!-- The timeline -->
                                    <form method="POST" action="/clinic/doctor/detail/record/med/{{ $student->id }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Name</label>
                                                    <input class="form-control" placeholder="Enter ..." name="name" />
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Amount</label>
                                                    <input class="form-control" placeholder="Enter ..." name="amount" />
                                                    @error('amount')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Frequency</label>
                                                    <input class="form-control" placeholder="Enter ..."
                                                        name="frequency" />
                                                    @error('frequency')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication How Much</label>
                                                    <input class="form-control" placeholder="Enter ..."
                                                        name="how_much" />
                                                    @error('how_much')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="why"></textarea>
                                                    @error('why')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer p-0 ">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                            {{-- <button type="submit" class="btn btn-primary btn-lg">New</button> --}}
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab- medication from end -->



                                <!-- /.tab- medication form start -->
                                <div class="tab-pane" id="personal">
                                    <!-- The timeline -->
                                    <form method="POST"
                                        action="/clinic/doctor/detail/record/personal/{{ $student->id }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Disease Or Conditionse</label>
                                                    <input class="form-control" placeholder="Enter ..."
                                                        name="disease_or_conditions" />

                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>About It</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="comments"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <!-- Bootstrap Switch -->
                                                <div class="card card-secondary">

                                                    <div class="card-body">
                                                        <input type="checkbox" name="current"
                                                            style="width:30px;height: 30px;" value="1">
                                                        <label>Still Active</label>

                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                                <div class="card-footer p-0 d-block">

                                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                                    {{-- <button type="submit" class="btn btn-primary btn-lg">New</button> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab- medication from end -->




                                <div class="tab-pane" id="lab_form">
                                    <form class="form-horizontal" method="POST"
                                        action="/clinic/doctor/detail/record/lab/{{ $student->id }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <!-- checkbox -->
                                                <ul class="list-group col-sm-12">
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="blood"
                                                                name="blood[]" value="Normal Blood" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="blood">Blood</label>
                                                        </div>

                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="faeces"
                                                                name="feaces[]" value="Normal Faeces" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="faeces">Faeces</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="urine"
                                                                name="urin[]" value="Normal Urine" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="urine">Urine</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sputum"
                                                                name="sputum[]" value="Normal Sputum" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="sputum">Sputum</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="swab"
                                                                name="swap[]" value="Normal Swap" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="swab">Swab</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="fluids"
                                                                name="fluids[]" value="Normal Fluids" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="fluids">Fluids</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="tissue"
                                                                name="tissue[]" value="Normal Tissue" type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="tissue">Tissue</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="cytology"
                                                                name="cytology[]" value="Normal Cytology"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="cytology">Cytology</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0" id="div_container">
                                                        <div class="custom-control custom-checkbox">


                                                        </div>
                                                    </li>
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" class="form-control" id="new_sample">
                                                        <span class="input-group-append">
                                                            <p id="add_new_sample" class="btn btn-info btn-lg">Add
                                                                Other, namely</p>
                                                        </span>
                                                    </div>
                                                    <script>
                                                        document.getElementById('add_new_sample').onclick = function() {
                                                            var checkbox = document.createElement('input');
                                                            var new_sample = document.getElementById("new_sample").value;
                                                            // console.log(new_sample);
                                                            checkbox.type = 'checkbox';
                                                            checkbox.id = new_sample;
                                                            checkbox.name = new_sample;
                                                            checkbox.value = new_sample;

                                                            var label = document.createElement('label')
                                                            label.htmlFor = new_sample;
                                                            label.appendChild(document.createTextNode(new_sample));

                                                            var br = document.createElement('br');

                                                            var container = document.getElementById("div_container");
                                                            console.log(checkbox);
                                                            console.log(container.html)
                                                            container.appendChild(checkbox);
                                                            container.appendChild(label);
                                                            container.appendChild(label);
                                                            console.log(label);
                                                            // container.appendChild(br);
                                                        }
                                                    </script>
                                                </ul>
                                            </div>
                                            <div class="col-sm-9">
                                                <!-- checkbox -->
                                                <ul class="list-group col-sm-12 font-weight-light">
                                                    {{-- start of blood samples --}}

                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="blooda"
                                                                    name="blood[]" value="Hemoglobin " type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="blooda">Hb</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodb"
                                                                    name="blood[]" value="Hematocrit " type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodb">HCT</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodc"
                                                                    name="blood[]" value="White Blood Cell count "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodc">WBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodd"
                                                                    name="blood[]" value="Red Blood Cell count "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodd">RBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloode"
                                                                    name="blood[]" value="Platelet count "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloode">PLT</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodf"
                                                                    name="blood[]" value="Mean corpuscular volume "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodf">MCV</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodg"
                                                                    name="blood[]" value="Absolute neutrophil count"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodg">ANC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodh"
                                                                    name="blood[]" value=" Mean corpuscular hemoglobin"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodh">MCH</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodi"
                                                                    name="blood[]"
                                                                    value="Mean corpuscular hemoglobin concentration"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="bloodi">MCHC</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- end of blood samples --}}
                                                    {{-- start of Faeces samples --}}
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesa"
                                                                    name="feaces[]" value="Complete Blood Count"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="faecesa">CBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesb"
                                                                    name="feaces[]" value="Glucose" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacesb">GLU</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesc"
                                                                    name="feaces[]" value="Blood Urea Nitrogen"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacesc">BUN</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesd"
                                                                    name="feaces[]" value="Sodium" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacesd">NA</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacese"
                                                                    name="feaces[]" value="Potassium" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacese">K</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesf"
                                                                    name="feaces[]" value="Chloride" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacesf">CL</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesg"
                                                                    name="feaces[]" value="Carbon Dioxide"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacesg">CO2</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesh"
                                                                    name="feaces[]" value="PHOS" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="feacesh"><span
                                                                        class="text-sm">Phosphrs</span></label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- end of Faeces samples --}}


                                                    {{-- start of Urien samples --}}

                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urina"
                                                                    name="urin[]" value="Complete Blood Count"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urina">CBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urineb"
                                                                    name="urin[]" value="Urine Analysis"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urineb">U/A</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urinc"
                                                                    name="urin[]" value="Basic Metabolic Panel"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urinc">BMP</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urind"
                                                                    name="urin[]" value="Liver Function Tests"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urind">LFT</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urine"
                                                                    name="urin[]" value="Comprehensive Metabolic Panel"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urine">CMP</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urinf"
                                                                    name="urin[]" value="Lipid Profile" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urinf">Lipid </label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urinf"
                                                                    name="urin[]"
                                                                    value="Prothrombin Time/International Normalized Ratio"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="urinf">PT/INR </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- end of Urien samples --}}

                                                    {{-- start of Sputum samples --}}

                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputuma"
                                                                    name="sputum[]" value="Color" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputuma">C</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumb"
                                                                    name="sputum[]" value="Appearance" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumb">A</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumc"
                                                                    name="sputum[]" value="Odor" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumc">O</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumd"
                                                                    name="sputum[]" value="Amount" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumd">Am</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputume"
                                                                    name="sputum[]" value="PH" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputume">Ph</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumf"
                                                                    name="sputum[]" value="Microbial Content"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumf">MC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumg"
                                                                    name="sputum[]" value="Red Blood Cells"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumg">RBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumh"
                                                                    name="sputum[]" value="White  Blood Cells"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumh">WBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumi"
                                                                    name="sputum[]" value="Atypical Cells"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="sputumi">AC</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- end of Sputum samples --}}

                                                    {{-- Start of Swab samples --}}

                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapa"
                                                                    name="swap[]" value="Total Plate Count"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swapa">TPC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapb"
                                                                    name="swap[]" value="Total Coliform Count"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swapb">TCC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapc"
                                                                    name="swap[]" value="Escherichia coli"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swapc">E. coli</label>
                                                            </div>


                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapd"
                                                                    name="swap[]" value="Enterococci " type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swapd">ENT</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swape"
                                                                    name="swap[]" value="Salmonella spp "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swape">Sspp</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapf"
                                                                    name="swap[]" value="Clostridium perfringens"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swapf"><span class="text-sm">C.
                                                                        perfris</span></label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapg"
                                                                    name="swap[]" value="Staphylococcus aureus"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swapg">S. aur</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swaph"
                                                                    name="swap[]" value="Total Yeast and Mold"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="swaph">TYM</label>
                                                            </div>

                                                        </div>
                                                    </li>
                                                    {{-- end of Swab samples --}}
                                                    {{-- start of Fluids samples --}}
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsa"
                                                                    name="fluids[]" value="Visual Inspection"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsa">V</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsb"
                                                                    name="fluids[]" value="Viscosity" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsb">VIS</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsc"
                                                                    name="fluids[]" value="Flow Rate" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsc">FR</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsd"
                                                                    name="fluids[]" value="Specific Gravity "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsd">SG</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidse"
                                                                    name="fluids[]" value="Chlorides " type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidse">Cl</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsf"
                                                                    name="fluids[]" value="Turbidity" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsf">TUR</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsg"
                                                                    name="fluids[]" value="Nitrate" type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsg">NO3</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsh"
                                                                    name="fluids[]" value="Total Dissolved Solids"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsh">TDS</label>
                                                            </div>


                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsi"
                                                                    name="fluids[]" value="Total Suspended  Solids"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="fluidsi">TDS</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- end of Fluids samples --}}
                                                    {{-- start of Tissue samples --}}
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissuea"
                                                                    name="tissue[]" value="Hematocrit " type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="tissuea">HCT</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissueb"
                                                                    name="tissue[]" value="Mean Corpuscular Hemoglobin "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="tissueb">MCH</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissuec"
                                                                    name="tissue[]" value="Mean Corpuscular Volume "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="tissuec">THBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissued"
                                                                    name="tissue[]" value="Mean Corpuscular Volume  "
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="tissued">MCV</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissuee"
                                                                    name="tissue[]"
                                                                    value="Mean Corpuscular Hemoglobin Concentration"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="tissuee">MCHC </label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="cytologya"
                                                                    name="cytology[]" value="Cytology Type 1"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="cytologya">TRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="cytologyb"
                                                                    name="cytology[]" value="Cytology Type 2"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="cytologyb">TWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="cytologyc"
                                                                    name="cytology[]" value="Cytology Type 3"
                                                                    type="checkbox">
                                                                <label style="max-width: 60px; min-width: 60px"
                                                                    class="cursor-pointer   custom-control-label"
                                                                    for="cytologyc">THBC</label>
                                                            </div>
                                                        </div>
                                                    </li>





                                                </ul>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    {{-- //only show if the studen is in queue --}}
                    @if ($queue)
                        <div class="d-flex">
                            <form method="POST" action="/clinic/doctor/detail/{{ $student->id }}">
                                @csrf
                                @method('DELETE')
                                <div class="flex gap-2 m-2 flex-col">
                                    <button type="submit"Lab Descriptio class="btn btn-danger w-10">DONE</button>
                                </div>
                            </form>
                            <form method="POST" action="/clinic/doctor/detail/status/{{ $student->id }}">
                                @csrf
                                <div class="flex gap-2 m-2 flex-col">
                                    <button type="submit"Lab Descriptio class="btn btn-warning w-10">Wait FOR LAB
                                        RESULT</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
            {{-- @dd(request()); --}}
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->

    {{-- edit medical history script starts here --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        function contactModal() {
            $('#contact-modal').modal('show');
        }

        function personalModal() {
            $('#personalEditModal').modal('show');
        }

        $(document).ready(function() {

                // Get all modal elements
                let errorMedMessage = "{{ session('error_med_message') }}";
                if (errorMedMessage) {
                    @if ($errors->any() == true)
                        contactModal();
                    @endif
                }

                let errorPerMessage = "{{ session('error_per_message') }}";
                if (errorPerMessage) {
                    @if ($errors->any() == true)
                        personalModal();
                    @endif

                }
            }




        );

        // get the medical id and other atributes to fill the edit inputs field with the old values 
        function getMedicationIdEdit(id, name, amount, frequency, how_much, why) {
            document.getElementById('medical_id_id_edit').value = id;
            document.getElementById('em_name').value = name;
            document.getElementById('em_amount').value = amount;
            document.getElementById('em_frequency').value = frequency;
            document.getElementById('em_how_much').value = how_much;
            document.getElementById('em_why').value = why;
            console.log(id);
        }

        //get medical id onlu for delete medicen
        function getMedicationIdDelete(id) {
            document.getElementById('medical_id_id_delete').value = id;
            console.log(id);
        }
        //get personal behavior for edit and pass the values with id to the model inputs
        function getPersonalMedicationIdEdit(id, disease_or_conditions, comments) {
            document.getElementById('personal_id_id_edit').value = id;
            document.getElementById('id_disease_or_conditions').value = disease_or_conditions;
            document.getElementById('id_comments').value = comments;
            console.log(id);

        }
        //get personal medical id for delte modal
        function getPersonalMedicationIdDelete(id) {
            document.getElementById('personal_id_id_delete').value = id;
            console.log(id);
        }
    </script>



    {{-- edit medical history script starts here --}}
@endsection
