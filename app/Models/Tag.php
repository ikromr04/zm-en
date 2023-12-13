<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;

class Tag extends Model
{
  use HasFactory, Sluggable, NodeTrait {
    Sluggable::replicate insteadof NodeTrait;
  }

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function quotes()
  {
    return $this->belongsToMany(Quote::class, 'quote_tag');
  }
}
