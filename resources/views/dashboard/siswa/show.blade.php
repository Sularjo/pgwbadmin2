@extends('layout.admin')
@section('title,','show siswa')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow">
                <div class="card-body" style="text-align: center">
                    <img src="/template/img/{{ $data->foto }}" width="200px" class="rounded-circle mb-3">
                    <h5>{{ $data->nama }}</h5>
                    <p>{{ $data->nisn }}</p>
                    <p>{{ $data->jk }}</p>
                    <p></p>
                </div> {{-- card body  --}}
            </div> {{-- card --}}

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-user-plus" style="margin-right:10px;"></i> Kontak Siswa</h6>
                </div> {{-- card header --}}
                <div class="card-body">
                    @foreach ($kontak as $item)
                        <li>{{ $item->jenis_kontak }} : {{ $item->pivot->deskripsi }}</li>
                    @endforeach
                </div> {{-- card body --}}
            </div> {{-- card --}}
        </div> {{-- col-4 --}}
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-tie" style="margin-right:10px;"></i>About Siswa</h6>
                </div> {{-- card header --}}

                <blockquote class="blockquote text-center">
                    <p class="mb-0">{{ $data->about }}</p>
                  </blockquote>
                  <figcaption class="blockquote-footer">
                    Written By <cite title="Source Title">{{ $data->nama }}</cite>
                  </figcaption>

                <div class="card-body">
                    <p>{{ $data->about }}</p>
                </div> {{-- card body --}}
            </div> {{-- card --}}

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks" style="margin-right:10px;"></i>Project Siswa</h6>
                </div> {{-- card header --}}
                <div class="card-body">
                  <p>{{ $data->projects  }}</p>
                </div> {{-- card body --}}
            </div> {{-- card  --}}
        </div> {{-- col-8 --}}
    </div> {{-- row --}}
</div> {{-- container --}}
@endsection


