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
    // public function getImageAttribute()
    // {
        
    //     // if($this->attributes['image'] != null && 1)// && file_exists(asset($this->attributes['image'])) )
    //     // {
    //     //     return public_path();
    //     //     return asset($this->attributes['image']);
    //     // }
    //     // else
    //     // {
    //     //     return asset('images/team.png');
    //     // }
        
    // }
}
