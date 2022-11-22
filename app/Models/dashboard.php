<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dashboard extends Model
{
    public static $jurusan = [
        "industri" => "Teknik Industri",
        "pangan" => "Tenologi Pangan",
        "mesin" => "Teknik Mesin",
        "informatika" => "Teknik Informatika",
        "lingkungan" => "Teknik Lingkungan",
        "pwk" => "Teknik PWK" 
    ];

    public static $datadumy = [
        "mahasiswa" => "20000",
        "dosen" => "100",
        "staf" => "50",
        "wisudawan" => "100",
        "wisudawati" => "100",
        "alumni" => "1500",
        "akreditasia" => "A",
        "akreditasib" => "B",
        "visi" => "Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...",
        "misi" => "Take me to your leader! Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood!
        ",
        
    ];


}
