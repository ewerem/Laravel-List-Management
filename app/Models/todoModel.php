<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todoModel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'email', 'created_at'];

    protected $table = "todo";

    public $timestamps = false;
}
