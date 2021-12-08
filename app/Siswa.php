<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'id_kelas','id_spp','nisn','nis','nama','alamat','nomor_telepon'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas','id_kelas');
    }
    public function spp()
    {
        return $this->belongsTo('App\Spp','id_spp');
    }

}
