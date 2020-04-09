<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes;

    protected $table = 'tb_materi';

    protected $fillable = [
        'judul_materi', 'materi_url', 'materi_mapel', 'materi_kelas', 'isi_materi', 'view_count'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function teacher()
    {
        return $this->hasOne('App\User', 'id', 'teacher_id');
    }
}
