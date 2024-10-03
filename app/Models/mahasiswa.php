<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'table_mahasiswa';
    protected $fillable = [
        'id_user',
        'nama_mahasiswa',
        'universitas',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_hp',
        'penghasilan',
        'pekerjaan',
        'foto_profil',
        'provinsi_mahasiswa',
        'kota_mahasiswa',
        'kecamatan_mahasiswa',
        // 'kelurahan_mahasiswa',
        'kode_pos',
        'alamat_mahasiswa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }


}
