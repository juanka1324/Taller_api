<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'age',
        'email',
        'city',
        'address',
        'birthdate',
        'status',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
