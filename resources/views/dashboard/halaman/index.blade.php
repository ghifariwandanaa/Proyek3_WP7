@extends('dashboard.layout');

@section('konten')
<p class="card-title">Halaman</p>
<div class="pb-3"><a href="{{route('halaman.create')}}"class="btn btn-primary">+ Tambah Halaman</a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <th class="col-1">No</th>
            <th>Judul</th>
            <th class="col-2">Aksi</th>
        </thead>
        <tbody>
            <?php $i=1;?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    <a href='' class="btn btn-sm btn-secondary">Edit</a>
                    <form onsubmit="return confirm('Yakin ingin menghapus data ini?')
                    "
                        action="{{ route('halaman.destroy', $item->id)}}"
                        class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                        name='submit'>Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++;?>
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection
