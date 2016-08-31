<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;

class CoursesController extends Controller
{
    public function index(Request $request)
    {

        $str = $request->get('str', "");
        if ($str) {
            $courses = Course::search($str)->get();
        } else {
            $courses = Course::all();
        }
        return view('courses.index', compact("str", "courses"));
    }
}
