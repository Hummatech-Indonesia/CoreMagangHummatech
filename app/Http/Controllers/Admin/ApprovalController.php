<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\ApprovalInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    private ApprovalInterface $approval;
    public function __construct(ApprovalInterface $approval)
    {
        $this->approval = $approval;
    }
    public function index()
    {
        $students = $this->approval->where();
        return view('admin.page.approval.index' , compact('students'));
    }

    public function accept()
    {

    }
}
