<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,png',
            ]
            ]);

            if ($request->file('file')->isValid([])) {
                $path = $request->file->store('public');
                return view('home')->with('filename', basename($path));
            } else {
                return redirect()
                    ->back()
                    ->without()
                    ->withErrors();
            }
    }
}
