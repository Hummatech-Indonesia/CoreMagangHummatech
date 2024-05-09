<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\StudentInterface;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private DivisionInterface $divsion;
    private CourseInterface $course;
    private StudentInterface $student;
    private ProductInterface $product;
    public function __construct(DivisionInterface $divsion, CourseInterface $course, StudentInterface $student,ProductInterface $product)
    {
        $this->divsion = $divsion;
        $this->student = $student;
        $this->course = $course;
        $this->product=$product;
    }
    public function index()
    {
        $courses = $this->course->getPaid();
        $divisions = $this->divsion->get();
        $activeStudents = $this->student->countActiceStudents();
        $deactiveStudents = $this->student->countDeactiveStudents();
        $products=$this->product->get()->count();
        return view('landing.index', compact('divisions', 'courses', 'activeStudents', 'deactiveStudents','products'));
    }
}
