<?php

namespace App\Http\Controllers\Clinic;

use App\Models\Student;
use App\Models\Clinic\Queue;
use Illuminate\Http\Request;
use App\Models\Clinic\Campus;
use App\Http\Controllers\Controller;


class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(Student::paginate(50));

        return view('clinic.reception.index', [
                'students' => Student::paginate(50),
             'campus' => Campus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Student $student)
    {
        //
        //dd($student->student_id);
        //dd($request->except('_token'));
        
        // $formField['student_id'] = $student->id;
        // $formField['status'] = "$request->status";
        //dd($formField['status']);
        //Queue::create($formField);
                
        $input = new Queue;
        $input->student_id = $student->id;
        $input->status = $request->status;
        $input->save();
        //dd($input);
        //return view students
        return redirect('/clinic/reception')->with('status', $student->student_id . 'Added To Queue list');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
