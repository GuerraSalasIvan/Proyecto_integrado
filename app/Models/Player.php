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

class Player extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'player_team', 'player_id', 'team_id');
    }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_players', 'player_id', 'game_id');
    }

    public function gamePlayers(): HasMany
    {
        return $this->hasMany(GamePlayer::class, 'player_id', 'id');
    }
}
