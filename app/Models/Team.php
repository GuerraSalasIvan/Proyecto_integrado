<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Team extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = [];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'player_team', 'team_id', 'player_id');
    }

    public function leagues(): BelongsTo
    {
        return $this->belongsTo(League::class, 'league_id', 'id');
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
