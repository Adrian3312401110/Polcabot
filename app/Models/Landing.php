<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = 'landing_contents'; // tabel DB
    protected $fillable = ['title', 'description', 'image'];
}
