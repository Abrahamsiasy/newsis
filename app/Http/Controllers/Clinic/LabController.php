<?php

namespace App\Http\Controllers\Clinic;

use App\Models\Student;
use App\Models\Clinic\Room;
use App\Models\Clinic\Queue;
use Illuminate\Http\Request;
use App\Models\Clinic\LabQueue;
use App\Models\Clinic\LabResult;
use App\Models\Clinic\LabRequest;
use App\Http\Controllers\Controller;
use App\Models\Clinic\MedicalRecord;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(LabRequest::where('status', "0")->paginate(25));
        
        return view('clinic.lab.lab', [
            'LabRequests' => LabRequest::where('status', "0")->paginate(25),
            //get rooms with null user id
            'rooms' => Room::whereNull('user_id')->get(),
        ]);
    }



    public function show(
        Student $student, LabRequest $labRequest
    ) {
        //get the request then find the queue_id from the request and change the lab queue status based on
        $labRequestId = basename($_SERVER['REQUEST_URI']);//get the request id
        // dd($labRequestId);

        //get single request to change it status
        $labRequest = LabRequest::find($labRequestId);
        //dd($labRequest);
        $labQueue = LabQueue::where('id', $labRequest->lab_queue_id)->first();//Get the lab queue based on the request id
        //dd($labQueue);
        $labRequest->status = "1"; //change labrequest status
        $labRequest->save();
        $labQueue->lab_assistant_id  = auth()->user()->id;
        $labQueue->status = "1"; //change lab queue status
        $labQueue->save();
        //dd($labQueue);

        //get all requests with status 0 that belongs to the queue and count 
        $results = LabRequest::where('status', '=', 0)
            ->where('lab_queue_id', '=', $labRequest->lab_queue_id)
            ->get();
        //dd($results);
        //total number of lab requests that belong to the queue
        $total = $results->count();
        
        //get the lab report based on lab queue id
        $labRequest = LabRequest::where('id', $labRequestId)->first();
        //dd($labRequest->id);

        return view('clinic.lab.result', [
            'student' => $student,
            'labRequest' => $labRequest
        ]);
    }



    public function storeLabResults(Request $request, Student $student)
    {
        //dd($student->id);
        $formField = $request->validate([
            'title' => 'required'

        ]);
        //get the request then find the queue_id from the request and change the lab queue status based on
        $labRequestId = basename($_SERVER['REQUEST_URI']);//get the request id
        $labRequest = LabRequest::find($labRequestId);
        //dd($student->id);
        //dd($labrequest->labReques_id);



        $labResult = new LabResult();
        $labResult->title = $request->title;
        $labResult->student_id = $student->id;
        $labResult->lab_request_id = $labRequestId;
        $labResult->lab_assistant_id = auth()->user()->id;
        //dd($result);
        $labResult->save();



        //get all requests with status 0 that belongs to the queue and count 
        $results = LabRequest::where('status', '=', 0)
            ->where('lab_queue_id', '=', $labRequest->lab_queue_id)
            ->get();
        //total number of lab requests that belong to the queue
        $total = $results->count();
        //dd($total);
        if(!$total){
             //get the labque id and delte * from lab queue so it disapears from the labque list    
            $labque = LabQueue::find($labRequest->lab_queue_id);
            $labque->delete();

            //change medical_record status to 1 so it can notify the doctor about the labe result
            $medicalRecord = MedicalRecord::where('student_id', $student->id)->first();
            $medicalRecord->status = 1;
            $medicalRecord->save();
            //after the labque is delted the it needs to create main que back to the doctor get doector id from lab report and put it back
            $queue = new Queue();
            $queue->student_id = $student->id;
            $queue->doctor_id = $labRequest->doctor_id;
            $queue->status = 1;
            $queue->save();
            return redirect('/clinic/lab')->with('status', 'Lab Result submited to the doctor');
        } else {
            //create a queue for the student with status 1 and update its medical record status to 1 so it can notify the doctor about the labe result
            // $labRequest = LabRequest::where('student_id', $student->id)->first();
            // $queue = new Queue();
            // $queue->student_id = $student->id;
            // $queue->doctor_id = $labRequest->doctor_id;
            // $queue->status = 0;
            // $queue->save();
            //dd($queue);
            return redirect('/clinic/lab')->with('status', 'Lab Result submited to the doctor');
        }
    }



    public function getRoom(Request $request)
    {
        //error_log($request->get('id'));
        // FInd a room with the given id
        $room = Room::where('id', $request->get('id'))->first();
        error_log($room);
        //dd($room);
        return $room;
    }



    //function changeRoom 
    public function changeRoom(Request $request)
    {
        //get the user
        $user = Auth::user()->id;
        //get the room the user belongs to and set it to null
        $room = Room::where('user_id', $user)->first();
        $room->user_id = NULL;
        //dd($room);
        $room->save();

        $room = Room::where('id', $request->get('room_id'))->first();
        //dd($room->id);
        $room->user_id = $user;
        $room->save();
        //redirect back with a succes message
        return redirect()->back()->with('success', 'Succesfully changed the room');
    }

}
