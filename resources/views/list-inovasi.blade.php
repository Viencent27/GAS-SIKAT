@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title mt-5">Inovasi GAS-SIKAT</h2>
    <div class="input-group mt-5 mx-auto search-inovasi">
        <input type="text" class="form-control" placeholder="Cari Inovasi" aria-describedly="searchBtn">
        <button class="btn btn-outline-secondary" type="submit" id="searchBtn"><i class="bi bi-search"></i></button>
    </div>
    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 justify-content-center g-4 my-4">
        <div class="col">
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
            <div class="card h-100 shadow innovation-item">
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
    <nav aria-label="Page navigation" class="my-5 d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link active" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
@endsection