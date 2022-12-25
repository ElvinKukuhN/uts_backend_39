<?php

namespace App\Models;

use App\Models\Data39;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agama39 extends Model
{
    use HasFactory;

    public $table = 'agama39';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_agama'
    ];

    public function detail()
    {
        return $this->hasMany(Data39::class, 'id_agama', 'id');
    }
}
