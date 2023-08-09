<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'amount',
        'desc',
        'date',
        
        'user_id',
        'income_category_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomeCategory()
    {
        return $this->belongsTo(IncomeCategory::class);
    }
}
