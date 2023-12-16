@extends('layouts.app')

@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container">
    <h2 class="title my-5">{{ $inovasi->title }}</h2>

    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
            }, 5000);
        </script>
    @endif

    <div class="row justify-content-center mb-5">
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
                    <p>{{ Carbon::parse($inovasi->release_date)->format('j F Y') }}</p>
                    <h4>Link Video</h4>
                    <a href="{{ url($inovasi->link_video) }}" target="_blank">{{ $inovasi->link_video }}</a>
                    <br>

                    <div class="action-buttons mt-3">
                        <button class="btn btn-secondary" id="copyButton" data-url="{{ url()->current() }}" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Link inovasi berhasil disalin">
                            <i class="bi bi-share"></i> Bagikan Link Inovasi
                        </button>
                        @if (auth()->check())
                            @if (auth()->user()->role == 'admin' || (auth()->user()->role == 'user' && auth()->user()->id == $inovasi->user_id))
                                <a href="{{ route('inovasi.edit', ['id' => $inovasi->id]) }}" class="btn btn-warning" id="editBtn">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('inovasi.destroy', ['id' => $inovasi->id]) }}" method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash-fill" style="color: white;"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var copyButton = document.getElementById('copyButton');

                            var popover = new bootstrap.Popover(copyButton);

                            copyButton.addEventListener('click', function () {
                                var urlToCopy = copyButton.getAttribute('data-url');
                                copyTextToClipboard(urlToCopy);

                                popover.show();

                                setTimeout(function() {
                                    popover.hide();
                                }, 3000);
                            });

                            function copyTextToClipboard(text) {
                                var textArea = document.createElement('textarea');
                                textArea.value = text;
                                document.body.appendChild(textArea);
                                textArea.select();
                                document.execCommand('copy');
                                document.body.removeChild(textArea);
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
