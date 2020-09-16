<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $fillable = ['no_faktur', 'tanggal_penjualan', 'kd_agen', 'username', 'total'];

    public function agen()
    {
        return $this->belongsTo('App\Agen', 'kd_agen');
    }

    public function getTanggalPenjualanAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_penjualan'])->format('d-F-Y');
    }
}
