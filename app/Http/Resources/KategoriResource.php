<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
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
            'kd_kategori' => $this->kd_kategori,
            'kategori' => $this->kategori,
            'gambar_kategori' => env('ASSET_URL') . "/public/uploads/" . $this->gambar_kategori
        ];
    }
}
