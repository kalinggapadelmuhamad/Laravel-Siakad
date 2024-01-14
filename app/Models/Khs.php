<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'student_id',
        'nilai',
        'grade',
        'keterangan',
        'tahun_akademik',
        'semester',
        'created_by',
        'update_by',
        'delete_by'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
