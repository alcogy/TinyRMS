<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'is_completed'];
    /** @use HasFactory<\Database\Factories\RequestFactory> */
    use HasFactory;
}
