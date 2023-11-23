@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="my-4 fw-bold">Form Tambah Inovasi</h3>
  <form>
      <div class="mb-3">
          <label for="judul" class="form-label fw-bold">Judul Inovasi</label>
          <input type="text" class="form-control outline-primary" id="judul" name="judul" placeholder="Masukkan Judul">
      </div>
      <div class="mb-3">
          <label for="penerbit" class="form-label fw-bold">Nama Penerbit</label>
          <input type="text" class="form-control outline-primary" id="penerbit" name="penerbit" placeholder="Masukkan Nama Penerbit">
      </div>
      <div class="mb-3">
          <label for="tanggalTerbit" class="form-label fw-bold">Tanggal Terbit</label>
          <input type="date" class="form-control outline-primary" id="tanggalTerbit" name="tanggalTerbit">
      </div>
      <div class="mb-3">
          <label for="deskripsi" class="form-label fw-bold">Deskripsi Inovasi</label>
          <textarea class="form-control outline-primary" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Inovasi"></textarea>
      </div>
      <div class="mb-3">
          <label for="linkVideo" class="form-label fw-bold">Link Video</label>
          <input type="text" class="form-control outline-primary" id="linkVideo" name="linkVideo" placeholder="Masukkan Link Video">
      </div>
      <div class="mb-3">
          <label for="gambar" class="form-label fw-bold">Upload Gambar</label>
          <input class="form-control outline-primary" type="file" id="gambar" name="gambar" placeholder="">
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