@extends('layouts.app')

@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container">
    <h2 class="title mt-5">Inovasi GAS-SIKAT</h2>
    <div class="mt-5 mx-auto search-inovasi">
        <form action="{{ route('inovasi.search') }}" method="GET" class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Inovasi" aria-describedly="searchBtn" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit" id="searchBtn"><i class="bi bi-search"></i></button>
        </form>
    </div>
    @if (session('success'))
        <div class="alert alert-success mt-4" id="successAlert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
            }, 5000);
        </script>
    @endif
    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 justify-content-center g-4 my-4">
        @foreach($listInovasi as $inovasi)
            <div class="col">
                <div class="card h-100 shadow innovation-item" onclick="window.location.href='/inovasi/{{ $inovasi->id }}'">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ Storage::url($inovasi->photo) }}" alt="{{ $inovasi->title }}">
                        <span class="date">{{ Carbon::parse($inovasi->release_date)->format('j F Y') }}</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $inovasi->title }}</h5>
                        <p><i class="bi bi-person-circle"></i> {{ $inovasi->user->first_name }} <span>/</span> <i class="bi bi-folder-fill"></i> {{ $inovasi->category }}</p>
                    </div>
                    <div class="card-footer">
                        <hr>
                         <a class="btn detail-button" href="{{ route('inovasi.detail', ['id' => $inovasi->id]) }}">Baca Selengkapnya -></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $listInovasi->links() }}
    </div>
</div>
@endsection