<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $table = "invoices";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    protected $guarded = [];
}
