@extends('dashboard.layout2')

@section('konten2')  
<div class="content">
    <h2><strong>List CV</strong></h2>
    <table class="table table-stripped">
        <tbody>
            <?php $i = 1; ?>
            @foreach ($data as $item)
                @if($item->user_id !== $currentId)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="200" height="200"></td>
                        <td class="nama">{{ $item->nama }}</td>
                        <td class="text-right">
                            <a href="{{ route('cv.show', ['cv' => $item->id]) }}" class="btn btn-primary btn-lg" style="font-size: 16px; padding: 10px 20px;">Lihat</a>
                        </td>
                    </tr>
                @endif
                <?php $i++; ?>
            @endforeach
        </tbody>
    </table>

    <div class="card" style="width:25%">
        <?php $i = 1; ?>
        @foreach ($data as $item)
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="300" height="200">
            <div class="card-body">
                <h5 class="card-title">{{$item->nama}}</h5>
                <p class="card-text">{{$item['keahlian']->namaSkill}}</p>
            </div>
        @endforeach
    </div>    
</div>

@endsection
