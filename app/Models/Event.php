<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model {
    use HasFactory;
    protected $guarded = [];
    public function event_category(): BelongsTo {
        return $this->belongsTo( EventCategory::class );
    }
    public function reservation(): HasMany {
        return $this->HasMany( Reservation::class );
    }
}
