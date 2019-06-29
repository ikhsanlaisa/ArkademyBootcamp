<?php


function biodata($nama, $umur, $alamat, $hobbi, $sekolah_dasar, $sekolah_menengah_pertama,
                 $sekolah_menengah_atas, $kuliah, $java, $php, $laravel, $ci, $rest_api){
    $biodata = [
        'nama'=>$nama,
        'umur'=>$umur,
        'alamat'=>$alamat,
        'hobbi'=>$hobbi,
        'sudah menikah'=>true,
        'riwayat_pendidikan' => [$sekolah_dasar, $sekolah_menengah_pertama, $sekolah_menengah_atas, $kuliah],
        'skill' => [$java, $php, $laravel, $ci, $rest_api],
        'tertarik pada programming' => true
    ];

    $data = [
        'status'=>"OK",
        'biodata'=>$biodata,
        'message'=>null
    ];

    $response = json_encode($data);
    echo $response;
}

echo biodata("Muhamad Ikhsan Laisa", "22", "Jalan Sukabirus RT 01 RW 13 Gang Sebelah GOR Sentosa, Villa Zahra diujung kanan gang Desa Citeureup Kecamatan Dayeuhkolot Kabupaten Bandung 40257",
    ["Basket", "Futsall", "Nonton"], ['nama_sekolah' => "SDN 3 Palu", 'tahun_masuk' => "2003", 'tahun_keluar' => "2009", 'penjurusan' => null], ['nama_sekolah' => "SMP Al-Azhar Palu",
        'tahun_masuk' => "2009", 'tahun_keluar' => "2012", 'penjurusan' => null],['nama_sekolah' => "SMA Al-Azhar Palu", 'tahun_masuk' => "2012", 'tahun_keluar' => "2015", 'penjurusan' => "IPA"],
    ['nama_universitas' => "Telkom University Bandung", 'tahun_masuk' => "2015", 'tahun_keluar' => "2019", 'jurusan' => "Sistem Informasi"], ['nama_kemampuan' => "java",'level' => "sedang"],
    ['nama_kemampuan' => "php", 'level' => "sedang"], ['nama_kemampuan' => "laravel",  'level' => "sedang"], ['nama_kemampuan' => "Code Igniter", 'level' => "pemula"], ['nama_kemampuan' => "rest api", 'level' => "sedang"]);
?>