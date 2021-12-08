<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_kelas'=>$this->id_kelas,
            'id_spp'=>$this->id_spp,
            'nisn'=>$this->nisn,
            'nis'=>$this->nis,
            'nama'=>$this->nama,
            'alamat'=>$this->alamat,
            'nomor_telepon'=>$this->nomor_telepon,
        ];
    }
}
