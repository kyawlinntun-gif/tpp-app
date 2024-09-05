<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SutdentController extends Controller
{
    public function index()
    {
        // return view('students.index');

        $students = [
            [
                "name" => "Bob"
            ],
            [
                "name" => "Alice"
            ],
            [
                "name" => "Tom"
            ],
            [
                "name" => "David"
            ]
        ];

        return view('students.index', compact('students'));
    }
}
