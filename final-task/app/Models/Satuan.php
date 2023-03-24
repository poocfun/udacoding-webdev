<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $fillable = [
        'nama_satuan',
        'deskripsi',
        'status',
        'created_at',
    ];

    use HasFactory;

    public function paket()
  {
    return $this->hasMany(Kuota::class, 'satuan_id', 'id');
  }
}
