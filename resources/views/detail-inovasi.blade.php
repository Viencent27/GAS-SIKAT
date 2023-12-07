@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="title my-5">{{ $inovasi->title }}</h2>
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 ">
                <div class="row detail">
                    <div class="col-lg-6 mb-4">
                        <img src="{{ Storage::url($inovasi->photo) }}" alt="{{ $inovasi->title }}" class="featured-image">
                    </div>
                    <div class="col-lg-6 order-last font-detail-color">
                        <h4>Deskripsi Inovasi</h4>
                        <p>{{ $inovasi->description }}</p>
                        <h4>Nama Inovator</h4>
                        <p>{{ $inovasi->user->first_name }}</p>
                        <h4>Tanggal Terbit</h4>
                        <p>{{ $inovasi->release_date }}</p>
                        <h4>Link Video</h4>
                        <a href="{{ $inovasi->link_video }}" target="_blank">{{ $inovasi->link_video }}</a>
                        
                        @if(auth()->check())
                            @if(auth()->user()->role == 'admin' || (auth()->user()->role == 'user' && auth()->user()->id == $inovasi->user_id))
                                <div class="edit-delete mt-3">
                                    <button class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</button>
                                    <button class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i> Hapus</button>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
