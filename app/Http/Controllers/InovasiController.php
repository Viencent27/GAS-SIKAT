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
        $listInovasi = Innovation::where('title', 'like', "%$search%")
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%");
            })
            ->orderBy('release_date', 'desc')
            ->paginate(12);

        return view('list-inovasi', ['listInovasi' => $listInovasi]);
    }

    public function myInnovations(Request $request)
    {
        $search = $request->input('search');
        $user_id = auth()->user()->id;

        $listInovasiSaya = Innovation::where('user_id', $user_id)
            ->where('title', 'like', "%$search%")
            ->orderBy('release_date', 'desc')
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

        if (!$inovasi) {
            abort(404);
        }

        return view('detail-inovasi', ['inovasi' => $inovasi]);
    }

    public function edit($id)
    {
        $inovasi = Innovation::find($id);

        if (!$inovasi) {
            abort(404);
        }

        if (Auth::user()->id != $inovasi->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('form-update-inovasi', ['inovasi' => $inovasi]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required|date',
            'description' => 'required',
            'link_video' => 'required',
            'category' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $inovasi = Innovation::find($id);

        if (!$inovasi) {
            abort(404);
        }

        if (Auth::user()->id !== $inovasi->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $inovasi->title = $request->input('title');
        $inovasi->release_date = $request->input('release_date');
        $inovasi->description = $request->input('description');
        $inovasi->link_video = $request->input('link_video');
        $inovasi->category = $request->input('category');

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $inovasi->photo = $photoPath;
        }

        $inovasi->save();

        session()->flash('success', 'Inovasi berhasil diperbarui.');
        return redirect()->route('inovasi.detail', ['id' => $id]);
    }

    public function destroy($id)
    {
        $inovasi = Innovation::find($id);

        if (!$inovasi) {
            abort(404);
        }

        if (Auth::user()->id !== $inovasi->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        if (Storage::disk('public')->exists($inovasi->photo)) {
            Storage::disk('public')->delete($inovasi->photo);
        }

        $inovasi->delete();

        return redirect()->route('inovasi.search')->with('success', 'Inovasi berhasil dihapus.');
    }
}
