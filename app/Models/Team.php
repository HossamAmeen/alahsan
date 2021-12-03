<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
     use SoftDeletes;
     protected $fillable = [
        'name' , 'postion','image' , "user_id"
    ];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
