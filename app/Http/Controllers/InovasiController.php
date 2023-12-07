<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Innovation;
use App\Models\User;
use Carbon\Carbon;

class InovasiController extends Controller
{
    public function index()
    {
        $listInovasi = Innovation::with('user')->orderBy('release_date', 'desc')->take(4)->get();
        $totalInovasi = Innovation::count();
        $totalInovator = Innovation::with('user')->distinct('user_id')->count('user_id');

        return view('landing-page', [
            'listInovasi' => $listInovasi,
            'totalInovasi' => $totalInovasi,
            'totalInovator' => $totalInovator
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $listInovasi = Innovation::where('title', 'like', "%$search%")->paginate(12);

        return view('list-inovasi', ['listInovasi' => $listInovasi]);
    }

    public function myInnovations(Request $request)
    {
        $search = $request->input('search');
        $user_id = auth()->user()->id;

        $listInovasiSaya = Innovation::where('user_id', $user_id)
            ->where('title', 'like', "%$search%")
            ->paginate(12);

        return view('inovasi-saya', ['listInovasiSaya' => $listInovasiSaya]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required|date',
            'description' => 'required',
            'link_video' => 'required',
            'category' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user_id = Auth::id();
    
        $data = $request->except(['photo', 'user_id']);
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath;
        }
    
        $data['user_id'] = $user_id;
    
        Innovation::create($data);
    
        session()->flash('success', 'Inovasi berhasil ditambahkan.');
        return view('form-inovasi', ['success' => 'Inovasi berhasil ditambahkan.']);
    }

    public function detail($id)
    {
        $inovasi = Innovation::find($id);

        $inovasi->release_date = Carbon::parse($inovasi->release_date)->format('j F Y');

        if (!$inovasi) {
            abort(404);
        }

        return view('detail-inovasi', ['inovasi' => $inovasi]);
    }
}
