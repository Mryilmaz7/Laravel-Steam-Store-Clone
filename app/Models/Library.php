<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = "library";
    protected $primaryKey = "id";
    protected $fillable =["product_id","product_name","user_id"];
    protected $guarded = [];
}
