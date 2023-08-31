<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'password', 'role', 'otp', 'available_leave'];
    protected $attributes = ['otp'=>'0', 'available_leave'=>'30'];

    public function leave(){
        return $this->hasMany(Leave::class);
    }
}
