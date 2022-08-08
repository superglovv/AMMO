<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Movie extends Model
{
    use HasFactory, Commentable;

    protected $fillable = ['title', 'content', 'image', 'owner_id', 'rating_star'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($movie) {
            $movie->owner_id = auth()->id();
        });
    }




    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /* public function postUsers(){
        return $this->hasMany(PostUser::class);
    } */
}
