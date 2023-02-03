<?php

namespace App\Http\Controllers\Clinic;

use App\Models\Student;

use App\Models\Clinic\Queue;
use App\Models\Clinic\Women;
use Illuminate\Http\Request;
use App\Models\Clinic\LabQueue;
use App\Models\Clinic\LabResult;
use App\Models\Clinic\LabRequest;
use App\Models\Clinic\Medication;
use App\Models\Clinic\Room;

use App\Http\Controllers\Controller;
use App\Models\Clinic\MedicalRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinic\PersonalRecord;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd(Room::all());
        //get user id from auth
        $userId = Auth::user()->id;
        //dd($userId);

        // $medicalRecord = MedicalRecord::whereRaw('status = 1 AND doctor_id = 2' )->first();
        // dd($medicalRecord->student->student_id);
        return view('clinic.doctor.doctor', [
            'students' => Queue::where('status', 0)->paginate(25),
            'emergency' => Queue::where('status', 5)->paginate(25),
            'minidemer' => Queue::whereRaw('status = 5 ORDER BY id')->first(),
            'minid' =>  Queue::whereRaw('status = 0 ORDER BY id')->first(),
            'rooms' => Room::all()

        ]);
    }
    //getRoom for the doctor
    public function getRoom(Request $request){
       //error_log($request->get('id'));
       // FInd a room with the given id
       $room = Room::where('id', $request->get('id'))->first();
       error_log($room);
       //dd($room);
       return $room;
    }

    //function changeRoom 
    public function changeRoom(Request $request){
        //get usther fro muther auth 
        $user = Auth::user()->id;
        $room = Room::where('id', $request->get('room_id'))->first();

        $room = Room::where('id', $request->get('room_id'))->first();
        //dd($room->id);
        $room->user_id = $user;
        $room->save();
        //redirect back with a succes message


        
        return redirect()->back()->with('success', 'Succesfully changed the room');
    }

    //get queid and change the status when it get accepted
    public function changeQueueStatus($student_id){
        $queueid = Queue::where('student_id', $student_id)->first();
        $queue = Queue::where('id', $queueid->id)->first();
        $queue->doctor_id = auth()->user()->id;
        $queue->status = 1;
        if($queue->save()){
            return 1;
        } else {
            return 0;
        }
        
    }
    public function show(
        Student $student,
        MedicalRecord $histories
    ) {

        //dd(self::changeQueueStatus($student->id));
        //change queue status of the student when doctor accepts
        $queueid = Queue::where('student_id', $student->id)->first();
        //dd($queue->id);
        //update queue status

        /* $queue = Queue::where('id', $queueid->id)->first();
        $queue->doctor_id = auth()->user()->id;
        $queue->status = 1;
        $queue->save();
        //dd($queue);
        */


        //
        if(self::changeQueueStatus($student->id)){
           $histories = MedicalRecord::where('student_id', $student->id)->first();
            //dd($histories);
            $labReq=[];

            $labhistories = LabResult::where('student_id', $student->id)->get(); 
            foreach ($labhistories as $lab){
                $var=LabRequest::where('id',$lab->lab_request_id)->first();
                // dd($lab->lab_request_id );
                array_push($labReq,$var);
            }
            // dd($labReq);
            // dd($labhistories[0]);

        }
        
        //dd($labhistories); // returns empty array
        //dd(count(Medication::where('medicalhistories_id', $histories->id)->get()))


        //check if the student id existes in medical history table
        if ($histories === null) {
            //ID does not exist it will create a new history table
            $medicalhistories = new MedicalRecord();
            $medicalhistories->student_id = $student->id;
            $medicalhistories->doctor_id  = auth()->user()->id;
            //save the history table
            $medicalhistories->save();

            //$medhistories = Medication::where('medicalhistories_id', $histories->id)->get();

        } else {
            //ID exists
            $medhistories = Medication::where('medical_record_id', $histories->id)->get();
            $personalmedhistories = PersonalRecord::where('medical_record_id', $histories->id)->get();
            // dd($medhistories);
        }
        //dd($histories);



        //dd($labhistoriess);

        // dd($historiess);
        //dd($medhistories);
        return view('clinic.doctor.student_info', [
            'student' => $student,
            'histories' => $histories,
            'labhistories' => $labhistories,
            'medhistories' => $medhistories,
            'labReq'=> $labReq,
            'personalmedhistories' => $personalmedhistories
        ]);
    }

    public function updateBasicRecord(Request $request, Student $student){

        $formField = $request->validate([
            'blood_type' => 'required',
            'height'  => 'required',
            'weight' => 'required',
        ]);
        $histories = MedicalRecord::where('student_id', $student->id)->first();
        $personalmedicalrecord = new PersonalRecord();

        $histories->blood_type = $formField['blood_type'];
        $histories->height = $formField['height'];
        $histories->weight = $formField['weight'];
        //dd($personalmedicalrecord);
        $histories->save();
        if($histories->save()){
            //dd("Success");
            return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
        }
        // // or anther method
        //redirect to its own page
        return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
    }

    public function updateGBasicRecord(Request $request, Student $student){

        $formField = $request->validate([
            'last_menstrual_cycle' => 'required',
            'number_of_pregnancies'  => 'required',
        ]);
        //$histories = MedicalRecord::where('student_id', $student->id)->first();
        if($request->number_of_live_births == null){
            $number_of_live_births = 0;
        }
        if($request->pregnancie_complications == null){
            $pregnancie_complications = 0;
        }
        if($request->manopause_date == null){
            $manopause_date = 0;
        }
        $histories = new Women();

        $histories->last_menstrual_cycle = $formField['last_menstrual_cycle'];
        $histories->number_of_pregnancies = $formField['number_of_pregnancies'];
        $histories->number_of_live_births = $number_of_live_births;
        $histories->pregnancie_complications = $pregnancie_complications;
        $histories->manopause_date = $manopause_date;
        //dd($personalmedicalrecord);
        $histories->save();
        if($histories->save()){
            //dd("Success");
            return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
        }
        // // or anther method
        //redirect to its own page
        return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
    }
    //get doctor id from loged in user(AUTH) the creat a lab report
    //with that doctor id for lab que and create lab que to be edited
    //with lab assistant id then redirect back to doc page with list of student
    //to be accepted
    public function storeLabRequests(Request $request, Student $student)
    {
        $a = 1;


        //create lab que with labreport id
        $labQueue = new LabQueue();
        $labQueue->student_id = $student->id;
        $labQueue->student_id = $student->id;
        $labQueue->save();
        //get all values from the check box except the token and save to lab queue
        if($labQueue->id){
           foreach ($request->except('_token') as $req) {
            foreach ($req as $labRequest) {
                //echo $a++ . $labRequest . "<hr>";
                $labRequests = new labRequest();
                $labRequests->title = $labRequest;
                $labRequests->description = $labRequest;
                $labRequests->student_id = $student->id;
                $labRequests->doctor_id = auth()->user()->id;
                $labRequests->lab_queue_id = $labQueue->id;

                // echo $labRequest . "<hr>";
                $labRequests->save();
            }
            return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Lab sent!');
        } 
        }
        
        //dd($labReport->id);
        //Labreport::create($formField);

        if ($labRequests->id) {
            //create lab que with labreport id
            $labQueue = new LabQueue();
            $labQueue->lab_request_id = $labRequests->id;
            $labQueue->student_id = $student->id;
            $labQueue->student_id = $student->id;
            $labQueue->save();
            // dd($labQueue->id);

            //redirect to its own page
            return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Lab sent!');
        }
    }
    //storeMedRecord
    public function storeMedRecord(Request $request, Student $student)
    {
        $formField = $request->validate([
            'name' => 'required',
            'amount'  => 'required',
            'frequency' => 'required',
            'why' => 'required',
            'how_much' => 'required'

        ]);
        $histories = MedicalRecord::where('student_id', $student->id)->first();
        // $formField['doctor_id '] = auth()->user()->id;
        // $formField['student_id '] = $student->id;
        // $formField['medical_record_id '] = $histories->id;
        // dd($formField);
        $medicalrecord = new Medication();

        $medicalrecord->name = $formField['name']; //name
        $medicalrecord->amount = $formField['amount']; //amount in grams
        $medicalrecord->frequency = $formField['frequency']; //daily how often
        $medicalrecord->why = $formField['why']; //why 
        $medicalrecord->how_much = $formField['how_much']; //how many pills
        $medicalrecord->medical_record_id = $histories->id;
        $medicalrecord->save();
        //dd($medicalrecord->id);
        // // or anther method


        //redirect to its own page
        return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
    }



    //storeMedRecord
    public function storePersonalRecord(Request $request, Student $student)
    {
        //dd($request);
        $formField = $request->validate([
            'disease_or_conditions' => 'required',
            'comments' => 'required'

        ]);
        if($request->current == null){
            $current = 0;
        } else {
            $current = 1;
        }
        $formField['current'] = $current;
        //dd($formField);
        //dd($request);
        $histories = MedicalRecord::where('student_id', $student->id)->first();
        // $formField['doctor_id '] = auth()->user()->id;
        // $formField['student_id '] = $student->id;
        // $formField['medical_record_id '] = $histories->id;
        // dd($formField);
        $personalmedicalrecord = new PersonalRecord();

        $personalmedicalrecord->disease_or_conditions = $formField['disease_or_conditions'];
        $personalmedicalrecord->current = $formField['current'];
        $personalmedicalrecord->comments = $formField['comments'];
        $personalmedicalrecord->medical_record_id = $histories->id;
        //dd($personalmedicalrecord);
        $personalmedicalrecord->save();
        // // or anther method


        //redirect to its own page
        return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
    }


    //delete que where student id is given
    public function delete(Student $student)
    {
        //find queue where student_id = $student->id
        $queue = Queue::where('student_id', $student->id)->first();
        //dd($queue);

        $queue->delete();

        return redirect('/clinic/doctor')->with('status', 'Queue deleted!');
    }
}
