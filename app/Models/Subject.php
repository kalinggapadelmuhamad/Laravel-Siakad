<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lecture_id',
        'semester',
        'academic_year',
        'sks',
        'code',
        'description'
    ];

    public function lecture()
    {
        return $this->belongsTo(User::class);
    }

    public function khs()
    {
        return $this->hasMany(Khs::class);
    }
}
