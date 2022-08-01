<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $msg;

    public function __construct()
    {
        $this->msg = "Olá Controller";
    }

    public function index()
    {
        echo $this->msg;
        dd($this);
    }
}
