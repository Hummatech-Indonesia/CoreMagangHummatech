<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\DataAdminInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private DataAdminInterface $dataadmin;

    public function __construct(DataAdminInterface $dataadmin)
    {
        $this->dataadmin = $dataadmin;
    }
    public function index()
    {
        $dataadmin = $this->dataadmin->get();
        return view('admin.index', compact('dataadmin'));
    }
}
