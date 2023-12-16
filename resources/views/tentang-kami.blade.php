@extends('layouts.app')

@section('content')
<div class="container tentang-kami">
    <h2 class="title mt-5 mb-5">Tim Kami</h2>
    <div class="d-flex justify-content-center text-center">
        <p>
            Tim Capstone Dicoding C523-PR088 dengan Tema Teknologi
            dalam Berbagai Aspek Kehidupan dan Judul Proyek Galeri
            Inovasi Masyarakat (GAS-SIKAT)
        </p>
    </div>
    <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 justify-content-center g-5 mt-1 mb-5">
        <div class="col">
            <div class="card h-100 shadow-sm team-member text-center">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('images/tim-capstone/Anatasya.jpg') }}" alt="Anatasya">
                    <!-- <img src="https://drive.google.com/uc?id=1etQJqrApeI7x3o80Oe1Rxo1Onfqv3Ugl" alt="Anatasya"> -->
                </div>
                <div class="card-body">
                    <h5 class="card-title">Anatasya Lingkanwene Ering</h5>
                    <p class="card-text text-body-secondary">UI/UX</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm team-member text-center">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('images/tim-capstone/Yandi.jpg') }}" alt="Yandi">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lintang Yandi Nugraha</h5>
                    <p class="card-text text-body-secondary">Front-End Developer</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm team-member text-center">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('images/tim-capstone/Sukron.jpg') }}" alt="Sukron">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Sukron Hadi Prasojo</h5>
                    <p class="card-text text-body-secondary">Front-End Developer</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm team-member text-center">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('images/tim-capstone/Dhimas.jpg') }}" alt="Dhimas">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Dhimas Jatiwibowo</h5>
                    <p class="card-text text-body-secondary">Back-End Developer</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm team-member text-center">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('images/tim-capstone/Viencent.jpg') }}" alt="Viencent">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Viencent</h5>
                    <p class="card-text text-body-secondary">Back-End Developer</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection