<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Has_Category extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $fillable=['announcement_id','category_id'];
}
