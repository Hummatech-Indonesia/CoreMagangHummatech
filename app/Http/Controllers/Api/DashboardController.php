<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private ZoomScheduleInterface $zoom;

    public function __construct(ZoomScheduleInterface $zoom)
    {
        $this->zoom = $zoom;
    }

    public function index()
    {
        $zoom = $this->zoom->get();
        $data['result'] = $zoom;
        return response()->json($data, 200);
    }
}
