<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Siswa;

class Kelas extends Model
{
    //
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kelas',
        'jurusan',
        'wali_kelas',
    ];

    public function siswa()
{
    return $this->hasMany(Siswa::class);
}
}
