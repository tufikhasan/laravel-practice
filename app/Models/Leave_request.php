<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave_request extends Model {
    use HasFactory;
    protected $guarded = [];
    public function leave_category(): BelongsTo {
        return $this->belongsTo( leave_category::class );
    }
    public function user(): BelongsTo {
        return $this->belongsTo( User::class );
    }
}
