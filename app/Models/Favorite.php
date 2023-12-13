<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Favorite extends Model
{
  use HasFactory, NodeTrait;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function quotes()
  {
    return $this->belongsToMany(Quote::class, 'quote_user', 'favorite_id', 'quote_id',);
  }
}
