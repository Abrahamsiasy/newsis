<?php

namespace App\Widgets;

use App\Models\Clinic\LabQueue;
use Arrilot\Widgets\AbstractWidget;

class LabQueuewidgit extends AbstractWidget
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
        //
        //dd(LabQueue::all());
        return view('widgets.lab_queuewidgit', [
            'config' => $this->config,
            'queues' => LabQueue::where('status', 0)->paginate(25),
            'queuesdoc' => LabQueue::where('status', 1)->paginate(25),
        ]);
    }
}
