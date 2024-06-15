<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function local_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'local_team_id', 'id');
    }

    public function visit_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'visit_team_id', 'id');
    }

    public function leagues(): BelongsTo
    {
        return $this->belongsTo(League::class, 'league_id', 'id');
    }

    public function ubications(): BelongsTo
    {
        return $this->belongsTo(Ubication::class, 'ubication_id', 'id');
    }

    public function gameDetails(): HasOne
    {
        return $this->HasOne(GameDetail::class, 'game_id', 'id');
    }

    public function gamePlayers(): HasMany
    {
        return $this->hasMany(GamePlayer::class, 'game_id', 'id');
    }

}
