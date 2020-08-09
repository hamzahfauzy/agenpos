<?php
namespace App\Models;
use Model;

class Pengiriman extends Model
{
    function pengirim(){
        return $this->hasOne(Pengirim::class,['id_pengiriman'=>'id']);
    }
    function penerima(){
        return $this->hasOne(Pengirim::class,['id_pengiriman'=>'id']);
    }
}