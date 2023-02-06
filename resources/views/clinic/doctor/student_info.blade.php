{{-- view for student detail  --}}
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    
                    <div class="card card-primary card-outline">
                        <!-- /.card-basic info start -->
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">{{ $student->first_name . ' ' . $student->last_name }}
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
                                    <b>Blood Type</b> <a class="float-right">{{ $histories->blood_type }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Highet</b> <a class="float-right">{{ $histories->height }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Weight</b> <a class="float-right">{{ $histories->weight }}</a>
                                </li>
                                @if ($student->sex == 'F')
                                    <li class="list-group-item">
                                        <b>NO. of Pregnancies</b> <a class="float-right"></a>
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
                                    {{-- form to update weight, Femal info start --}}
                                    <form method="POST" action="/clinic/doctor/detail/record/basicg/{{ $student->id }}">
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
                                                <input class="form-control" placeholder="Enter ..." name="manopause_date" />
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
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Medical
                                        Record</a></li>
                                <li class="nav-item"><a class="nav-link" href="#medication" data-toggle="tab">Medication</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#lab_form" data-toggle="tab">Labratory
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
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($medhistories as $key => $medhistory)
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>{{ $medhistory->name }}</td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-success">{{ $medhistory->amount }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-success">{{ $medhistory->frequency }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-success">{{ $medhistory->how_much }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-success">{{ $medhistory->why }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
                                                <div class="card-body p-0 ">
                                                    <table class="table  ">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Conditions</th>
                                                                <th>Condition Description</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($personalmedhistories as $key => $personalmedhistory)
                                                                <tr>
                                                                    <td style="width: 10px">{{ $key + 1 }}</td>
                                                                    <td>{{ $personalmedhistory->disease_or_conditions }}
                                                                    </td>
                                                                    <td>{{ $personalmedhistory->comments }}t</td>

                                                                </tr>
                                                            @endforeach
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
                                                                $i=0;

                                                            @endphp
                                                            @foreach ($labhistories as $key => $medhistory)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td> {{ $labReq[$i]->title }}
                                                                <td>{{ $medhistory->title }}</td>
                                                                <td>New</td>

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
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Amount</label>
                                                    <input class="form-control" placeholder="Enter ..." name="amount" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Frequency</label>
                                                    <input class="form-control" placeholder="Enter ..."
                                                        name="frequency" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication How Much</label>
                                                    <input class="form-control" placeholder="Enter ..."
                                                        name="how_much" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="why"></textarea>
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
                                            </div>


                                        </div>
                                        <div class="card-footer p-0 ">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                            {{-- <button type="submit" class="btn btn-primary btn-lg">New</button> --}}
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab- medication from end -->




                                <div class="tab-pane" id="lab_form">
                                    <form class="form-horizontal" method="POST"
                                        action="/clinic/doctor/detail/record/lab/{{ $student->id }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-6">
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
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox" id="div_container">


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

                                                            var container = document.getElementById(div_container);
                                                            console.log(checkbox);
                                                            //container.appendChild(checkbox);
                                                            // container.appendChild(label);
                                                            // container.appendChild(br);
                                                        }
                                                    </script>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <ul class="list-group col-sm-12">
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="blooda"
                                                                    name="blood[]" value="Bood Type 1" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="blooda">RBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodb"
                                                                    name="blood[]" value="Bood Type 2" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="bloodb">WBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="bloodc"
                                                                    name="blood[]" value="Bood Type 3" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="bloodc">HBC</label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesa"
                                                                    name="feaces[]" value="Faecesa Type 1"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="faecesa">FRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesb"
                                                                    name="feaces[]" value="Faecesa Type 2"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="feacesb">FWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="feacesc"
                                                                    name="feaces[]" value="Faecesa Type 3"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="feacesc">FHBC</label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urina"
                                                                    name="urin[]" value="Urine Type 1" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="urina">URBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urineb"
                                                                    name="urin[]" value="Urine Type 2" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="urineb">UWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="urinc"
                                                                    name="urin[]" value="Urine Type 3" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="urinc">UHBC</label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputuma"
                                                                    name="sputum[]" value="Sputuma Type 1"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="sputuma">SRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumb"
                                                                    name="sputum[]" value="Sputuma Type 2"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="sputumb">SWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="sputumc"
                                                                    name="sputum[]" value="Sputuma Type 3"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="sputumc">SHBC</label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapa"
                                                                    name="swap[]" value="Swap Type 1" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="swapa">SRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapb"
                                                                    name="swap[]" value="Swap Type 2" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="swapb">SWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="swapc"
                                                                    name="swap[]" value="Swap Type 3" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="swapc">HBC</label>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsa"
                                                                    name="fluids[]" value="Fluid Type 1" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="fluidsa">FRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsb"
                                                                    name="fluids[]" value="Fluid Type 2" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="fluidsb">FWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="fluidsc"
                                                                    name="fluids[]" value="Fluid Type 3" type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="fluidsc">FHBC</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissuea"
                                                                    name="tissue[]" value="Tisseu Type 1"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="tissuea">TRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissueb"
                                                                    name="tissue[]" value="Tisseu Type 2"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="tissueb">TWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="tissuec"
                                                                    name="tissue[]" value="Tisseu Type 3"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="tissuec">THBC</label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="cytologya"
                                                                    name="cytology[]" value="Cytology Type 1"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="cytologya">TRBC</label>
                                                            </div>

                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="cytologyb"
                                                                    name="cytology[]" value="Cytology Type 2"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
                                                                    for="cytologyb">TWBC</label>
                                                            </div>
                                                            <div class="d-inline m-4">
                                                                <input class="custom-control-input " id="cytologyc"
                                                                    name="cytology[]" value="Cytology Type 3"
                                                                    type="checkbox">
                                                                <label class="cursor-pointer  custom-control-label"
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
                            <button type="submit"Lab Descriptio class="btn btn-warning w-10">WAITI FOR LAB RESULT</button>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
@endsection
