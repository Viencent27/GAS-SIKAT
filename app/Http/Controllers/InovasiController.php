<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Innovation;
use Carbon\Carbon;

class InovasiController extends Controller
{
    public function index()
    {
        $listInovasi = Innovation::orderBy('release_date', 'desc')->take(4)->get();

        foreach ($listInovasi as $inovasi) {
            $inovasi->release_date = Carbon::parse($inovasi->release_date)->format('d F');
        }

        return view('landing-page', ['listInovasi' => $listInovasi]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $listInovasi = Innovation::where('title', 'like', "%$search%")
            ->orWhere('publisher_name', 'like', "%$search%")
            ->paginate(12);

        foreach ($listInovasi as $inovasi) {
            $inovasi->release_date = Carbon::parse($inovasi->release_date)->format('d F');
        }

        return view('list-inovasi', ['listInovasi' => $listInovasi]);
    }
}
