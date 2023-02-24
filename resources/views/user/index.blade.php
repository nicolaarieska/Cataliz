@extends('layouts.main')
@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">CRUD SEDERHANA</h4>
                        <h1 class="display-3 text-white mb-md-4">Pegawai Nicoffe</h1>
                        <a href="/useradd" class="btn btn-primary py-md-3 px-md-5 mt-2">TAMBAH PEGAWAI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Alerts Start -->
@if ($message = Session::get('Success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
<!-- Alerts End -->

<!-- Alerts Start -->
@if ($message = Session::get('Edit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
<!-- Alerts End -->

<!-- Alerts Start -->
@if ($message = Session::get('Delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
<!-- Alerts End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="section-title position-relative mb-5">Pegawai Nicoffe</h1>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="owl-carousel team-carousel">
                    @if ($user -> count())
                    @foreach ($user as $u)
                    <div class="team-item">
                        <div class="team-img mx-auto">
                            <img class="rounded-circle w-100 h-100" src="{{ asset('img/' . $u->photo) }}" style="object-fit: cover;" alt="{{ $u->type }}">
                        </div>
                        <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                            <h3 class="font-weight-bold mt-5 mb-3 pt-5">{{ $u->name }}</h3>
                            <h6 class="text-uppercase text-muted mb-4">{{ $u->position }}</h6>
                            <div class="d-flex justify-content-center pt-1">
                                <a class="btn btn-warning" href="/useredit/{{ $u->id }}" role="button">Edit</a>
                                <a class="btn btn-danger" href="/userdelete/{{ $u->id }}" role="button">Hapus</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                </div>

                <hr class="hr hr-blurry w-100" />
                <h3>Tidak Ada Data Pegawai</h3>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection