<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected  $fillable = ['title','localization','price','description','expiring_at','category_id','creator_id'];
    public function categories()
    {
        return $this->hasManyThrough(Has_Category::class, Categories::class,'category_id','announcement_id','id','id');
    }
}
