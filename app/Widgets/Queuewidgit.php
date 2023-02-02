<?php

namespace App\Widgets;

use App\Models\Clinic\Queue;
use Arrilot\Widgets\AbstractWidget;

class Queuewidgit extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    public $reloadTimeout = 10;
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.queuewidgit', [
            'config' => $this->config,
            'queues' => Queue::where('status', 0)->paginate(25),
            'queuesdoc' => Queue::where('status', 1)->paginate(25),
        ]);
    }
}
