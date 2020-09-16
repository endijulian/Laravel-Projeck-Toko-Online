<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
    protected $table = 'transaksi_masuk';
    protected $primaryKey = 'kd_transaksi';
    protected $fillable = [
        'kd_produk',
        'kd_supplier',
        'tanggal_transaksi',
        'jumlah',
        'harga'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'kd_produk');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'kd_supplier');
    }

    public function getTanggalTransaksiAttribute() //method harus sesuai nama kolom database
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_transaksi'])->format('d F Y');
    }
}
