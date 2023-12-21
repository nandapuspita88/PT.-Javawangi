<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Repo extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }




    public function getRouteKeyName()
	{
    	return 'slug';
	}
}
