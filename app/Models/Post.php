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
    
    public function scopeFilter($query, array $filters){ //Post::newQuery()->filter()
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category){
            $query->whereHas('category', fn ($query)=>
                $query->where('slug', $category)
            );
       
        });

        $query->when($filters['author'] ?? false, function ($query, $author){
            $query->whereHas('author', fn ($query)=>
                $query->where('slug', $author)
            );
       
        });
        
        // another method
        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }
    }


    public function category(){
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){ //Foreign key as user_id
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class,'user_id');
    }
}
