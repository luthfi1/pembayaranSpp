<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'id_user','id_siswa','tanggal_bayar','bulan_dibayar','tahun_dibayar','total_bayar'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa','id_siswa');
    }
}
