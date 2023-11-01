@extends('dashboard.layout');

@section('konten')
<div class="table-responsive">
    <div class="pb-3"><a href="{{route('profile.create')}}"class="btn btn-primary">+ Tambah profile</a></div>
    <table class="table table-stripped">
        <thead>
            <th class="col-1">No</th>
            <th class="col-9">Judul</th>
            <th class="col-2">Aksi</th>
        </thead>
        <tbody>
            <?php $i=1;?>
            @foreach ($data as $item)
            <tr>
                <td class="col-1">{{$i}}</td>
                <td class="col-3">{{$item->nama}}</td>
                <td>
                    <a href="{{ route('depan.show', ['depan' => $item->id]) }}" class="btn btn-primary">Show</a>
                    <button class="btn btn-danger" type="submit" name='submit'>Del</button>
                </td>
            </tr>
            <?php $i++;?>
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection