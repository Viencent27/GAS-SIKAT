@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="title mt-5">Form Tambah Inovasi</h2>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Judul Inovasi</label>
                <input type="text" class="form-control outline-primary" id="title" name="title"
                    placeholder="Masukkan Judul">
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label fw-bold">Tanggal Terbit</label>
                <input type="date" class="form-control outline-primary" id="release_date" name="release_date">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi Inovasi</label>
                <textarea class="form-control outline-primary" id="description" name="description" rows="3"
                    placeholder="Masukkan Deskripsi Inovasi"></textarea>
            </div>
            <div class="mb-3">
                <label for="link_video" class="form-label fw-bold">Link Video</label>
                <input type="text" class="form-control outline-primary" id="link_video" name="link_video"
                    placeholder="Masukkan Link Video">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label fw-bold">Upload Gambar</label>
                <input class="form-control outline-primary" type="file" id="photo" name="photo" placeholder="">
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
