<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;


class League extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}
