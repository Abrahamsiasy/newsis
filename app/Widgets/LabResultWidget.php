<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Clinic\MedicalRecord;

class LabResultWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    public $reloadTimeout = 10;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //get user id from auth
        //$userId = Auth::user()->id;
        //dd($userId);
        // $medicalRecord = MedicalRecord::whereRaw('status = 1 AND doctor_id = 2' )->get();
        // dd($medicalRecord);
        return view('widgets.lab_result_widget', [
            'config' => $this->config,
            'newLabResults' => MedicalRecord::whereRaw('status = 1 AND doctor_id = 2' )->get(),
        ]);
    }
}
