<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodbyeController extends Controller
{
    public function index()
    {
        $goodbye = 'goodbye!';

        return view('goodbye', ['goodbye' => $goodbye]);
    }
}
