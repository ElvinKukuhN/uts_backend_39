<?php

namespace App\Models;

use App\Models\Agama39;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data39 extends Model
{
    use HasFactory;

    public $table = 'data39';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'alamat',
        'nohp',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'foto_ktp',
        'umur'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama39::class, 'id_agama', 'id');
    }
}
