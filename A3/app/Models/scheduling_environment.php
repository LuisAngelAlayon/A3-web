<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheduling_environment extends Model
{
    use HasFactory;

    protected $table = 'scheduling_environment';


    protected $fillable = [
        'course_id',
        'document_instructor',
        'date_scheduling',
        'initial_hour',
        'final_hour',
        'environment_id',

    ];

}
