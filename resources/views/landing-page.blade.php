@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row row-cols-md-2 row-cols-1 align-items-center">
            <div class="col hero-text order-md-1 order-2">
                <h1 class="mb-3 text-md-start">Galeri Inovasi Masyarakat (GAS-SIKAT)</h1>
                <p class="mb-4">
                    <span>GAS-SIKAT</span> adalah aplikasi untuk mempublikasikan
                    dan mempromosikan berbagai inovasi yang telah
                    dihasilkan oleh masyarakat dalam berbagai bidang
                    kehidupan
                </p>
                <button class="btn btn-primary" onclick="window.location.href='/inovasi'">Selengkapnya</button>
            </div>
            <img class="col-md col-9 mx-auto hero-image order-md-2 order-1" src="{{ asset('images/innovation.svg') }}" alt="">
        </div>
    </div>
</div>

<div class="features container pb-5">
    <h2 class="title mt-5">Fitur-Fitur GAS-SIKAT</h2>
    <div class="column gap-5 mt-5">
        <div class="row row-cols-sm-2 row-cols-1 g-3 align-items-center mb-4 feature">
            <img class="col-sm-4 col-8 mx-auto" src="{{ asset('images/innovation.svg') }}" alt="">
            <div class="col-sm-8 col feature-text">
                <h3>Nama fitur pertama</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis,
                    rerum ut dignissimos culpa natus consequuntur, molestiae
                    reprehenderit excepturi magnam error adipisci repellat assumenda
                    cumque dolore fuga accusantium, ex ullam! Explicabo.
                </p>
            </div>
        </div>
        <div class="row row-cols-sm-2 row-cols-1 g-3 align-items-center mb-4 feature">
            <div class="col-sm-8 col feature-text order-sm-1 order-2">
                <h3>Nama fitur kedua</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis,
                    rerum ut dignissimos culpa natus consequuntur, molestiae
                    reprehenderit excepturi magnam error adipisci repellat assumenda
                    cumque dolore fuga accusantium, ex ullam! Explicabo.
                </p>
            </div>
            <img class="col-sm-4 col-8 mx-auto order-sm-2 order-1" src="{{ asset('images/pameran-inovasi.jpeg') }}" alt="">
        </div>
        <div class="row row-cols-sm-2 row-cols-1 g-3 align-items-center mb-4 feature">
            <img class="col-sm-4 col-8 mx-auto" src="{{ asset('images/innovation.svg') }}" alt="">
            <div class="col-sm-8 col feature-text">
                <h3>Nama fitur ketiga</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis,
                    rerum ut dignissimos culpa natus consequuntur, molestiae
                    reprehenderit excepturi magnam error adipisci repellat assumenda
                    cumque dolore fuga accusantium, ex ullam! Explicabo.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="innovation-gallery">
    <div class="container pt-5 pb-5">
        <h2 class="title">Galeri Inovasi</h2>
        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 justify-content-center g-4 my-4">
            <div class="col">
                <div class="card h-100 innovation-item">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('images/pameran-inovasi.jpeg') }}" alt="">
                        <span class="date">23 November</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Judul untuk Inovasi Pertama</h5>
                        <p><i class="bi bi-person-circle"></i> Kontributor <span>/</span> <i class="bi bi-folder-fill"></i> Kategori</p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <a class="btn detail-button" href="">Baca Selengkapnya -></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 innovation-item">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('images/innovation.svg') }}" alt="">
                        <span class="date">23 November</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Judul Inovasi</h5>
                        <p><i class="bi bi-person-circle"></i> Kontributor <span>/</span> <i class="bi bi-folder-fill"></i> Kategori</p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <a class="btn detail-button" href="">Baca Selengkapnya -></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 innovation-item">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('images/pameran-inovasi.jpeg') }}" alt="">
                        <span class="date">23 November</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Judul untuk Inovasi Pertama</h5>
                        <p><i class="bi bi-person-circle"></i> Kontributor <span>/</span> <i class="bi bi-folder-fill"></i> Kategori</p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <a class="btn detail-button" href="">Baca Selengkapnya -></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 innovation-item">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('images/innovation.svg') }}" alt="">
                        <span class="date">23 November</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Judul Inovasi</h5>
                        <p><i class="bi bi-person-circle"></i> Kontributor <span>/</span> <i class="bi bi-folder-fill"></i> Kategori</p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <a class="btn detail-button" href="">Baca Selengkapnya -></a>
                    </div>
                </div>
            </div>
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
            <h3 class="m-0">50</h3>
            <p class="mb-3">Total Inovasi</p>
        </div>
        <div class="col info-item text-center">
            <div class="icon mt-3 mb-2">
                <i class="bi bi-person-check"></i>
            </div>
            <h3 class="m-0">20</h3>
            <p class="mb-3">Total Kontributor</p>
        </div>
    </div>
</div>
@endsection