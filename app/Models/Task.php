<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['list', 'created_at', 'updated_at'];

    protected $dateFormat = 'U'; //Ini memanipulasi result di Tinker

    protected $casts = [ //ini memanipulasi result di Routes
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];
}
