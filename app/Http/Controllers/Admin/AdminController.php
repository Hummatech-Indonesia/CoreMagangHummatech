<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private DataAdminInterface $dataadmin;
    private MaxLateInterface $maxLate;

    public function __construct(DataAdminInterface $dataadmin, MaxLateInterface $maxLateInterface)
    {
        $this->maxLate = $maxLateInterface;
        $this->dataadmin = $dataadmin;
    }
    public function index()
    {
        $dataadmin = $this->dataadmin->get();
        $maxLateMinute = $this->maxLate->get();
        return view('admin.index', compact('dataadmin', 'maxLateMinute'));
    }
}
