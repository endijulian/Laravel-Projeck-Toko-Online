<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['username', 'kd_produk', 'jumlah', 'harga'];
    protected $primaryKey = 'kd_keranjang';

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'kd_produk');
    }
}
