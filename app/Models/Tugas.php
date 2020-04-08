<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tugas extends Model
{
    use SoftDeletes;

    protected $table = 'tb_task';

    protected $fillable = [
        'judul_tugas', 'tugas_url', 'tugas_mapel', 'tugas_kelas', 'isi_tugas','deadline_tugas','file_tugas'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function teacher()
    {
        return $this->hasOne('App\User', 'id', 'teacher_id');
    }

    public function pengumpulan()
    {
        return $this->hasMany('App\Models\PengumpulanTugas', 'task_id', 'id');
    }
}
