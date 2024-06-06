<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StudentCoursePositionInterface;
use App\Contracts\Interfaces\SubmitTaskInterface;
use App\Enum\SubmitTaskStatusEnum;
use App\Http\Requests\UpdateStatusSubmitTaskRequest;
use App\Models\CourseAssignment;
use App\Models\SubmitTask;
use App\Models\TaskSubmission;
use App\Services\SubmitTaskService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubmitTaskController extends Controller
{
    private SubmitTaskInterface $submitTask;
    private SubmitTaskService $service;
    private StudentCoursePositionInterface $studentCoursePosition;
    public function __construct(SubmitTaskInterface $submitTaskInterface, SubmitTaskService $submitTaskService, StudentCoursePositionInterface $studentCoursePositionInterface)
    {
        $this->studentCoursePosition = $studentCoursePositionInterface;
        $this->service = $submitTaskService;
        $this->submitTask = $submitTaskInterface;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $courseAssignment
     * @return RedirectResponse
     */
    public function store(Request $request, CourseAssignment $courseAssignment): RedirectResponse
    {
        $data = $this->service->store($request, $courseAssignment);
        $this->submitTask->store($data);
        return redirect()->back()->with('success', 'Berhasil menyimpan jawaban');
    }

    /**
     * show
     *
     * @param  mixed $submitTask
     * @return View
     */
    public function show(SubmitTask $submitTask): View
    {
        return view('', compact('submitTask'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $submitTask
     * @return RedirectResponse
     */
    public function update(Request $request, SubmitTask $submitTask): RedirectResponse
    {
        $data = $this->service->update($request, $submitTask);
        $this->submitTask->update($submitTask->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbarui jawaban');
    }

    /**
     * destroy
     *
     * @param  mixed $submitTask
     * @return RedirectResponse
     */
    public function destroy(SubmitTask $submitTask): RedirectResponse
    {
        if ($submitTask->status == SubmitTaskStatusEnum::PENDING->value) {
            $this->submitTask->delete($submitTask->id);
            return redirect()->back()->with('success', 'Berhasil menghapus jawaban');
        }
        else {
            return redirect()->back()->with('error', 'Gagal menghapus jawaban');
        }
    }

    /**
     * updateStatus
     *
     * @param  mixed $request
     * @param  mixed $submitTask
     * @return RedirectResponse
     */
    public function updateStatus(UpdateStatusSubmitTaskRequest $request, SubmitTask $submitTask): RedirectResponse
    {
        $data = $request->validated();
        $this->submitTask->update($submitTask->id, $data);
        if ($request->status == SubmitTaskStatusEnum::AGREE->value) {
            $this->studentCoursePosition->store([
                'student_id' => $submitTask->student_id,
                'position' => $submitTask->courseAssignment->course->position + 1,
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil menyimpan');
    }
}
