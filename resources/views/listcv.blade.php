@extends('dashboard.layout2')

@section('konten2')  
<div class="content">
    <h2><strong>List CV</strong></h2>
    <table class="table table-stripped">
        <tbody>
            <?php $i = 1; ?>
            @foreach ($data as $item)
                @if($item['profile']->user_id !== $item['currendId'])
                    <tr>
                        <td><img src="{{ asset('storage/' . $item['profile']->gambar) }}" alt="" width="200" height="200"></td>
                        <td class="nama">{{ $item['profile']->nama }}</td>
                        <td class="text-right">
                            <a href="{{ route('cv.show', ['cv' => $item['profile']->id]) }}" class="btn btn-primary btn-lg" style="font-size: 16px; padding: 10px 20px;">Lihat</a>
                        </td>
                    </tr>
                @endif
                <?php $i++; ?>
            @endforeach
        </tbody>
    </table>

    <div class="card" style="width:25%">
    @foreach ($data as $item)
        <img src="{{ asset('storage/' . $item['profile']->gambar) }}" alt="" width="300" height="200">
        <div class="card-body">
            <h5 class="card-title">{{$item['profile']->nama}}</h5>
            @foreach ($item['keahlian'] as $skill)
                @if ($skill->profile_id == $item['profile']->id)
                    <p class="card-text">{{$skill->namaSkill}}</p>
                @endif
            @endforeach
        </div>
    @endforeach
</div>
 
</div>

@endsection
