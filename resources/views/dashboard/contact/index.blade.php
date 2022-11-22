@extends('layout.admin')
@section('title,','mastercontact')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row">
<div class="col-lg-12">
 <div class="card shadow mb-4">
 <div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary"><i class="  "></i>  Jenis Kontak</h6>
   @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/jeniskontak/store" method="post">
        @csrf
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" id="jenis_kontak" name="jenis_kontak">
            <button class="btn btn-outline-secondary" type="submit">Tambah</button>
        </div>
    </form>

   {{-- <input type="text" width="100px"> --}}
 </div>
    <div class="card-body text-center">
    <table class="table">
             <thead>
                 <tr>
                 <th scope="col">ID</th>
                 <th scope="col">JENIS KONTAK</th>
                 @if (auth()->user()->role==0)
                 <th scope="col">ACTION</th>
                 @endif
                 </tr>
             </thead>
             @foreach($data_jkontak as $j_kontak)
             <tr>
                 <td> {{ $j_kontak->id }} </td>
                 <td> {{ $j_kontak->jenis_kontak }} </td>
                 @if (auth()->user()->role==0)
                 <td class="text-center">
                    <form action="/jeniskontak/delete/{{ $j_kontak->id }}" method="post">
                        @csrf
                    <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                </form>
                    {{-- <a href="{{ route('jkontak.edit', $j_kontak->id)  }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('jkon tak.hapus', $j_kontak->id)  }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a> --}}
                 </td>
                 @endif
             </tr>
             @endforeach
    </table>
             <div class="card-footer d-flex justify-content-end">
                 {{ $data_jkontak->links() }}
             </div>
    </div>

</div>
</div>

<div class="col-lg-5">
 <div class="card shadow mb-4">
 <div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary"><i class="  "></i>  Kontak Siswa</h6>
 </div>
    <div class="card-body text-center">
    <table class="table">
             <thead>
                 <tr>
                 <th scope="col">NISN</th>
                 <th scope="col">NAMA</th>
                 <th scope="col">ACTION</th>
                 </tr>
             </thead>
             @foreach($data as $item)
             <tr>
                 <td> {{ $item->nisn }} </td>
                 <td> {{ $item->nama }} </td>

                 <td class="text-center">
                     <a onclick="show({{ $item->id }})" class="btn btn-sm btn-info btn-circle"><i class="fas fa-folder-open"> </i></a>
                     @if (auth()->user()->role==0)
                     <a href="{{ url('admin/mastercontact/create', $item->id)   }}" class="btn btn-sm btn-success btn-circle"><i class="fas fa-plus"> </i></a>

                     @endif
                 </td>
             </tr>
             @endforeach
    </table>
             <div class="card-footer d-flex justify-content-end">
                 {{ $data->links() }}
             </div>
    </div>

</div>
</div>
 <!-- ketiga -->
 <div class="col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary"><i class=""></i> About Siswa</h6>
      </div>
      <div id="project" class="card-body">
      <h6 class="text-center">pilih siswa dulu</h6>
      </div>
    </div>
 </div>
</div>
<script>
function show(id){
    $.get('/admin/mastercontact/'+id, function(data){
        $('#project').html(data);
    });
}
</script>

@endsection
