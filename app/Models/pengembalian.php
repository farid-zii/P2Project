<?php

namespace App\models;

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\SiswaController;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(SiswaController::class);
    }
    public function buku()
    {
        return $this->belongsTo(BukuController::class);
    }
}
