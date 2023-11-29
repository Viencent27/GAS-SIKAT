<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Innovation;
use Carbon\Carbon;

class InovasiController extends Controller
{
    public function index()
    {
        $listInovasi = Innovation::orderBy('release_date', 'desc')->take(4)->get();
        $totalInovasi = Innovation::count();

        foreach ($listInovasi as $inovasi) {
            $inovasi->release_date = Carbon::parse($inovasi->release_date)->format('d F');
        }

        return view('landing-page', [
            'listInovasi' => $listInovasi,
            'totalInovasi' => $totalInovasi,
        ]);
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


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'publisher_name' => 'required',
            'release_date' => 'required|date',
            'description' => 'required',
            'link_video' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $data['photo'] = Storage::get($photoPath);
        }

        Innovation::create($data);

        session()->flash('success', 'Inovasi berhasil ditambahkan.');
        return view('form-inovasi', ['success' => 'Inovasi berhasil ditambahkan.']);
    }

    public function detail($id)
    {
        $inovasi = Innovation::find($id);

        if (!$inovasi) {
            abort(404);
        }

        return view('detail-inovasi', ['inovasi' => $inovasi]);
    }
}
