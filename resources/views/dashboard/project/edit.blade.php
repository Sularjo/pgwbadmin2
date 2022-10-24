@extends('layout.admin')
@section('title,','edit project')

@section('content')

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
                <form method="POST" enctype="multipart/form-data" action="{{ route('masterproject.update', $project->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_project">Nama Project</label>
                        <input type="text" class="form-control" id="nama_project" name='nama_project' value="{{ $project->nama_project }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ $project->deskripsi }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name='tanggal' value="{{ $project->tanggal }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-success">
                        {{-- <a href="submit" class="btn btn-success">Update</a> --}}
                        <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
</div>

@endsection
