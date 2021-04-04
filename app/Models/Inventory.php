<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = "inventory";
    protected $primaryKey = "id";
    protected $fillable =["user_id","name","howmuch","image"];
    protected $guarded = [];
}
