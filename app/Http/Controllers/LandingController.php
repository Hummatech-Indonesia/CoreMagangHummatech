<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\DivisionInterface;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private DivisionInterface $divsion;
    private CourseInterface $course;
    public function __construct(DivisionInterface $divsion , CourseInterface $course)
    {
        $this->divsion = $divsion;
        $this->course = $course;
    }
    public function index()
    {
        $courses = $this->course->getPaid();
        $divisions = $this->divsion->get();
        return view('landing.index' ,compact('divisions' , 'courses'));
    }
}
