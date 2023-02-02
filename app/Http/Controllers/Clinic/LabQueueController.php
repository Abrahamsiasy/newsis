<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Models\Clinic\LabQueue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LabQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //the assistan will accept the requestes an dupdate the queue based on lab request id to the queue
        //dd(LabQueue::where('status', "0")->paginate(25));


        //dd("lab queue");

        return view('clinic.queue.lab_queue',
        [
            'queues' => LabQueue::where('status', "0")->paginate(25),
            'queuesdoc' => LabQueue::where('status', "1")->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cu()
    {
        //
        return view('clinic.queue.cu');
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
    public function show($id)
    {
        //
    }

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
