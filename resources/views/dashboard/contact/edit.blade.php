@extends('layout.admin')
@section('title,','editcontact')
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('mastercontact.update', $kontak->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="siswa_id" value={{ $kontak->id }}>
                    <div class="form-group">
                        <label for="jenis_kontak_id">Jenis Contact</label>
                        <select name="jenis_kontak_id" id="jenis_kontak_id"  class="form-control" value={{ $kontak->jenis_kontak_id }}>
                            @foreach (  $j_kontak as $item)
                            <option value="{{ $item->id }}">{{ $item->jenis_kontak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $kontak->deskripsi }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-success">
                        {{-- <a href="submit" class="btn btn-success">Update</a> --}}
                        <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
