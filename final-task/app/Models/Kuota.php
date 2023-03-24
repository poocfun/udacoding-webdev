<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    protected $fillable = [
        'nama_paket',
        'berat',
        'harga',
        'cabang',
        'aktif',
        'satuan_id',
        'created_at',
    ];
    use HasFactory;


    public function satuan()
  {
    return $this->belongsTo(Satuan::class);
  }
}
