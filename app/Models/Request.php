<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Request extends Model
{
    /** @use HasFactory<\Database\Factories\RequestFactory> */
    use HasFactory;
    
    protected $fillable = ['title', 'body', 'applicant_id', 'approver_id', 'is_completed'];
    
    public function applicant(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'applicant_id');
    }

    public function approver(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }

}
