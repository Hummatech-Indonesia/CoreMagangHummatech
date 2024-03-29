<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DivisionInterface;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private DivisionInterface $divsion;
    public function __construct(DivisionInterface $divsion)
    {
        $this->divsion = $divsion;
    }
    public function index()
    {
        $divisions = $this->divsion->get();
        return view('landing.index' ,compact('divisions'));
    }
}
