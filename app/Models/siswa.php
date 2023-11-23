<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nis','nama','jeniskelamin','tgl_lahir','alamat',];
    protected $table = 'siswa';
    public $timestamps = false;
}
