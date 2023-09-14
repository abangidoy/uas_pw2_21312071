<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = '21312071_mahasiswa';
    protected $primaryKey = 'npm';
    protected $fillable = ['nama', 'alamat'];
}