<?php

namespace App\Models;

use \App\Models\Paket;
use \App\Models\Checkin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pendaftaran';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'tiket',
        'bank',
        'va',
        'kadaluarsa',
        'status',
        'id_paket',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }

    public function checkin()
    {
        return $this->hasOne(Checkin::class, 'id_pendaftaran', 'id');
    }
}
