<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apparatus extends Model
{
    use HasFactory;

    protected $table = 'apparatus';

    protected $guarded = ['id'];
}
