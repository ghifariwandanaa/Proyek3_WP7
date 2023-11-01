@extends('dashboard.layout');

@section('konten')
<div class="table-responsive">
    <div class="pb-3"><a href="{{route('profile.create')}}"class="btn btn-primary">+ Tambah profile</a></div>
    <table class="table table-stripped">
        <tbody>
            <?php $i=1;?>
            @foreach ($data as $item)
            <tr>
            <td><img src="{{asset('storage/' . $item->gambar) }}" alt="" width="100"></td>
                <td class="col-9">{{$item->nama}}</td>
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
