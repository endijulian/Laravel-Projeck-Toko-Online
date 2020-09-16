<?php

namespace App\Http\Resources;

use App\Helpers\Rupiah;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
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
            'kode_transaksi' => $this->kode_transaksi,
            'no_faktur' => $this->no_faktur,
            'tanggal_penjualan' => $this->tanggal_penjualan,
            'kd_agen' => $this->kd_agen,
            'username' => $this->username,
            'total' => $this->total,
            'total_rupiah' => Rupiah::get_rupiah($this->total)
        ];
    }
}
