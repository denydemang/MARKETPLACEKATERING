<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    protected $guarded = [];
}
