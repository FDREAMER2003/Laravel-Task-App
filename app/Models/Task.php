<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = ['name', 'description', 'status'];

    // Override the default primary key
    public function getRouteKeyName()
    {
        return 'id';
    }

    // Enable timestamps for created_at and updated_at
    public $timestamps = true;
}
