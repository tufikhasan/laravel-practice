<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = ['start_date', 'end_date', 'reason', 'status', 'user_id', 'leave_category_id'];
   
    protected $attributes = ['status'=>'pending'];


    public function leaveCategory(){
        return $this->belongsTo(LeaveCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



}
