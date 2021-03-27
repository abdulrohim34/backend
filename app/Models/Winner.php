<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    protected $table='doorprize_winners';
    protected $fillable=[
        'employee_id',
        'fullname',
        'divisi',
        'department',
    ];

}
