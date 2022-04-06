@extends('main')

@section('content')

<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 70vh">

    @if(Session::has('success'))
    <div class="w-50 alert alert-dismissible alert-success">
        <button type="button" class="btn btn-close text-white" data-bs-dismiss="alert"><i class="fa-solid fa-xmark"></i></button>
        {!! Session::get('success') !!}
    </div>
    @else

    <div class="w-50 alert alert-secondary">
        <strong>Halo!</strong> Anda bisa melakukan registrasi dengan mengisi form dibawah ini.
    </div>
    @endif


    <div class="w-50">
        @if(Session::has('success'))
        <div class="card border-success mb-3">
            <div class="card-body">
                <h4 class="card-title">Anda sudah berhasil melakukan pendaftaran</h4>
                <p class="card-text">Silahkan tunggu info lebih lanjut</p>
            </div>
        </div>
        @else
        <form action="{{URL::to('/registration')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group mb-2">
                <label for="exampleInputName">Nama Lengkap</label>
                <input type="text" max="255" class="form-control" name="name" id="exampleInputName" required placeholder="Nama">
            </fieldset>
            <fieldset class="form-group mb-2">
                <label for="exampleInputTextarea">Alamat Lengkap</label>
                <textarea name="address" class="form-control" id="exampleInputTextarea" rows="5"></textarea>
                {{-- <input type="text" max="255"  class="form-control" name="address" id="exampleInputPassword1" required placeholder="Alamat"> --}}
            </fieldset>
            <fieldset class="form-group mb-2">
                <label for="exampleInputHighSchool">Asal Sekolah</label>
                <input type="text" max="255"  class="form-control" name="junior_high_school" id="exampleInputHighSchool" required placeholder="Asal Sekolah">
            </fieldset>
            <fieldset class="form-group mb-2">
                <label for="jk">Jenis Kelamin</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="Laki-Laki" checked="">
                    Laki-Laki
                    </label>
                </div>
                <div class="form-check mb-2">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="Perempuan">
                    Perempuan
                    </label>
                </div>
            </fieldset>
            <fieldset class="form-group mb-2">
                <label for="exampleSelect1" class="form-label">Agama</label>
                <select class="form-select form-control" name="religion" id="exampleSelect1" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                </select>
            </fieldset>
            <fieldset class="form-group mb-2">
                <label for="exampleSelect1" class="form-label">Jurusan</label>
                <select class="form-select form-control" name="major" id="exampleSelect1" required>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Tata Boga">Tata Boga</option>
                    <option value="Tata Busana">Tata Busana</option>
                    <option value="Multimedia">Multimedia</option>
                </select>
            </fieldset>
            <div class="d-flex justify-content-end">
                <a href="/" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        @endif
    </div>
</div>
@include('layout.footer')
@endsection

@section('script')
    @if(Session::has('success'))
        <script>
            window.location = "/print/{{Session::get('id')}}";
        </script>
    @endif
@endsection
