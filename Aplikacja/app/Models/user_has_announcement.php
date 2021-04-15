<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_has_announcement extends Model
{
    use HasFactory;
    public $fillable=['user','announcement','status'];
    public function details(){
        return $this->hasOne(Announcement::class,'id','announcement');
    }
    public function userDetails(){
        return $this->hasOne(User::class,'id','user');
    }
}
