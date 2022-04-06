@extends('main')

@section('content')
<div class="container" >
    @if(Session::has('success-update'))
    <div class="alert alert-dismissible alert-success mt-5">
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"><i class="fa-solid fa-xmark"></i></button>
        {!! Session::get('success-update') !!}
    </div>
    @endif

    <div id="success-delete-alert" class="alert alert-dismissible alert-success d-none mt-5">
        <button type="button" id="success-delete-close-button" class="btn btn-close"><i class="fa-solid fa-xmark"></i></button>
        <span>Sukses menghapus data registrasi</span>
    </div>

    <h4 class="mt-5"><i class="fa-solid fa-file-lines"></i> Data Registrasi Peserta Didik Baru</h4>
    <div style="height: 100vh" class="mt-3">
        <div class="d-flex justify-content-between mb-4">
            <form action="{{URL('/registration-report')}}" method="get">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mr-2">
                        <h3 class="mb-0"><i class="fa-solid fa-magnifying-glass"></i></h3>
                    </div>
                    <input style="margin-left: 10px;" height="20px" type="search" class="form-control pl-3 py-2 border-left-0 border" value="{{request()->name ?? ''}}" name="name" id="teacher-search-box" placeholder="Cari laporan..." onkeyup="checkSearch(event)">
                </div>
            </form>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No. Registrasi</th>
                    <th scope="col"><i class="fa-solid fa-person"></i> Nama</th>
                    <th scope="col"><i class="fa-solid fa-location-dot"></i> Alamat</th>
                    <th scope="col"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</th>
                    <th scope="col"><i class="fa-solid fa-person-praying"></i> Agama</th>
                    <th scope="col"><i class="fa-solid fa-school"></i> Asal SMP</th>
                    <th scope="col"><i class="fa-solid fa-wrench"></i> Jurusan</th>
                    <th scope="col"><i class="fa-solid fa-calendar-days"></i> Tanggal Daftar</th>
                    <th scope="col"><i class="fa-solid fa-pencil"></i> Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports['data'] as $report)
                    <tr id="row-{{$report['id']}}">
                        <td>{{$report['registration_number']}}</td>
                        <td>{{$report['name']}}</td>
                        <td>{{$report['address']}}</td>
                        <td>{{$report['gender']}}</td>
                        <td>{{$report['religion']}}</td>
                        <td>{{$report['junior_high_school']}}</td>
                        <td>{{$report['major']}}</td>
                        <td>{{$report['created_at']}}</td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="showEditModal({{$report['id']}})">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($reports && ($reports['total'] > 20))
            <nav class="navigation mt-5 d-flex justify-content-between">
                <div>
                    <span class="pagination-detail">{{ $reports['to'] }} dari {{ $reports['total'] }} Laporan</span>
                </div>
                <ul class="pagination">
                    <li class="page-item {{ (request()->page ?? 1) - 1 <= 0 ? 'disabled' : '' }}">
                        <a class="page-link" href="?page={{ (request()->page ?? 1) - 1 }}" tabindex="-1">&lt;</a>
                    </li>
                    @if(request()->page >= 5 && $reports['last_page'] > 7)
                    <li class="page-item">
                        <a class="page-link" href="?page=1">1</a>
                    </li>
                    <li class="page-item"><a class="page-link">...</a></li>
                    @endif
                    @if(request()->page <= 7 && $reports['last_page'] <= 7)
                        @for($i=1; $i <= $reports['last_page']; $i++)
                        <li class="page-item {{ (request()->page ?? 1) == $i ? 'active disabled' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor
                    @elseif(request()->page < 5 && $reports['last_page'] > 5)
                        @for($i=1; $i <= 5; $i++)
                        <li class="page-item {{ (request()->page ?? 1) == $i ? 'active disabled' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor
                    @elseif(request()->page >= 5 && request()->page <= $reports['last_page'] - 4)
                        @for($i=request()->page - 1; $i <= request()->page + 1; $i++)
                        <li class="page-item {{ (request()->page ?? 1) == $i ? 'active disabled' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor
                    @else
                        @for($i=$reports['last_page'] - 4; $i <= $reports['last_page']; $i++)
                        <li class="page-item {{ (request()->page ?? 1) == $i ? 'active disabled' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor
                    @endif
                    @if(request()->page <= $reports['last_page'] - 4 && $reports['last_page'] > 7)
                    <li class="page-item"><a class="page-link">...</a></li>
                    <li class="page-item">
                        <a class="page-link" href="?page={{$reports['last_page']}}">{{$reports['last_page']}}</a>
                    </li>
                    @endif
                    <li class="page-item {{ ((request()->page ?? 1) + 1) > $reports['last_page'] ? 'disabled' : '' }}">
                        <a class="page-link" href="?page={{ (request()->page ?? 1) + 1 }}">&gt;</a>
                    </li>
                </ul>
            </nav>
        @endif()
    </div>
</div>
@endsection

@section('modals')
    @include('content.modals.update')
    @include('content.modals.delete')
@endsection

@section('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#success-delete-close-button').click(() => {
    $('#success-delete-alert').addClass('d-none');
});

function showDelete() {
    $('#deleteModal').modal('show');
    $('#editModal').modal('hide');
}

function showEditModal(id) {
    const url = "/registration-detail";
    $.ajax({
        method: 'get',
        data: {
            id
        },
        dataType: 'json',
        url: url,
        success: function(response) {
            $('#edit-id').val(response.id);
            $('#edit-name').val(response.name);
            $('#edit-address').val(response.address);
            $('#edit-junior-high-school').val(response.junior_high_school);
            if( response.gender === 'Perempuan') {
                $('#edit-female-check').attr('checked', true);
            } else {
                $('#edit-male-check').attr('checked', true);
            }
            $('#edit-religion').val(response.religion);
            $('#edit-major').val(response.major);
            $('#editModal').modal('show');
        },
        error: function(error) {
        }
    });
}
function deleteData() {
    const url = "/registration";
    let id = $('#edit-id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'delete',
        data: {
            id
        },
        dataType: 'json',
        url: url,
        success: function(response) {
            $('#success-delete-alert').removeClass('d-none');
            $(`#row-${id}`).remove();
            $('#deleteModal').modal('hide');
        },
        error: function(error) {
        }
    });
}
</script>
@endsection
