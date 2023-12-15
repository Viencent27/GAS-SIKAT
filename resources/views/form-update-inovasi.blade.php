@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="title mt-5">Form Edit Inovasi</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inovasi.update', ['id' => $inovasi->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Judul Inovasi</label>
                <input type="text" class="form-control outline-primary" id="title" name="title"
                    value="{{ $inovasi->title }}" required>
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label fw-bold">Tanggal Terbit</label>
                <input type="date" class="form-control outline-primary" id="release_date" name="release_date"
                    value="{{ $inovasi->release_date }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi Inovasi</label>
                <textarea class="form-control outline-primary" id="description" name="description" rows="3" required>{{ $inovasi->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="link_video" class="form-label fw-bold">Link Video</label>
                <input type="text" class="form-control outline-primary" id="link_video" name="link_video"
                    value="{{ $inovasi->link_video }}" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label fw-bold">Kategori</label>
                <select class="form-select outline-primary" aria-label="Default select example" id="category"
                    name="category" required>
                    <option value="Teknologi" {{ $inovasi->category == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                    <option value="Pendidikan" {{ $inovasi->category == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    <option value="Lingkungan" {{ $inovasi->category == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                    <option value="Kesehatan" {{ $inovasi->category == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                    <option value="Ekonomi" {{ $inovasi->category == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                    <option value="Politik" {{ $inovasi->category == 'Politik' ? 'selected' : '' }}>Politik</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label fw-bold">Upload Gambar</label>
                <input class="form-control outline-primary" type="file" id="photo" name="photo" placeholder="">
            </div>
            <div class="mb-3 row justify-content-end">
                <div class="col-auto">
                    <a href="{{ route('inovasi.detail', ['id' => $inovasi->id]) }}"
                        class="btn btn-outline-primary fw-bold">Batal</a>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </div>
        </form>
    </div>
@endsection
