<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
