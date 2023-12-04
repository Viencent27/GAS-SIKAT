@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="title my-5">Form Tambah Inovasi</h2>
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 ">
                <div class="row detail">
                    <div class="col-lg-6 order-first">
                        <img src="{{ Storage::url($inovasi->photo) }}" alt="{{ $inovasi->title }}" class="img-fluid featured-image">
                    </div>
                    <div class="col-lg-6 order-last font-detail-color">
                        <h2 class="mb-4">{{ $inovasi->title }}</h2>
                        <h4>Deskripsi Inovasi</h4>
                        <p>{{ $inovasi->description }}</p>
                        <h4>Nama Inovator</h4>
                        <p>{{ $inovasi->user->first_name }}</p>
                        <h4>Tanggal Terbit</h4>
                        <p>{{ $inovasi->release_date }}</p>
                        <h4>Link Video</h4>
                        <a href="{{ $inovasi->link_video }}" target="_blank">{{ $inovasi->link_video }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
