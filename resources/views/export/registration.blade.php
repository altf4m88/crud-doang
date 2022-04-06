<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PPDB</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/icon.png')}}">
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .header{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .main-content {
            margin-top: 30px;
            width: 100%;
            display: flex;
            justify-content: center;
        }
        table {
            border: 0;
        }
        .description{
            min-height: 200px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Penerimaan Peserta Didik Baru</h1>
        <h1>SMK Indonesia</h1>
    </div>
    <hr>
    <div class="main-content">
        <table width="50%">
            <tr>
                <td>No Registrasi</td>
                <td>:</td>
                <td>{{$registration_number}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{$name}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$address}}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{$junior_high_school}}</td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>{{$major}}</td>
            </tr>
            <tr>
                <td>Tanggal Daftar</td>
                <td>:</td>
                <td>{{$registered_at}}</td>
            </tr>
        </table>
    </div>
</body>
</html>
