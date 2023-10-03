<?php

use App\Models\metadata;

function get_meta_value($meta_key)
{
    $data = metadata::where('meta_key', $meta_key)->first();
    if ($data) {
        return $data->meta_value;
    }
}

function set_about_nama($nama)
{
    //nama = "Muhammad Abdullah"
    $arr = explode(" ", $nama); //idx 1 Muhammad idx 2 Abdullah
    $kataakhir = end($arr);
    $kataakhir2 = "<span class='text-primary'>$kataakhir</span>";
    array_pop($arr); //Muhammad 
    $namaAwal = implode(" ", $arr);
    return $namaAwal . " " . $kataakhir2;
}