<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable;
    use HasFactory; //Can access Factory model Post::factory();
    // Eager Load Relationships on an Existing Model this solve the N+1 problem
    protected $with = ['category','author']; 
    

    public function category(){
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){ //Foreign key as user_id
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class,'user_id');
    }
}
