@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row row-cols-md-2 row-cols-1 align-items-center">
            <div class="col hero-text order-md-1 order-2">
                <h1 class="mb-3 text-md-start">Galeri Inovasi Masyarakat (GAS-SIKAT)</h1>
                <p class="mb-4">
                    <span>GAS-SIKAT</span> adalah tempat untuk mempublikasikan dan
                    mempromosikan berbagai inovasi yang telah dihasilkan oleh masyarakat
                    dalam berbagai bidang kehidupan
                </p>
                <button class="btn btn-primary" onclick="window.location.href='/inovasi'">Selengkapnya</button>
            </div>
            <img class="col-md col-9 mx-auto hero-image order-md-2 order-1" src="{{ asset('images/innovation.svg') }}" alt="">
        </div>
    </div>
</div>

<div class="features container pb-5">
    <h2 class="title my-5">Fitur-Fitur GAS-SIKAT</h2>
    <div class="d-flex flex-column gap-5 mb-3">
        <div class="row row-cols-sm-2 row-cols-1 g-4 g-sm-5 align-items-center feature">
            <img class="col-sm-4 col-8 mx-auto" src="{{ asset('images/mencari-inovasi.svg') }}" alt="">
            <div class="col-sm-8 col feature-text">
                <h3>Mencari Inovasi</h3>
                <p>
                    Jelajahi keberagaman inovasi yang menginspirasi di Galeri Inovasi
                    Masyarakat kami. Temukan berbagai ide kreatif dan solusi inovatif
                    yang telah dipublikasikan oleh inovator dari berbagai kalangan
                    masyarakat. Mari dukung setiap inovasi yang telah mereka bagikan
                    untuk perubahan positif di masyarakat.
                </p>
            </div>
        </div>
        <div class="row row-cols-sm-2 row-cols-1 g-4 g-sm-5 align-items-center feature">
            <div class="col-sm-8 col feature-text order-sm-1 order-2">
                <h3>Mempublikasikan Inovasi</h3>
                <p>
                    Kami berusaha menyediakan wadah kepada setiap individu atau kelompok
                    untuk dapat secara mudah dan cepat mengunggah dan mempromosikan ide-ide
                    kreatif mereka kepada masyarakat secara luas. Karena kami memahami bahwa
                    setiap ide yang muncul sangatlah berharga.
                </p>
            </div>
            <img class="col-sm-4 col-8 mx-auto order-sm-2 order-1" src="{{ asset('images/mempublikasikan-inovasi.svg') }}" alt="">
        </div>
        <div class="row row-cols-sm-2 row-cols-1 g-4 g-sm-5 align-items-center mb-4 feature">
            <img class="col-sm-4 col-8 mx-auto" src="{{ asset('images/membagikan-inovasi.svg') }}" alt="">
            <div class="col-sm-8 col feature-text">
                <h3>Membagikan Inovasi</h3>
                <p>
                    Bagikan inovasi atau ide kreatif yang Anda temukan di Galeri Inovasi
                    Masyarakat kepada teman atau komunitas Anda. Ikut serta dalam
                    mempromosikan gagasan-gagasan inovasi yang dihasilkan oleh masyarakat.
                    Memperluas dampak inovasi dan memberikan inspirasi kepada orang lain.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="innovation-gallery">
    <div class="container pt-5 pb-5">
        <h2 class="title">Galeri Inovasi</h2>
        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 justify-content-center g-4 my-4">
            @foreach($listInovasi as $inovasi)
                <div class="col">
                    <div class="card h-100 innovation-item">
                        <div class="position-relative overflow-hidden">
                            <img src="data:image/jpg;base64,{{ base64_encode($inovasi->photo) }}" alt="{{ $inovasi->title }}">
                            <span class="date">{{ $inovasi->release_date }}</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $inovasi->title }}</h5>
                            <p><i class="bi bi-person-circle"></i> {{ $inovasi->publisher_name }} <span>/</span> <i class="bi bi-folder-fill"></i> {{ $inovasi->category }}</p>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <a class="btn detail-button" href="{{ route('inovasi.detail', ['id' => $inovasi->id]) }}">Baca Selengkapnya -></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <button class="btn btn-primary" onclick="window.location.href='/inovasi'">Lihat Semua Inovasi</button>
        </div>
    </div>
</div>

<div class="information container">
    <h2 class="title mt-5">Informasi GAS-SIKAT</h2>
    <div class="row row-cols-md-2 row-cols-1 gap-3 justify-content-center my-5">
        <div class="col info-item text-center">
            <div class="icon mt-3 mb-2">
                <i class="bi bi-lightbulb"></i>
            </div>
            <h3 class="m-0">{{ $totalInovasi }}</h3>
            <p class="mb-3">Total Inovasi</p>
        </div>
        <div class="col info-item text-center">
            <div class="icon mt-3 mb-2">
                <i class="bi bi-person-check"></i>
            </div>
            <h3 class="m-0">2</h3>
            <p class="mb-3">Total Kontributor</p>
        </div>
    </div>
</div>
@endsection