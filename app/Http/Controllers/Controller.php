<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir;

    /**
     * Show view with / without data.
     *
     * @param  string  $view
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    protected function view($view, $data = [])
    {
        return view($this->viewDir.'.'.$view, $data);
    }
}
