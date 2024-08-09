<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $data = [];
    protected $perpage = 5;

    public function __construct()
    {
        $this->data['perpage'] = $this->perpage;
    }

    protected function loadTheme($view,$data = []){
        return view('themes/'.env('APP_THEME','default'). '/' . $view, $data);
    }
}
