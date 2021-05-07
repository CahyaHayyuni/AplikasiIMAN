<?php

function convert_divisi($id_divisi)
{
    $divisi = "";

    if ($id_divisi == 'it') {
        $divisi = "Informasi Teknologi";
    } elseif ($id_divisi == 'tnk') {
        $divisi = "Teknik";
    } elseif ($id_divisi == 'kom') {
        $divisi = "Komersial";
    } elseif ($id_divisi == 'keu') {
        $divisi = "Keuangan";
    } elseif ($id_divisi == 'qrm') {
        $divisi = "Menegement Resiko & Mutu";
    } elseif ($id_divisi == 'tpkb') {
        $divisi = "TPKB";
    } elseif ($id_divisi == 'trs') {
        $divisi = "Trisakti";
    } elseif ($id_divisi == 'hsse') {
        $divisi = "HSSE";
    } elseif ($id_divisi == 'umum') {
        $divisi = "SDM & Umum";
    }

    return $divisi;
}
