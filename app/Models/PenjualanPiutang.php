<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanPiutang extends Model
{
    use HasFactory;

    //hasManyToDetailPenjualanPiutang
    public function detailPenjualanPiutang()
    {
        return $this->hasMany(DetailPenjualanPiutang::class);
    }
}
