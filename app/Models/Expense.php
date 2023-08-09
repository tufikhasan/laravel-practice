<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model {
    use HasFactory;
    public function user(): BelongsTo {
        return $this->belongsTo( User::class );
    }
    protected $fillable = ['user_id', 'amount', 'description', 'date', 'expense_category_id'];
}
