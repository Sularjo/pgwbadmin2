@extends('layout.admin')
@section('title,','masterproject')

@section('content')

{{-- <div class ="row">
    <div class ="col-lg-6">
        <div class="card shadow-mb-4">
            <div class="card-header bg-success">
                <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
            </div>
            <div class ="card-body ">


                    <table class="table">

                        <thead>
                            <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                        <tbody>
                            <tr>
                           <th>{{$item -> nisn }}</th>
                           <th>{{$item -> nama }}</th>


                           <td>
                            <a class="btn btn-info" onclick="show({{ $item->id }})"><i class="fas fa-folder-open"></i></a>
                            <a class="btn btn-success"><i class="fas fa-plus"></i></a>
                           </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="card-footer">
                        {{$data->links()}}
                    </div>

            </div>
        </div>
    </div>

    <div class ="col-lg-6">
        <div class="card shadow-mb-4">
            <div class="card-header bg-success">
                <h6 class="m-0 font-weight-bold text-white">Project Siswa</h6>
            </div>
            <div id="project" class ="card-body ">
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header bg-brown">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-user"> </i>&nbsp; Data Siswa </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-info">
                            <tr>
                                <th width="2%" class="pl-3">#</th>
                                <th width="32%">NISN</th>
                                <th width="40%">Nama</th>
                                <th width="18%" >action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $d)
                        <tbody>
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$d->nisn}}</th>
                                <th>{{$d->nama}}</th>
                                <th>
                                    <a href="{{ route('masterproject.tambah', $d->id) }}" class="btn btn-circle btn-sm">
                                        <i class="fa fa-plus "></i>
                                    </a>
                                    <a onclick="show({{ $d->id }})" class="btn btn-circle btn-sm">
                                        <i class="fa fa-folder-open "></i>
                                    </a>

                                    <!-- <button data-toggle="modal" data-target=".bd-example-modal-centered-update{{$d->id}}" class="btn btn-circle btn-sm">
                                        <i class="fa fa-pen "></i>
                                    </button>    -->
                                </th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{$data->links()}}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header bg-brown">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-book"> </i> &nbsp; Project Siswa </h6>
            </div>
            <div class="card-body" id="project">

            </div>
        </div>
    </div>
</div>
<script>
//     function show(id){
//         $.get('admin/masterproject/'+id, data => $('#project').html(data));
//         // alert(id)
//     }
// </script>
<script>
    function show(id){
        $.get('masterproject/'+id, function(data){
            $('#project').html(data);
        })
    }
</script>

@endsection
