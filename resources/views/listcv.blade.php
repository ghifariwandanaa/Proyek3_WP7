@extends('dashboard.layout2')

@section('konten2')  
<div class="content">
    <h2><strong>List CV</strong></h2>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($data as $item)
            @if($item['profile']->user_id !== $item['currendId'])
                <div class="col">
                    <div class="card" style="width: 75%">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/' . $item['profile']->gambar) }}" alt="" class="card-img-top" style="object-fit: cover; height: 200px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="margin-bottom: 10px; font-size: 18px; color: white;">{{$item['profile']->nama}}</h5>

                            <h5 class="judul-card">Pengalaman Bekerja</h5>
                            @foreach ($item['riwayatPekerjaan'] as $riwayatpk)
                                @if ($riwayatpk->profile_id == $item['profile']->id)
                                    <?php
                                        // Konversi tanggal ke dalam objek Carbon untuk memanfaatkan fitur perbedaan tahun
                                        $tglMulai = \Carbon\Carbon::parse($riwayatpk->tgl_mulai);
                                        $tglAkhir = \Carbon\Carbon::parse($riwayatpk->tgl_akhir);
                                
                                        // Hitung selisih tahun
                                        $selisihTahun = $tglMulai->diffInYears($tglAkhir);
                                    ?>
                                    <p class="card-text">{{ $riwayatpk->namaPerusahaan }} - {{ $riwayatpk->jabatan }}</p>
                                    <p class="card-text">{{ $selisihTahun }} tahun</p>
                                @endif
                            @endforeach

                            <h5 class="judul-card">Keahlian</h5>
                            @foreach ($item['keahlian'] as $skill)
                                @if ($skill->profile_id == $item['profile']->id)
                                    <p class="card-text">{{$skill->namaSkill}}-{{$skill->tingkatanSkill}}%</p>
                                @endif
                            @endforeach
                            <a href="{{ route('cv.show', ['cv' => $item['profile']->id]) }}" class="btn btn-primary btn-lg" style="font-size: 16px; padding: 10px 20px; margin-top: 10px;">Lihat</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection

