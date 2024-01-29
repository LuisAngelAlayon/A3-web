<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'career';

    protected $fillable = [
        'name',
        'type',
    ];

    public function careers()
    {
        return $this->hasMany(Career::class);
    }
}