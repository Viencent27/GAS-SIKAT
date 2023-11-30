@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="title mt-5 text-center">Form Tambah Inovasi</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="data:image/jpg;base64,{{ base64_encode($inovasi->photo) }}" alt="{{ $inovasi->title }}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-5">{{ $inovasi->title }}</h2>
                        <h3>Deskripsi Inovasi</h3>
                        <p>{{ $inovasi->description }}</p>
                        <h3>Nama Inovator</h3>
                        <p>{{ $inovasi->publisher_name }}</p>
                        <h3>Tanggal Terbit</h3>
                        <p>{{ $inovasi->release_date }}</p>
                        <h3>Link Video</h3>
                        <a href="{{ $inovasi->link_video }}" target="_blank">{{ $inovasi->link_video }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
