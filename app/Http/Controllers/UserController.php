<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $listUser = User::all();

        return view('list-pengguna', [
            'listUser' => $listUser,
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
