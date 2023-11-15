@extends('dashboard.layout2')

@section('konten2')  
<div class="content">
    <h2 ><strong>List CV</strong></h2>
    <table class="table table-stripped">
        <tbody>
            <?php $i = 1; ?>
            @foreach ($data as $item)
            <tr>
                <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="200" height="200"></td>
                <td class="nama">{{ $item->nama }}</td>
                <td class="text-right">
                    <a href="{{ route('cv.show', ['cv' => $item->id]) }}" class="btn btn-primary btn-lg"style="font-size: 16px; padding: 10px 20px;">Lihat</a>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection