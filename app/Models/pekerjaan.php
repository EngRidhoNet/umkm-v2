<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'table_pekerjaan';

    protected $fillable = [
        'id_user',
        'posisi',
        'deskripsi',
        'tempat_bekerja',
        'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
