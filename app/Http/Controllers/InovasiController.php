<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inovation;
use App\Models\User_inovation;

class InovasiController extends Controller
{
    public function index()
    {
        $inovasiList = User_inovation::all();

        return view('landing-page', ['inovasiList' => $inovasiList]);
    }
}
