<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply extends Model
{
    use HasFactory;

    protected $table = 'table_apply';

    protected $fillable = [
        'id_user',
        'id_artikel',
        'status',
        'dokumen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function artikel()
    {
        return $this->belongsTo(artikel::class, 'id_artikel', 'id');
    }
}
