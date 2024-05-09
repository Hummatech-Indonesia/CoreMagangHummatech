<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AppointmentOfMentorInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\MentorInterface;
use App\Models\AppointmentOfAmentor;
use App\Http\Requests\StoreAppointmentOfAmentorRequest;
use App\Http\Requests\UpdateAppointmentOfAmentorRequest;
use Illuminate\Http\Request;

class AppointmentOfAmentorController extends Controller
{
    private AppointmentOfMentorInterface $appointmentOfAmentor;
    private MentorInterface $mentor;
    private CourseInterface $course;
    public function __construct(AppointmentOfMentorInterface $appointmentOfAmentor , MentorInterface $mentor , CourseInterface $course)
    {
        $this->appointmentOfAmentor = $appointmentOfAmentor;
        $this->mentor = $mentor;
        $this->course = $course;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mentors = $this->mentor->get();
        $courses = $this->course->get();
        $appointmentOfAmentors = $this->appointmentOfAmentor->search($request)->paginate(10);
        return view('admin.page.course.appointmentofmentor.index' , compact('appointmentOfAmentors' , 'mentors' , 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentOfAmentorRequest $request)
    {
        $this->appointmentOfAmentor->store($request->validated());
        return back()->with('success' , 'Mentor berhasil di tetapkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(AppointmentOfAmentor $appointmentOfAmentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppointmentOfAmentor $appointmentOfAmentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentOfAmentorRequest $request, AppointmentOfAmentor $appointmentOfAmentor)
    {
        $this->appointmentOfAmentor->update($appointmentOfAmentor->id , $request->validated());
        return back()->with('success' , 'Data berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppointmentOfAmentor $appointmentOfAmentor)
    {
        $this->appointmentOfAmentor->delete($appointmentOfAmentor->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
