<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = ['title', 'description', 'completed'];
    // Define relationship to User
   
}
