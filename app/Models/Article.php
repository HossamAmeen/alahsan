<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Article extends Model
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
    public function getEnSubDesAttribute()
    {
        return  substr(  strip_tags(html_entity_decode($this->en_description)) , 0 ,  150 );
    }

    public function getArSubDesAttribute()
    {
        // return substr(strip_tags($this->description), 0 ,  150 );
        return  substr( strip_tags(html_entity_decode($this->description)  ),0 , 100 );
    }
    // public function getImageAttribute()
    // {
        
    //     if($this->attributes['image'] != null && file_exists(($this->attributes['image'])) ){
    //         return asset($this->attributes['image']);
    //     }
    //     else
    //     {
    //         return asset('images/news.jpg');
    //     }
    // }
}
