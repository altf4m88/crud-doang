@extends('main')

@section('content')

<div class="container">
    <div class="d-flex my-3 mb-5 justify-content-around" style="height: 75vh">
        <div class="div w-50 d-flex align-items-center">
            <img class="w-100" src="{{asset('assets/svg/dashboard.svg')}}">
        </div>
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <div class="">
                <h1>Selamat Datang</h1>
                <h1>Di Halaman PPDB SMK Indonesia</h1>
            </div>
            <div class="mt-3">
                <a href="/registration" class="btn btn-lg btn-primary" id="create_report"><i class="fa-solid fa-file-lines"></i> Registrasi</a>
                {{-- <a href="/reports" class="btn btn-lg btn-warning">Lihat Pengaduan</a> --}}
            </div>
        </div>
    </div>
    <h4><i class="fa-solid fa-square-plus"></i> Kompetensi Keahlian Di SMK Indonesia</h4>
    <div class="d-flex justify-content-around mb-5">
        <div class="card mb-3" style="max-width: 20rem; width: 15rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-regular fa-file-lines"></i> TBG</h5>
                <p class="card-subtitle text-muted">Tata Boga <i class="fa-solid fa-user"></i></p>
            </div>
            <img src="{{asset('/assets/img/major/tbg.jpg')}}" height="300px" style="object-fit: cover;" alt="">
            <div class="card-body" style="min-height: 100px">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aliquam dolore eum libero nostrum corporis error ut quisquam debitis voluptate molestias a vitae excepturi hic facilis sed maiores aperiam, incidunt minus impedit quasi numquam similique? Praesentium nostrum a asperiores impedit.</p>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 20rem; width: 15rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-regular fa-file-lines"></i> TBS</h5>
                <p class="card-subtitle text-muted">Tata Busana <i class="fa-solid fa-user"></i></p>
            </div>
            <img src="{{asset('/assets/img/major/tbs.jpg')}}" height="300px" style="object-fit: cover;" alt="">
            <div class="card-body" style="min-height: 100px">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aliquam dolore eum libero nostrum corporis error ut quisquam debitis voluptate molestias a vitae excepturi hic facilis sed maiores aperiam, incidunt minus impedit quasi numquam similique? Praesentium nostrum a asperiores impedit.</p>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 20rem; width: 15rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-regular fa-file-lines"></i> RPL</h5>
                <p class="card-subtitle text-muted">Rekayasa Perangkat Lunak <i class="fa-solid fa-user"></i></p>
            </div>
            <img src="{{asset('/assets/img/major/rpl.jpg')}}" height="300px" style="object-fit: cover;" alt="">
            <div class="card-body" style="min-height: 100px">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aliquam dolore eum libero nostrum corporis error ut quisquam debitis voluptate molestias a vitae excepturi hic facilis sed maiores aperiam, incidunt minus impedit quasi numquam similique? Praesentium nostrum a asperiores impedit.</p>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 20rem; width: 15rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-regular fa-file-lines"></i> MMD</h5>
                <p class="card-subtitle text-muted">Multimedia <i class="fa-solid fa-user"></i></p>
            </div>
            <img src="{{asset('/assets/img/major/mmd.jpg')}}" height="300px" style="object-fit: cover;" alt="">
            <div class="card-body" style="min-height: 100px">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aliquam dolore eum libero nostrum corporis error ut quisquam debitis voluptate molestias a vitae excepturi hic facilis sed maiores aperiam, incidunt minus impedit quasi numquam similique? Praesentium nostrum a asperiores impedit.</p>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
@endsection
