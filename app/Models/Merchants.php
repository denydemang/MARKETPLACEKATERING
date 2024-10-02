<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchants extends Model
{
    use HasFactory;
    protected $table = "merchants";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    protected $guarded = [];
}
