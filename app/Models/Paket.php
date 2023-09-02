<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'tb_paket';

    protected $fillable = [
        'name',
        'harga',
        'jumlah',
        'keterangan',
        'status',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_paket', 'id');
    }
}
