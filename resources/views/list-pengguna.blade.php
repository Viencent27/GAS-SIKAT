@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title mt-5">Daftar Pengguna</h2>
    <table class="table table-bordered table-hover mt-5">
        <!-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        
        <thead class="table-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUser as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-trash-fill" style="color: white;"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection