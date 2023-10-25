@extends('dashboard.layout');

@section('konten')
<div class="table-responsive">
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
                </td>
            </tr>
            <?php $i++;?>
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection