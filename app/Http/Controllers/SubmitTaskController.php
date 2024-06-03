<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubmitTaskInterface;
use App\Models\SubmitTask;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubmitTaskController extends Controller
{
    private SubmitTaskInterface $submitTask;
    public function __construct(SubmitTaskInterface $submitTaskInterface)
    {
        $this->submitTask = $submitTaskInterface;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
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
        $this->submitTask->delete($submitTask->id);
        return redirect()->back()->with('success', 'Berhasil menghapus jawaban');
    }
}
