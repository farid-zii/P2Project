<?php

namespace App\models;

use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $guarded = [];

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanController::class);
    }
    public function pengembalian()
    {
        return $this->hasMany(PengembalianController::class);
    }
}
