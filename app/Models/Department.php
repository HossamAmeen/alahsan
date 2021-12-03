<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     use SoftDeletes;
     protected $fillable = [
        'title' , 'description', 'en_title' , 'en_description', 'image' , "user_id"
    ];
    protected $hidden = [
        'user_id',"created_at" ,'en_title','en_description' ,'updated_at','deleted_at' 
   ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
