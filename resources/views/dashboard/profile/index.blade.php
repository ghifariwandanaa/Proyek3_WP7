@extends('dashboard.layout');

@section('konten')
<p class="card-title">profile</p>
<div class="pb-3"><a href="{{route('profile.create')}}"class="btn btn-primary">+ Tambah profile</a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <tbody>
            <?php $i=1;?>
            @foreach ($data as $item)
            <tr>
                <td><img src="{{asset('storage/' . $item->gambar) }}" alt="" width="100"></td>
                <td class="col-3">{{$item->nama}}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('profile.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                            action="{{ route('profile.destroy', $item->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" name='submit'>Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php $i++;?>   
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection
