<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengumpulanTugas extends Model
{
    use SoftDeletes;

    protected $table = 'tb_pengumpulan_tugas';

    protected $fillable = [
        'file_tugas', 'student_id', 'task_id', 'status'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'student_id');
    }
}
