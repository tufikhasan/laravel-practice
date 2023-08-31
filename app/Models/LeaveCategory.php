<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function leave(){
        return $this->hasMany(Leave::class);
    }
}
