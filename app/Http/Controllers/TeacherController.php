<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(){
        $students = Students::all();

        return view('home',compact('students'));
    }
}
