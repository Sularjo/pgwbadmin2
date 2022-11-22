@extends('layout.admin')
@section('title,','createcontact')

@section('content')
<h1>Halaman Tambah Project - {{$siswa->nama}}</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="/admin/mastercontact/storek" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id_siswa" value="{{ $siswa->id }}"> --}}
                    <input type="hidden" name="siswa_id" value={{ $siswa->id }}>
                    <div class="form-group">
                        <label for="nama_project">Jenis Contact</label>
                        <select name="jenis_kontak" id=""  class="form-control">
                            @foreach (  $j_kontak as $item)

                            <option value="{{ $item->id }}">{{ $item->jenis_kontak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                    </div>
                    <div class="form-group">
                        {{-- <a href="submit" class="btn btn-success">Simpan</a> --}}
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
