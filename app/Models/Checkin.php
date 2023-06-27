<?php

namespace App\Models;

use \App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'tb_checkin';

    protected $fillable = [
        'id_pendaftaran',
        'status',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id');
    }
}
