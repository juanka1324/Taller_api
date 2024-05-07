<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'priority'
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
