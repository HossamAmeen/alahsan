<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     use SoftDeletes;
     protected $fillable = [
        'title' , 'description', 'en_title' , 'en_description', 'image' , "user_id"
    ];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function getImageAttribute()
    // {
        
    //     if($this->attributes['image'] != null && file_exists(($this->attributes['image'])) ){
    //         return asset($this->attributes['image']);
    //     }
    //     else
    //     {
    //         return asset('images/pic.png');
    //     }
    // }
}
