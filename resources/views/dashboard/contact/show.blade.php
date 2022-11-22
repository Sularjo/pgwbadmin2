@if ($kontak->isEmpty())
    <h6>Siswa Belum memiliki kontak</h6>
@else
    @foreach ($kontak as $item)

        <div class="card">
            <div class="card-header">
                <strong>{{ $item->siswa_id}}</strong>
            </div>
            <div class="card-body">
                <strong>Jenis Kontak :</strong>
                <p>{{ $item->jenis_kontak }}</p>
                <strong>Deskripsi :</strong>
                <p>{{ $item->pivot->deskripsi}}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('mastercontact.edit' , $item->pivot ->id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                <form action="/admin/mastercontact/{{ $item->pivot->id }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach
@endif
