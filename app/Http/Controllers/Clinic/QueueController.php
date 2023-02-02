<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic\Queue;


class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return list of students accepted by the doctor
        //$waitingQueue = Queue::where('status', 1)->paginate(25);
        //dd($waitingQueue->count());
        // foreach ($waitingQueue as $key => $value) {
        //     # code...
        //     echo($value). "<hr>";
        // }
        //$queue = Queue::where('status', 0)->paginate(25);


        return view('clinic.queue.queue', [
            'queues' => Queue::where('status', "0")->paginate(25),
            'queuesdoc' => Queue::where('status', "1")->paginate(25),
        ]);
    }

    
    public function destroy($id)
    {
        //
    }
}
