<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_project',
        'deskripsi',
        'tanggal'
    ];

    protected $table = 'project';
    public function siswa()
    {
        return $this->belongsTo('App\Models\siswa' , 'id');
    }
}
