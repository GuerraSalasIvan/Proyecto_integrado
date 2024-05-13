<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class GamePlayer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

}
