<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Quote extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'id'
      ]
    ];
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'quote_tag');
  }

  public function favorites()
  {
    return $this->belongsToMany(Favorite::class, 'quote_user', 'quote_id', 'favorite_id');
  }
}
