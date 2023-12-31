@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title mt-5">Daftar Pengguna</h2>

    <div class="mt-5 mx-auto search-pengguna">
        <form action="{{ route('users.index') }}" method="GET" class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Pengguna" aria-describedly="searchBtn" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit" id="searchBtn"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-4">
            @if (session('success'))
                <div class="alert alert-success mt-4" id="successAlert">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('successAlert').style.display = 'none';
                    }, 5000);
                </script>
            @endif
    
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <thead class="table-secondary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listUser as $user)
                <tr>
                    <th scope="row">{{ $listUser->firstItem() + $loop->index }}</th>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('updateUserRole', $user->id) }}" method="post" id="updateUserRoleForm{{ $user->id }}">
                            @csrf
                            @method('PUT')
    
                            <select class="form-select" name="role" onchange="document.getElementById('updateUserRoleForm{{ $user->id }}').submit()">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash-fill" style="color: white;"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-1">
        <div>
            <p>Showing {{ $listUser->firstItem() }} to {{ $listUser->lastItem() }} of {{ $listUser->total() }} entries</p>
        </div>
        <div>
            {{ $listUser->links() }}
        </div>
    </div>
</div>
@endsection