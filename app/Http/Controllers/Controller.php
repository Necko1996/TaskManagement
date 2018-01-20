<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
     * @param  string $view
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    protected function view($view, $data = [])
    {
        return view($this->viewDir.'.'.$view, $data);
    }
}
