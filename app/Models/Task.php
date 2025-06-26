<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;//hasFactory is used to enable factory-based testing and seeding

    protected $fillable = ['title', 'due_date'];// Fillable attributes for mass assignment
}
