@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="title my-5">Form Tambah Inovasi</h2>

        @if (session('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('successAlert').style.display = 'none';
                }, 5000);
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inovasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Judul Inovasi</label>
                <input type="text" class="form-control outline-primary" id="title" name="title"
                    placeholder="Masukkan Judul" required>
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label fw-bold">Tanggal Terbit</label>
                <input type="date" class="form-control outline-primary" id="release_date" name="release_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi Inovasi</label>
                <textarea class="form-control outline-primary" id="description" name="description" rows="3"
                    placeholder="Masukkan Deskripsi Inovasi" required></textarea>
            </div>
            <div class="mb-3">
                <label for="link_video" class="form-label fw-bold">Link Video</label>
                <input type="text" class="form-control outline-primary" id="link_video" name="link_video"
                    placeholder="Masukkan Link Video" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label fw-bold">kategori</label>
                <select class="form-select outline-primary" aria-label="Default select example" id="category"
                    name="category">
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Lingkungan">Lingkungan</option>
                    <option value="Kesehatan">Kesehatan</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label fw-bold">Upload Gambar</label>
                <input class="form-control outline-primary" type="file" id="photo" name="photo" placeholder=""
                    required>
            </div>
            <div class="mb-3 row justify-content-end">
                <div class="col-auto">
                    <button type="reset" class="btn btn-outline-primary fw-bold">Batal</button>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
@endsection
